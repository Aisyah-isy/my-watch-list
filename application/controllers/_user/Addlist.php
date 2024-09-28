<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addlist extends CI_Controller
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
        $this->db->from('genre')->order_by('genre', 'ASC');
        $genre = $this->db->get()->result_array();

        $this->db->from('type')->order_by('type_name', 'ASC');
        $type = $this->db->get()->result_array();

        $data = array(
            'page_title' => 'MyWatchlist | Addlist',
            'genre' => $genre,
            'type' => $type,
        );
        $this->template->load('template_a', '_user/addlist', $data);
    }

    public function addlistC()
    {
        date_default_timezone_set('Asia/Jakarta');
        $name_image = date('YmdHis') . '.jpg';
        $config['upload_path']          = 'assets/upload/list';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['file_name']            = $name_image;
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
        // $this->List_model->addimage();

        $this->db->from('list')->where('title', $this->input->post('title'));
        $cek = $this->db->get()->row();
        if ($cek <> NULL) {
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-warning alert-dismissible" role="alert">
                    List is Available!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->List_model->addlist($name_image);
        $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-success alert-dismissible" role="alert">
                Successfully added list!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('_user/mylist');
    }
    // public function updatelistC()
    // {
    //     $this->List_model->updatelist();
    //     $this->session->set_flashdata(
    //         'alert',
    //         '<div class="alert alert-success alert-dismissible" role="alert">
    //     Updated lists!
    //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //   </div>'
    //     );
    //     redirect('_user/mylist');
    // }
    // public function deletelist($id)
    // {
    //     $id = array(
    //         'id_list' => $id
    //     );
    //     $this->db->delete('list', $id);
    //     $this->session->set_flashdata(
    //         'alert',
    //         '<div class="alert alert-success alert-dismissible" role="alert">
    //     Deleted list!
    //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //   </div>'
    //     );
    //     redirect('_user/mylist');
    // }
}
