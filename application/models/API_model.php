<?php
/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 01/12/2016
 * Time: 23.01
 */

class API_model extends CI_Model
{
    function get_data($table, $where = array(), $order_by = array(), $column = NULL) {
        if($column) {
            $this->db->select($column);
        }
        if($where) {
            $this->db->where($where);
        }
        if($order_by) {
            foreach($order_by as $key => $val) {
                $this->db->order_by($key, $val);
            }
        }
        $query = $this->db->get($table);
        $result = $query->result();
        if($result)
            return $result;
        else return NULL;
    }

}