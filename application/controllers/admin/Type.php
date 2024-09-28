<?php
defined('BASEPATH') or exit('No direct script access allowed');
// contoller Admin for User and types
class Type extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('List_model');
    if ($this->session->userdata('role') != 'Admin') {
      redirect('user');
    }
  }

  public function index()
  {
    $this->db->from('type')->order_by('type_name', 'ASC');
    $type = $this->db->get()->result_array();
    $data = array(
      'page_title' => 'Admin | Types',
      'type' => $type,
    );
    $this->template->load('template_a', 'admin/type', $data);
  }
  public function addtypeC()
  {
    $this->db->from('type')->where('type_name', $this->input->post('type_name'));
    $cek = $this->db->get()->row();
    if ($cek <> NULL) {
      $this->session->set_flashdata(
        'alert',
        '<div class="alert alert-warning alert-dismissible" role="alert">
        Type is Available!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'
      );
      redirect($_SERVER["HTTP_REFERER"]);
    }
    $this->List_model->addtype();
    $this->session->set_flashdata(
      'alert',
      '<div class="alert alert-success alert-dismissible" role="alert">
        Successfully added type!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'
    );
    redirect('admin/type');
  }
  public function updatetypeC()
  {
    $this->List_model->updatetype();
    $this->session->set_flashdata(
      'alert',
      '<div class="alert alert-success alert-dismissible" role="alert">
      Updated types!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
    );
    redirect('admin/type');
  }
  public function deletetype($id)
  {
    $id = array(
      'id_type' => $id
    );
    $this->db->delete('type', $id);
    $this->session->set_flashdata(
      'alert',
      '<div class="alert alert-success alert-dismissible" role="alert">
      Deleted type!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
    );
    redirect('admin/type');
  }
}
