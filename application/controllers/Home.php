<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('List_model');
        //  
    }
    public function index()
    {
        if ($this->List_model->list() != true) {
            //jika where nama nya tidak sama dengan user data yang login maka akan tertampil null
            $data = array(
                'page_title' => 'MyWatchlist | Homepage',
                'list' => $this->List_model->list(),
                'genre' => $this->List_model->genre(),
                'type' => $this->List_model->type(),
               
            );
            $this->load->view('komponen/null', $data);
        } else {
            $data = array(
                'page_title' => 'MyWatchlist | Homepage',
                'list' => $this->List_model->list(),
                'genre' => $this->List_model->genre(),
                'type' => $this->List_model->type(),

            );
            $this->template->load('_template', 'dashboard', $data);
        }
    }
    // menampilkan list berdasarkan id tipe yang di input di halaman frontend
    public function get_type($id)
    {
        $name_type = $this->List_model->get_type($id);
        if ($this->List_model->get_type_id($id) != true) {//jika yang di cek tidak sama dengan benar di tampilkan null
            $data = array(
                'page_title' => 'MyWatchlist | Mylist | ' . $name_type,
                'genre' => $this->List_model->genre(),
                'type' => $this->List_model->type(),
                'name_type' => $name_type,
                'get_type_id' => $this->List_model->get_type_id($id),
            );
            $this->load->view('komponen/null', $data);
        } else {
            $data = array(
                'page_title' => 'MyWatchlist | Mylist | ' . $name_type,
                'genre' => $this->List_model->genre(),
                'type' => $this->List_model->type(),
                'name_type' => $name_type,
                'get_type_id' => $this->List_model->get_type_id($id),
            );
            $this->template->load('_template', 'komponen/_type', $data);
        }
        
    }
        // menampilkan list berdasarkan id genre yang di input di halaman frontend
    public function get_genre($id)
    {
        $name_genre = $this->List_model->get_genre($id);
        if($this->List_model->get_genre_id($id) != true){
            $data = array(
                'page_title' => 'MyWatchlist | Mylist | ' . $name_genre,
                'genre' => $this->List_model->genre(),
                'type' => $this->List_model->type(),
                'name_genre' => $name_genre,
                'get_genre_id' => $this->List_model->get_genre_id($id),
            );
            $this->load->view('komponen/null', $data);
        }else{
            $data = array(
                'page_title' => 'MyWatchlist | Mylist | ' . $name_genre,
                'genre' => $this->List_model->genre(),
                'type' => $this->List_model->type(),
                'name_genre' => $name_genre,
                'get_genre_id' => $this->List_model->get_genre_id($id),
    
            );
            $this->template->load('_template', 'komponen/_genre', $data);
        }
        
    }
    // menampilkan detail list berdasarkan id list
    public function detail_list($id)
    {
        $detail = $this->List_model->get_detail_id($id);
        $data = array(
            'page_title' => 'MyWatchlist | ' . $detail->title,
            'list' => $this->List_model->list(),
            'genre' => $this->List_model->genre(),
            'type' => $this->List_model->type(),
            'detail' => $detail,
        );
        $this->load->view('komponen/_detaillist', $data);
    }

    // public function serch(){
    //     $kyword = $this->input->post('serch');
    //     if ( $this->input->post('submit')) {
    //             $data['keyword'] = $this->input->post('keyword');
    //             $this->session->set_userdata('keyword', $data['keyword']);
    //         } else {
    //             $data['keyword'] = $this->session->userdata('keyword');
    //         }
    //         $config['total_rows'] = $this->db->count_all_results();
    //         $data['total_rows'] = $config['total_rows'];
    //         $data['get_serch'] = $this->List_model->get_serch($kyword);
    //     $data = array(
    //         'page_title' => 'MyWatchlist | Search',
    //         'list' => $this->List_model->list(),
    //         'genre' => $this->List_model->genre(),
    //         'type' => $this->List_model->type(),
    //         'get_serch' => $this->List_model->get_serch($kyword),
    //     );

    //     $this->template->load('_template', 'komponen/_serchlist', $data);
    // }
}
