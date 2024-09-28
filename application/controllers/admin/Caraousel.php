<?php
defined('BASEPATH') or exit('No direct script access allowed');
// contoller Admin for User and Genres
class caraousel extends CI_Controller
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
        $this->db->from('caraousel')->order_by('title_car', 'ASC');
        $caraousel = $this->db->get()->result_array();
        $data = array(
            'page_title' => 'Admin | Caraousels',
            'caraousel' => $caraousel,
        );
        $this->template->load('template_a', 'admin/caraousel', $data);
    }
    // menambahkan caraousel ke table caraousel di halaman admin
    public function add()
    {
        $nameimage = date('YmdHis') . '.jpg';
        $config['upload_path']          = 'assets/upload/caraousel/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['file_name']            = $nameimage;
        $config['allowed_types']        = '*';
        $this->load->library('upload', $config);
        if ($_FILES['image']['size'] >= 500 * 1024) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('admin/caraousel' . $this->input->post('image'));
        } elseif (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'title_car' => $this->input->post('title'),
            'sub_title' => $this->input->post('sub_title'),
            'image' => $nameimage
        );
        $this->db->insert('caraousel', $data);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible" role="alert id="alert_demo_1">
        Add Caraousel!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('admin/caraousel');
    }
    public function delete($id)
    {
        $filename = FCPATH . '/assets/upload/caraousel/' . $id;
        if (file_exists($filename)) {
            unlink("./assets/upload/caraousel/" . $id);
        }
        $where = array(
            'image' => $id
        );
        $this->db->delete('caraousel', $where);
        $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-success alert-dismissible" role="alert">
            Deleted Caraousel Images!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/caraousel');
    }
}
