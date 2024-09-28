<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('List_model');
        if ($this->session->userdata('role') == NULL) {
            redirect('auth');
        }
        //  
    }
    // tampil di front end
    public function index()
    {
        $data = array(
            'page_title' => 'MyWatchlist | Contact Us',
            'list' => $this->List_model->list(),
            'genre' => $this->List_model->genre(),
            'type' => $this->List_model->type(),

        );
        $this->load->view('komponen/contact', $data);
    }
    // fungsi insert
    public function addcon()
    {
        $this->List_model->addcon();
        $this->session->set_flashdata(
          'alert',
          '<div class="alert alert-success alert-dismissible" role="alert">
            Successfully Send Message!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
        );
        redirect('contact');
    }
}
