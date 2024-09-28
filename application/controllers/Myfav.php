<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myfav extends CI_Controller
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
        if ($this->List_model->fav() != true) {
            $data = array(
                'page_title' => 'MyWatchlist | MyFvlist',
                'fav' => $this->List_model->fav(),
                'genre' => $this->List_model->genre(),
                'type' => $this->List_model->type(),
            );
            $this->load->view('komponen/null', $data);
        }else{
            $data = array(
                'page_title' => 'MyWatchlist | MyFvlist',
                'fav' => $this->List_model->fav(),
                'genre' => $this->List_model->genre(),
                'type' => $this->List_model->type(),
    
            );
            $this->template->load('_template', 'komponen/myfav', $data);
        }
        
    }
}
