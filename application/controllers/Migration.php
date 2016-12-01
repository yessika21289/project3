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

    public function index()
    {
        $this->template->title('Migrasi Data');
        if(!$_GET) {
            $data['message'] = $this->session->flashdata('message');
            $this->template->build('migration', $data);
        } else {
            if($_GET['migrate'] == 'stocks') {
                $this->load->model('Migration_model');
                $old_stok = $this->Migration_model->old_stok();

                $i = 0;
                foreach($old_stok as $row) {
                    $this->load->model('Categories_model');
                    $id = $this->Categories_model->get_categories('id', array('name' => $row->NAMA_GROUP));
                    $size = $this->sizeMapping($row->TIPE);
                    $qty = $this->qtyMapping($row->VOL, $size);
                    $data[$i] = array(
                        'category_id'   => ($id) ? $id[0]->id : NULL,
                        'name'          => ($row->NAMA) ? $row->NAMA : NULL,
                        'length'        => ($size) ? $size['length'] : NULL,
                        'wide'          => ($size) ? $size['wide'] : NULL,
                        'qty'           => ($qty) ? $qty['qty'] : NULL,
                        'box'           => ($row->G00001) ? $row->G00001 : NULL,
                        'total'         => ($qty && $row->G00001) ? $qty['qty']*$row->G00001 : NULL,
                        'coverage'      => ($qty) ? ($qty['qty']*($size['length']/100)*($size['wide']/100)) : NULL
                    );
                    $i++;
                }

                $insert = $this->Migration_model->insert_products($data);

                $message = 'Migrasi data stok selesai.';
                if($insert['failed_list']) $message .= ' Beberapa data yang gagal dimigrasi: '.$insert['failed_list'].'.';

                $this->session->set_flashdata('message', $message);
            }
        }
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