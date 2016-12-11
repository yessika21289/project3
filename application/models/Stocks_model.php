<?php
/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 23/11/2016
 * Time: 00.31
 */

class Stocks_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function get_products() {
        $this->db->select('categories.*, categories.name as category, products.*');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.category_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_stocks() {
        $this->db->select('categories.*, categories.name as category, products.*, SUM(stocks.box) AS box, SUM(stocks.total) AS total');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.category_id', 'left');
        $this->db->join('stocks', 'stocks.pid = products.pid', 'left')->group_by('pid');
        $this->db->order_by('products.updated_at', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_product_names() {
        $this->db->distinct();
        $this->db->select('name');
        $this->db->order_by('name');
        $query = $this->db->get('products');
        return $query->result();
    }

    function add_product($data) {
        $new_pid = $this->db->insert('products', $data);

        if($new_pid)
            return array(
                'status'    => TRUE,
                'new_pid'   => $this->db->insert_id()
            );
        else
            return arraY(
                'status'    => FALSE,
                'message'   => 'Gagal menambahkan produk baru.'
            );
    }

    function add_stock($data) {
        $new_stock = $this->db->insert('stocks', $data);
        if($new_stock) {
            return array(
                'status'    => TRUE,
                'new_pid'   => 'Berhasil menambahkan stok.'
            );
        } else {
            return arraY(
                'status'    => FALSE,
                'message'   => 'Gagal menambahkan stok.'
            );
        }
    }
}