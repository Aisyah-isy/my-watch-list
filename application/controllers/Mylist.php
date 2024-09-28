<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mylist extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('List_model');
        if ($this->session->userdata('role') == NULL) {
            redirect('auth');
        }
    }
    public function index()
    {
        if ($this->List_model->list() != true) {
            $data = array(
                'page_title' => 'MyWatchlist | Mylist',
                'list' => $this->List_model->list(),
                'genre' => $this->List_model->genre(),
                'type' => $this->List_model->type(),
            );
            $this->load->view('komponen/null', $data);
        }else{
            $data = array(
                'page_title' => 'MyWatchlist | Mylist',
                'list' => $this->List_model->list(),
                'genre' => $this->List_model->genre(),
                'type' => $this->List_model->type(),
            );
            $this->template->load('_template', 'komponen/mylist', $data);
        }
        
    }

}
