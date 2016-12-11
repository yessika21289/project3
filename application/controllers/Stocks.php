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
        $data['report'] = ($this->session->flashdata('report')) ? $this->session->flashdata('report') : '';
        $this->template->title('Stok');
        $this->template->build('stock_list', $data);
    }
    
    public function getData() {
        $stocks = $this->Stocks_model->get_stocks();

        foreach($stocks as $key => $row) {
            $stocks[$key]['size'] = $row['length'].'x'.$row['wide'];
            $stocks[$key]['coverage'] = ($row['coverage'] && $row['box']) ? $row['coverage']*$row['box'] : NULL;
            $stocks[$key]['action'] =
                '<button type="submit" product_id="'.$row['pid'].'" class="btn btn-primary edit_btn" ><i class="fa fa-edit"></i></button>
                <button type="submit" product_id="'.$row['pid'].'" class="btn btn-primary del_btn"><i class="fa fa-remove"></i></button>';
        }
        echo json_encode($stocks);
    }

    public function getStockSelling() {
        $this->load->model('Stocks_model');
        $stocks = $this->Stocks_model->get_data();

        foreach($stocks as $key=>$row) {
            $stocks[$key]['size'] = $row['length'].'x'.$row['wide'];
            $stocks[$key]['coverage'] = ($row['coverage'] && $row['box']) ? $row['coverage']*$row['box'] : NULL;
        }

        echo json_encode($stocks);
    }
    
    public function getCategories() {
        $categories = $this->API_model->get_data('categories', NULL, ['name' => 'ASC']);
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
        $names = $this->Stocks_model->get_product_names();
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

    public function inputForm() {
        $this->template->title('Stok Barang');
        $this->template->build('add_stock_form');
    }
    
    public function addData() {
        $post = $this->input->post();

        $category_name = $this->input->post('category_name');
        $is_category_exist = $this->API_model->get_data('categories', ['name' => $category_name], NULL, 'id');
        if($is_category_exist) {
            $post['category_id'] = $is_category_exist[0]->id;
        } else {
            $this->load->model('Categories_model');
            $post['category_id'] = $this->Categories_model->add_category($category_name);
        }

        $where = array(
            'category_id'   => $post['category_id'],
            'name'          => $post['name'],
            'length'        => $post['length'],
            'wide'          => $post['wide'],
            'qty'           => $post['qty']
        );
        $is_product_exist = $this->API_model->get_data('products', $where, NULL, 'pid');

        if(!$is_product_exist) {
            $new_product = array(
                'category_id' => $post['category_id'],
                'name' => $post['name'],
                'length' => $post['length'],
                'wide' => $post['wide'],
                'qty' => $post['qty'],
                'coverage' => $post['qty'] * ($post['length'] / 100) * ($post['wide'] / 100),
                'selling_price' => $post['selling_price'],
                'created_by' => 'superadmin',
                'created_at' => time(),
                'updated_by' => 'superadmin',
                'updated_at' => time()
            );
            $add_product = $this->Stocks_model->add_product($new_product);
            if ($add_product['status']) {
                $post['pid'] = $add_product['new_pid'];
            } else {
                $this->session->set_flashdata('report', array(
                    'status' => $add_product['status'],
                    'message' => $add_product['message']
                ));
                redirect('Stocks');
            }
        } else {
            $post['pid'] = $is_product_exist[0]->pid;
        }

        $new_stock = array(
            'pid'           => $post['pid'],
            'box'           => $post['box'],
            'total'         => $post['box']*$post['qty'],
            'created_by'    => 'superadmin',
            'created_at'    => time(),
            'updated_by'    => 'superadmin',
            'updated_at'    => time()
        );
        $add_stock = $this->Stocks_model->add_stock($new_stock);
        $this->session->set_flashdata('report', array(
            'status' => $add_stock['status'],
            'message' => $add_stock['message']
        ));
        redirect('Stocks');
    }
}