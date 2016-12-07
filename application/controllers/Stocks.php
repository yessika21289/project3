<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 17/11/2016
 * Time: 14.03
 */
class Stocks extends CI_Controller {
    /**
     * Index Page for this controller.
     */

    public function __construct() {
        parent::__construct();
        $this->load->model('API_model');
        $this->load->model('Stocks_model');
    }

    public function index()
    {
        $this->template->title('Stok');
        $this->template->build('stock_list');
    }
    
    public function getData() {
        $stocks = $this->Stocks_model->get_data();
        $i = 0;

        foreach($stocks as $row) {
            $stocks[$i]['size'] = $row['length'].'x'.$row['wide'];
            $stocks[$i]['coverage'] = ($row['coverage'] && $row['box']) ? $row['coverage']*$row['box'] : NULL;
            $stocks[$i]['action'] =
                '<button type="submit" product_id="'.$row['pid'].'" class="btn btn-primary edit_btn" ><i class="fa fa-edit"></i></button>
                <button type="submit" product_id="'.$row['pid'].'" class="btn btn-primary del_btn"><i class="fa fa-remove"></i></button>';
            $i++;
        }
//        print_r($stocks);exit;
        echo json_encode($stocks);
    }
    
    public function getCategories() {
        $categories = $this->Stocks_model->get_categories();
        $data = array();
        foreach ($categories as $key => $value) {
            $data[$key]['id'] = $key;
            $data[$key]['name'] = $value->name;
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }
    
    public function getNames() {
        $names = $this->Stocks_model->get_names();
        $data = array();
        foreach ($names as $key => $value) {
            $data[$key]['id'] = $key;
            $data[$key]['name'] = $value->name;
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function add() {
        $data['warehouses'] = $this->API_model->get_data('warehouses', NULL, ['main' => 'DESC'], 'name');
        $this->template->title('Stok Barang');
        $this->template->build('add_stock_form', $data);
    }
    
    public function addData() {
        print_r($this->input->post());exit;
        if($_POST) {
            $now = time();
            $this->Stocks_model->add_data($this->input->post());
        }
    }
}