<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 17/11/2016
 * Time: 14.03
 */
class Home extends CI_Controller {
    /**
     * Index Page for this controller.
     */
    
    public function index()
    {
        $this->template->title('Index');
        $this->template->build('index');
//        $this->load->view('index');
    }
    public function index2()
    {
        $this->template->title('Index2');
        $this->template->build('index2');
//        $this->load->view('index');
    }
    public function index3()
    {
        $this->template->title('Index3');
        $this->template->build('index3');
//        $this->load->view('index');
    }
}