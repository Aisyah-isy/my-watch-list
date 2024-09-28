<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        //  
    }
    // tampil di admin
    public function index()
    {
        $data = array(
            'page_title' => 'Admin | Contact Message',
            'con' => $this->User_model->get_contact(),

        );
        $this->template->load('template_a','admin/contact', $data);
    }
// admin hanya bisa mengahpus
    public function deletecon($id){
        $id = array(
            'id_contact' => $id
          );
          $this->db->delete('contact', $id);
          $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-success alert-dismissible" role="alert">
            Deleted Message!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
          );
          redirect('admin/contact');
    }
}
