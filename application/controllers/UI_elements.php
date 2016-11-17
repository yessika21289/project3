<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 17/11/2016
 * Time: 14.03
 */
class UI_elements extends CI_Controller {
    /**
     * Index Page for this controller.
     */

    public function index()
    {
        $this->template->title('UI Elements');
        $this->template->build('general_elements');
    }

    public function media_gallery()
    {
        $this->template->title('Form Media Gallery');
        $this->template->build('media_gallery');
    }

    public function typography()
    {
        $this->template->title('Typography');
        $this->template->build('typography');
    }

    public function icons()
    {
        $this->template->title('Icons');
        $this->template->build('icons');
    }

    public function glyphicons()
    {
        $this->template->title('Glyphicons');
        $this->template->build('glyphicons');
    }

    public function widgets()
    {
        $this->template->title('Widgets');
        $this->template->build('widgets');
    }

    public function invoice()
    {
        $this->template->title('Invoice');
        $this->template->build('invoice');
    }

    public function inbox()
    {
        $this->template->title('Inbox');
        $this->template->build('inbox');
    }

    public function calendar()
    {
        $this->template->title('Calendar');
        $this->template->build('calendar');
    }
}