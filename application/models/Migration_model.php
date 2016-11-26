<?php
/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 22/11/2016
 * Time: 23.49
 */

class Migration_model extends CI_Model
{
    function old_stok() {
        $this->db->select('NAMA_GROUP, NAMA, TIPE, VOL, G00001');
        $query = $this->db->get('stok');
        return $query->result();
    }

    function insert_products($data) {
        $failed = array();
        foreach($data as $val) {
            $insert = $this->db->insert('products', $val);
            if(!$insert) {
                $failed[] = $val['name'];
            }
        }

        return array(
            'status' => true,
            'failed_list' => implode(', ', $failed)
        );

    }
}