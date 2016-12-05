<?php
class Selling_model extends CI_Model
{
	function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function get_data($id = 0) {
    	$this->db->join('customer','customer.KODE = selling.cust_id');
    	$query = $this->db->get_where('selling', array('id'=>$id));
        return $query->result_array();
    }

    function create_new_invoice(){
    	$this->db->set('created_at', strtotime('now'));
    	$this->db->set('created_by', 'admin');
    	$this->db->set('updated_at', strtotime('now'));
    	$this->db->set('updated_by', 'admin');
    	$this->db->insert('selling');
    	return $this->db->insert_id();
    }

    function get_product_selling(){
    	$query = $this->db->get('selling_products');
    	return $query->result_array();
    }

    function save_product_selling(){
    	$this->db->set('selling_id', $this->input->post('selling-id'));
    	$this->db->set('product_id', $this->input->post('product-id'));
    	$this->db->set('qty', $this->input->post('qty'));
    	$this->db->set('unit', $this->input->post('unit'));
    	$this->db->set('sell_price', $this->input->post('sell-price'));
    	$this->db->set('discount1', $this->input->post('discount-1'));
    	$this->db->set('discount2', $this->input->post('discount-2'));
    	$this->db->set('potongan', $this->input->post('discount-3'));
    	$this->db->set('ppn', $this->input->post('ppn'));
    	$this->db->set('sell_price_nett', $this->input->post('price-nett'));
    	$this->db->set('sell_price_total', $this->input->post('price-total'));
    	$this->db->set('created_at', strtotime('now'));
    	$this->db->set('updated_by', 'admin');
    	$this->db->set('updated_at', strtotime('now'));
    	$this->db->set('updated_by', 'admin');
    	$this->db->insert('selling_products');
    	return $this->db->insert_id();
    }

    function save_selling_header(){
    	$data = array(
    		'date_faktur' => strtotime($this->input->post('faktur-date')),
    		'no_faktur' => $this->input->post('faktur-no'),
    		'no_spj' => $this->input->post('spj-no'),
    		'top' => $this->input->post('top'),
    		'date_jt' => strtotime($this->input->post('jt-date')),
    		'sales_id' => $this->input->post('sales'),
    		'warehouse_id' => $this->input->post('warehouse'),
    		'cust_id' => $this->input->post('cust-id'),
    		'price_total' => $this->input->post('grand-total'),
    		'discount' => $this->input->post('grand-discount'),
    		'price_nett' => $this->input->post('grand-total-nett'),
    		'dp' => $this->input->post('dp'),
    		'debt' => $this->input->post('debt'),
    		'updated_at' => strtotime('now'),
    		'updated_by' => 'admin'
    	);
    	$this->db->where('id',$this->input->post('selling-id'));
    	$query = $this->db->update('selling',$data);
    	return $query;
    }
}