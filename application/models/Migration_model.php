<?php
/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 22/11/2016
 * Time: 23.49
 */

class Migration_model extends CI_Model
{
    function old_products() {
        $this->db->select('NAMA_GROUP, NAMA, TIPE, VOL, KODE');
        $this->db->group_by(array('NAMA_GROUP', 'NAMA', 'TIPE' ,'VOL'));
        $query = $this->db->get('stok');
        return $query->result();
    }
    
    function insert_products($data) {
        $this->db->insert_batch('products', $data);
        return true;
    }

    function update_products($data) {
        $this->db->update_batch('products', $data, 'pid');
        return true;
    }

    function delete_duplicates() {
        $this->db->query('DELETE FROM products WHERE pid NOT IN (SELECT pid FROM (SELECT MAX(pid) AS pid FROM `products` GROUP BY name, length, wide, qty, coverage) AS x)');
    }
    
    function old_stok($param) {
        if($param) {
            $this->db->where($param);
        }
        $query = $this->db->get('stok');
        return $query->result();
    }

    function insert_stocks($data) {
        $this->db->insert('stocks', $data);
    }

    function old_selling() {
        $query = $this->db->get('hretail');
        return $query->result();
    }

    function old_selling_detail($idtr) {
        $query = $this->db->get_where('dretail', array('IDTR'=>$idtr));
        return $query->result();
    }

    function insert_selling($data) {
        $failed = array();
        foreach($data as $val) {
        $this->session->set_flashdata('message', implode(', ',$val));
            $insert = $this->db->insert('selling', $val);
            if(!$insert) {
                $failed[] = $val['id'].'-'.$val['no_faktur'];
            }
        }

        return array(
            'status' => true,
            'failed_list' => implode(', ', $failed)
        );

    }

    function insert_selling_products($data) {
        $failed = array();
        foreach($data as $val) {
            foreach($val as $val2) {
                $insert = $this->db->insert('selling_products', $val2);
                if(!$insert) {
                    $failed[] = $val['selling_id'].'-'.$val['product_id'];
                }
            }
        }

        return array(
            'status' => true,
            'failed_list' => implode(', ', $failed)
        );

    }
}