<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Selling extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
    {
    	$this->load->helper('form');
    	$this->template->title('Penjualan');
        $this->template->build('selling');
    }

    public function saveSelling()
    {
    	print_r($this->input->post());
    }
}