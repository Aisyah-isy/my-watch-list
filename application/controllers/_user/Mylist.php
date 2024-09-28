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
        $data = array(
            'page_title' => 'MyWatchlist | Mylist',
            'list' => $this->List_model->list(),
            'genre' => $this->List_model->genre(),
            'type' => $this->List_model->type(),

        );
        $this->template->load('template_a', '_user/mylist', $data);
    }
    public function delete_listC($id)
    {
        $filename = FCPATH . '/assets/upload/list/' . $id;
        if (file_exists($filename)) {
            unlink("./assets/upload/list/" . $id);
        }
        $id = array(
            'image' => $id
        );
        $this->db->delete('list', $id);
        $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-success alert-dismissible" role="alert">
            Deleted List!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>'
        );
        redirect('_user/mylist');
    }
    
    public function updatelistC()
    {

        date_default_timezone_set('Asia/Jakarta');
        $name_image = $this->input->post('image');
        $config['upload_path']          = 'assets/upload/list';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['file_name']            = $name_image;
        $config['overwrite']            = true;
        $config['allowed_types']        = '*';
        $this->load->library('upload', $config);
        if ($_FILES['name_image']['size'] >= 500 * 1024) {
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-danger alert-dismissible" role="alert">
                  Successfully added list!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('_user/addlist');
        } elseif (!$this->upload->do_upload('name_image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        
        $where =[
            'image' =>  $this->input->post('image'),
        ];
        $this->List_model->updatelist($where);
        $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-success alert-dismissible" role="alert">
                    Successfully Updated list!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
        );
        redirect('_user/mylist');
    }
    public function genre($id)
    {
        $this->db->from('list a');
        $this->db->join('genre b', 'a.id_genre=b.id_genre', 'left');
        $this->db->where('a.id_genre', $id);
        $genre = $this->db->get()->result_array();

        $data = array(
            'page_title' => 'MyWatchlist | Mylist',
            'list' => $this->List_model->list(),
            'genre' => $genre,
            'type' => $this->List_model->type(),

        );
        $this->template->load('template_a', '_user/mylist', $data);
    }
}
