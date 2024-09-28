<?php
defined('BASEPATH') or exit('No direct script access allowed');
// contoller Admin for User and Genres
class Genre extends CI_Controller
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
    $this->db->from('genre')->order_by('genre', 'ASC');
    $genre = $this->db->get()->result_array();
    $data = array(
      'page_title' => 'Admin | Genres',
      'genre' => $genre,
    );
    $this->template->load('template_a', 'admin/genre', $data);
  }
  // menambahkan genre ke table genre di halaman admin
  public function addgenreC()
  {
    $this->db->from('genre')->where('genre', $this->input->post('genre'));
    $cek = $this->db->get()->row();
    if ($cek <> NULL) {
      $this->session->set_flashdata(
        'alert',
        '<div class="alert alert-warning alert-dismissible" role="alert">
        Genre is Available!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'
      );
      redirect($_SERVER["HTTP_REFERER"]);
    }
    $this->List_model->addgenre();
    $this->session->set_flashdata(
      'alert',
      '<div class="alert alert-success alert-dismissible" role="alert">
        Successfully added genre!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'
    );
    redirect('admin/genre');
  }
  public function updategenreC()
  {
    $this->List_model->updategenre();
    $this->session->set_flashdata(
      'alert',
      '<div class="alert alert-success alert-dismissible" role="alert">
      Updated Genres!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
    );
    redirect('admin/genre');
  }
  public function deletegenre($id)
  {
    $id = array(
      'id_genre' => $id
    );
    $this->db->delete('genre', $id);
    $this->session->set_flashdata(
      'alert',
      '<div class="alert alert-success alert-dismissible" role="alert">
      Deleted Genre!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
    );
    redirect('admin/genre');
  }
}
