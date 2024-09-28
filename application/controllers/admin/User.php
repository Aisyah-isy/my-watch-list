<?php
defined('BASEPATH') or exit('No direct script access allowed');
// contoller Admin for User and Genres
class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    if ($this->session->userdata('role') != 'Admin') {
      redirect('user');
    }
  }
  public function index()
  {
    $this->db->from('user')->order_by('name', 'ASC');
    $user = $this->db->get()->result_array();

    $data = array(
      'page_title' => 'Admin | User',
      'user' => $user

    );
    $this->template->load('template_a', 'admin/user', $data);
  }
  public function adduserC()
  {
    $this->db->from('user')->where('username', $this->input->post('username'));
    $cek = $this->db->get()->row();
    if ($cek <> NULL) {
      $this->session->set_flashdata(
        'alert',
        '<div class="alert alert-warning alert-dismissible" role="alert">
        Username is Available!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'
      );
      redirect($_SERVER["HTTP_REFERER"]);
    }
    $this->User_model->adduser();
    $this->session->set_flashdata(
      'alert',
      '<div class="alert alert-success alert-dismissible" role="alert">
        Successfully added user!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'
    );
    redirect('admin/user');
  }
  public function delete($id)
  {
    $id = array(
      'id_user' => $id
    );
    $this->db->delete('user', $id);
    $this->session->set_flashdata(
      'alert',
      '<div class="alert alert-success alert-dismissible" role="alert">
      Deleted User!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
    );
    redirect('admin/user');
  }
  public function updateC()
  {
    $this->User_model->update();
    $this->session->set_flashdata(
      'alert',
      '<div class="alert alert-success alert-dismissible" role="alert">
      Updated User!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
    );
    redirect('admin/user');
  }
}