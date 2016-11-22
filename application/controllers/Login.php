<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 17/11/2016
 * Time: 14.03
 */
class Login extends CI_Controller {
    /**
     * Index Page for this controller.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

	    $this->form_validation->set_rules('username', 'Username', 'callback_login_check');
		
		if ($this->form_validation->run() == FALSE)
		{
	    	$this->template->title('Login');
	        $this->template->set_layout('login');
	        $this->template->build('login');
	    }
	    else
	    {
	    	redirect('home');
	    }
    }

    public function login_check($username)
    {
        $this->load->model('user_model');
        $login = $this->user_model->login();
        if($login > 0)
        	return TRUE;
        else{
        	$this->form_validation->set_message('login_check', 'Username dan password yang Anda masukkan tidak cocok.');
        	return FALSE;
        }
    }
}