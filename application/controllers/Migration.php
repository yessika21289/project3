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
                    $size = $this->size_mapping($row->TIPE);
                    $qty = $this->qty_mapping($row->VOL, $size);
                    $data[$i] = array(
                        'category_id'   => ($id) ? $id[0]->id : NULL,
                        'name'          => ($row->NAMA) ? $row->NAMA : NULL,
                        'length'        => ($size) ? $size['length'] : NULL,
                        'wide'          => ($size) ? $size['wide'] : NULL,
                        'qty'           => ($qty) ? $qty['qty'] : NULL,
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

    public function size_mapping($size = NULL) {
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

    public function qty_mapping($vol = NULL, $size = array()) {
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
}