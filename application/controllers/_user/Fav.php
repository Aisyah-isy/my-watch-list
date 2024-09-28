<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fav extends CI_Controller
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
        $data = array(
            'page_title' => 'MyWatchlist | Favorite',
            'fav'   =>  $this->List_model->fav(),
            'list' => $this->List_model->list(),
        );
        $this->template->load('template_a', '_user/fav', $data);
    }
    
    // untuk menambahkan ke table fav,dengan logika jika list yang di inputkan dicek
    // dan kosong, maka list tersebut akan di tambahkan
    public function addfav()
    {
        $cek = $this->List_model->cekfav();
        
        if($cek<>NULL){
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-danger alert-dismissible" role="alert">
                List ALredy add!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('myfav');
        }else{
            $this->List_model->addfav();
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-success alert-dismissible" role="alert">
                Add to Your Favorite List!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
        }
        redirect('myfav');
    }
    // fungsi delete iist untuk backend
    public function delete($id){
        $id = array(
            'id_fav' => $id
          );
          $this->db->delete('fav', $id);
          $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-success alert-dismissible" role="alert">
            Deleted Genre!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
          );
          redirect('_user/fav');
    }
    // fungsi delete list untuk frontend
    public function deleteB($id){
        $id = array(
            'id_fav' => $id
          );
          $this->db->delete('fav', $id);
          $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-success alert-dismissible" role="alert">
            Deleted Genre!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
          );
          redirect('myfav');
    }
}
