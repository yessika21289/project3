<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 17/11/2016
 * Time: 14.03
 */
class Migration extends CI_Controller {
    /**
     * Index Page for this controller.
     */

    public function __construct() {
        parent::__construct();
        $this->load->model('API_model');
        $this->load->model('Migration_model');
    }

    public function index()
    {
        $this->template->title('Migrasi Data');

        $data['message'] = $this->session->flashdata('message');
        $this->template->build('migration', $data);
    }

    public function stocks() {
        //$this->productsMapping();
        //$this->reprocessProducts();

        $this->load->model('Stocks_model');
        $products = $this->Stocks_model->get_products();
        foreach($products as $product) {
            $condition = array(
                'NAMA_GROUP'    => $product['category'] == 'General' ? '' : $product['category'],
                'KODE'          => $product['kode'],
                'NAMA'          => $product['name']
            );
            $stoks = $this->Migration_model->old_stok($condition);
            foreach($stoks as $stok) {
                $insert = array(
                    'pid'   => $product['pid'],
                    'box'   => ($stok->G00001) ? $stok->G00001 : NULL,
                    'total' => ($product['qty'] && $stok->G00001) ? $product['qty']*$stok->G00001 : NULL,
                    'created_by'    => 'superadmin',
                    'created_at'    => time(),
                    'updated_by'    => 'superadmin',
                    'updated_at'    => time()
                );
                $this->Migration_model->insert_stocks($insert);
            }
        }

        $message = 'Migrasi data stok selesai.';
        $this->session->set_flashdata('message', $message);
    }

    public function productsMapping() {
        $update = array();
        $insert = array();
        $old_products = $this->Migration_model->old_products();
        foreach($old_products as $key => $row) {
            $category_name = $row->NAMA_GROUP ? $row->NAMA_GROUP : "General";
            $categories = $this->API_model->get_data('categories', array('name' => $category_name), NULL, 'id');
            $category_id = NULL;
            if($categories) {
                foreach ($categories as $val) {
                    $category_id = $val->id;
                }
            }
            $size = $this->sizeMapping($row->TIPE);
            $qty = $this->qtyMapping($row->VOL, $size);
            $coverage = ($qty) ? ($qty['qty']*($size['length']/100)*($size['wide']/100)) : NULL;

            $condition = array(
                'category_id'   => $category_id,
                'name'          => $row->NAMA,
                'length'        => $size['length'],
                'wide'          => $size['wide'],
                'qty'           => $qty['qty'],
                'coverage >='   => $coverage - 0.00001,
                'coverage <='   => $coverage + 0.00001
            );
            $is_exist = $this->API_model->get_data('products', $condition, NULL, 'pid');
            if($is_exist) {
                $update[$key] = array(
                    'pid'           => $is_exist[0]->pid,
                    'category_id'   => $category_id,
                    'name'          => ($row->NAMA) ? $row->NAMA : NULL,
                    'length'        => ($size) ? $size['length'] : NULL,
                    'wide'          => ($size) ? $size['wide'] : NULL,
                    'qty'           => ($qty['qty']) ? $qty['qty'] : NULL,
                    'coverage'      => $coverage,
                    'updated_by'    => 'superadmin',
                    'updated_at'    => time()
                );
            } else {
                $insert[$key] = array(
                    'kode'          => $row->KODE,
                    'category_id'   => $category_id,
                    'name'          => ($row->NAMA) ? $row->NAMA : NULL,
                    'length'        => ($size) ? $size['length'] : NULL,
                    'wide'          => ($size) ? $size['wide'] : NULL,
                    'qty'           => ($qty) ? $qty['qty'] : NULL,
                    'coverage'      => $coverage,
                    'created_by'    => 'superadmin',
                    'created_at'    => time(),
                    'updated_by'    => 'superadmin',
                    'updated_at'    => time()
                );
            }
        }

        if($insert) $this->Migration_model->insert_products($insert);
        if($update) $this->Migration_model->update_products($update);
        return true;
    }

    public function reprocessProducts() {
        $this->Migration_model->delete_duplicates();
    }

    public function sizeMapping($size = NULL) {
        if(!$size) {
            return array(
                'length' => NULL,
                'wide' => NULL
            );
        } else {
            $value = explode("X", $size);
            return array(
                'length' => intval($value[0]),
                'wide' => intval($value[1])
            );
        }
    }

    public function qtyMapping($vol = NULL, $size = array()) {
        /*print_r($vol);
        print_r($size);
        echo 'size: '.($size['length']/100)*($size['wide']/100).' - ';
        echo 'qty: '.intval($vol*10000/($size['length'])*($size['wide'])).' - ';*/
        if(!$vol || !$size['length'] || !$size['wide']) {
            return array('qty' => NULL);
        } else {
            return array(
                'qty' => doubleval($vol/(($size['length']/100)*($size['wide']/100)))
            );
        }
    }

    public function sell() {
        $this->load->model('Migration_model');
        $old_selling = $this->Migration_model->old_selling();

        foreach($old_selling as $key=>$row) {
            $data[$key] = array(
                'id'            => $key,
                'date_faktur'   => ($row->TANGGAL) ? strtotime($row->TANGGAL) : NULL,
                'no_faktur'     => ($row->NOFAKTUR) ? $row->NOFAKTUR : NULL,
                'no_spj'        => ($row->NOSPJ) ? $row->NOSPJ : NULL,
                'top'           => ($row->TOP) ? $row->TOP : NULL,
                'date_jt'       => ($row->TGL_JT) ? strtotime($row->TGL_JT) : NULL,
                'sales_id'      => ($row->KD_SALES) ? $row->KD_SALES : NULL,
                'inventory_id'  => ($row->KD_GUD) ? $row->KD_GUD : NULL,
                'cust_id'       => ($row->KD_CUST) ? $row->KD_CUST : NULL,
                'price_total'   => ($row->JUMLAH) ? $row->JUMLAH : 0,
                'discount'      => ($row->POTONGAN) ? $row->POTONGAN : 0,
                'price_nett'    => ($row->JUMLAH_NET) ? $row->JUMLAH_NET : 0,
                'dp'            => ($row->DP) ? $row->DP : 0,
                'debt'          => ($row->SISA) ? $row->SISA : 0
            );

            $old_selling_detail = $this->Migration_model->old_selling_detail($row->IDTR);

            foreach ($old_selling_detail as $key_detail => $row_detail) {
                $data_detail[$key][$key_detail] = array(
                    'selling_id'    => $key,
                    'product_id'    => ($row_detail->KODE_BRG) ? $row_detail->KODE_BRG : NULL,
                    'qty'           => ($row_detail->QTY) ? $row_detail->QTY : 0,
                    'unit'          => ($row_detail->SATUAN) ? $row_detail->SATUAN : NULL,
                    'sell_price'    => ($row_detail->HARGA) ? $row_detail->HARGA : 0,
                    'discount1'     => ($row_detail->DISC_D) ? $row_detail->DISC_D : 0,
                    'discount2'     => ($row_detail->DISC2_D) ? $row_detail->DISC2_D : 0,
                    'potongan'      => ($row_detail->POT) ? $row_detail->POT : 0,
                    'ppn'           => ($row_detail->PPN) ? $row_detail->PPN : 0,
                    'sell_price_nett' => ($row_detail->HARGA_D) ? $row_detail->HARGA_D : 0,
                    'sell_price_total' => ($row_detail->JUMLAH) ? $row_detail->JUMLAH : 0,
                );
            }
        }

        $insert = $this->Migration_model->insert_selling($data);
        $insert_detail = $this->Migration_model->insert_selling_products($data_detail);

        $message = 'Migrasi data selling selesai.';
        if($insert['failed_list']) 
            $message .= ' Beberapa data yang gagal dimigrasi: '.$insert['failed_list'].'.';
        if($insert_detail['failed_list']) 
            $message .= ' Beberapa data product yang gagal dimigrasi: '.$insert_detail['failed_list'].'.';

        $this->session->set_flashdata('message', $message);
    }
}