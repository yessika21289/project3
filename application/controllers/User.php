<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 17/11/2016
 * Time: 14.03
 */
class User extends CI_Controller {
    /**
     * Index Page for this controller.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $row = $this->user_model->get_user();
        $this->template->set('row',$row);
        $this->template->title('Daftar User');
        $this->template->build('userlist');
    }

    public function add()
    {
        $this->template->title('Tambah User');
        $this->template->build('adduser');
    }

    public function addedit_process()
    {
        $user_id = $this->input->post('user_id');
        $this->username = $this->input->post('username');
        $this->nama = $this->input->post('nama');
        $pwd = $this->input->post('pwd');
        $conf_pwd = $this->input->post('conf-pwd');
        $this->area = $this->input->post('area');

        if($pwd != $conf_pwd){
            $this->template->set('row',$this);
            $this->session->set_flashdata('error','<div class="notif-box bg-danger text-danger">Password tidak sama.</div>');
            redirect('user/add');
        }
        else{
            if(empty($user_id))
                $this->user_model->add_user();
            else
                $this->user_model->edit_user();
            redirect('user');
        }
    }

    public function edit($id)
    {
        $row = $this->user_model->get_user($id);
        $this->template->set('row',$row);
        $this->template->set('user_id',$id);
        $this->template->title('Edit User');
        $this->template->build('adduser');
    }

    public function delete($id)
    {
        $row = $this->user_model->delete_user($id);
        redirect('user');
    }

    public function exist_area() //API
    {
        $response = $this->user_model->area();
        $data = array();
        foreach ($response as $key => $value) {
            $data[$key]['id'] = $key;
            $data[$key]['name'] = $value->area;
        }

        $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($data, JSON_PRETTY_PRINT))
          ->_display();
          exit;
    }

    public function duplicate_check($username)
    {
        $response = $this->user_model->check_username($username);
        $data = array();
        if($response > 1)
            $data['response'] = TRUE;
        else
            $data['response'] = FALSE;

        $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($data, JSON_PRETTY_PRINT))
          ->_display();
        exit;
    }

    public function user_access()
    {
        $row = $this->user_model->get_user_access();
        $this->template->set('row',$row);
        $this->template->title('Akses User');
        $this->template->build('user_access');
    }

    public function savePermission()
    {
        $save = $this->user_model->update_permission();
        return $save;
    }
}