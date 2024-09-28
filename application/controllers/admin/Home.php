<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('List_model');
    }
	public function index()
	{
        
        $data = array(
            'page_title' => 'Admin | Dashboard',
            'countlist'   =>  $this->List_model->countlist(),
            'countfav'   =>  $this->List_model->countfav(),
        );
		$this->template->load('template_a','admin/dashboard',$data);
	}
}
