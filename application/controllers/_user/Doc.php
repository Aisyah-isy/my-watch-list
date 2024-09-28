<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') == NULL) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data = array(
            'page_title' => 'MyWatchlist | Dokumentasi Program Video Player',
        );
        $this->template->load('template_a', '_user/doc_pbo', $data);
    }
}