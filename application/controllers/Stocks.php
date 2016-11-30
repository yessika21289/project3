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
        $this->load->model('Stocks_model');
    }

    public function index()
    {
        $this->template->title('Stok Barang');
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
        echo json_encode($categories);
    }
    
    public function addData() {
        print_r($_POST);exit;
        if($_POST) {
            $now = time();
            $this->Stocks_model->add_data($_POST);
        }
    }
}