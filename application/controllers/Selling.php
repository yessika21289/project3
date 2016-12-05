<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Selling extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function invoice($id)
    {
    	$this->load->model('Warehouse_model');
    	$warehouse = $this->Warehouse_model->get_data();
    	$this->load->model('Sales_model');
    	$sales = $this->Sales_model->get_data();
    	$this->load->model('Selling_model');
    	$selling = $this->Selling_model->get_data($id);

    	$this->load->helper('form');
    	$this->template->set('selling_id',$id);
    	$this->template->set('warehouse',$warehouse);
    	$this->template->set('sales',$sales);
    	$this->template->set('selling',$selling);
    	$this->template->title('Penjualan');
        $this->template->build('selling');
    }

    public function new_invoice()
    {
    	$this->load->model('Selling_model');
    	$insert_id = $this->Selling_model->create_new_invoice();
    	if($insert_id)
    		redirect('selling/invoice/'.$insert_id);
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

    public function getProductSelling(){
    	$this->load->model('Selling_model');
        $products = $this->Selling_model->get_product_selling();
        $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($products, JSON_PRETTY_PRINT))
          ->_display();
          exit;
    }

    public function getCustomerSelling() {
        $this->load->model('Customer_model');
        $customer = $this->Customer_model->get_data();

        echo json_encode($customer);
    }

    public function saveSelling()
    {	
    	$this->load->model('Selling_model');
    	$selling = $this->Selling_model->save_selling_header();
    	if($selling){
    		$this->session->set_flashdata('save_faktur','<div class="notif-box bg-success text-success">Data berhasil disimpan.</div>');
    		redirect('selling/invoice/'.$this->input->post('selling-id'));
    	}
    }

    public function saveProductSelling()
    {
    	$this->load->model('Selling_model');
        $products = $this->Selling_model->save_product_selling();
        $data['product_id'] = $this->input->post('product-id');
        $data['qty'] = $this->input->post('qty');
        $data['unit'] = $this->input->post('unit');
        $data['sell_price'] = $this->input->post('sell-price');
        $data['sell_price_total'] = $this->input->post('price-total');

    	$this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($data, JSON_PRETTY_PRINT))
          ->_display();
          exit;
    }
}