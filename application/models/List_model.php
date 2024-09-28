<?php
defined('BASEPATH') or exit('No direct script access allowed');
// MODEL USER AND GENRE
class List_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function addgenre()
    { {
            $data = array(
                'genre' => $this->input->post('genre'),
            );
            $this->db->insert('genre', $data);
        }
    }
    public function updategenre()
    {
        $where = array(
            'id_genre'   =>  $this->input->post('id_genre')
        );
        $data = array(
            'genre'      =>  $this->input->post('genre'),
        );
        $this->db->update('genre', $data, $where);
    }
    public function addtype()
    {
        $data = array(
            'type_name' => $this->input->post('type_name'),
        );
        $this->db->insert('type', $data);
    }
    public function updatetype()
    {
        $where = array(
            'id_type'   =>  $this->input->post('id_type')
        );
        $data = array(
            'type_name'      =>  $this->input->post('type_name'),
        );
        $this->db->update('type', $data, $where);
    }
    public function addimages()
    {
        $data = [
            'name_image' => $this->input->post('name_image'),
        ];
        $this->db->insert('images', $data);
    }
    public function addlist($name_image)
    {
        $data = [
            'id_user'       => $this->input->post('id_user'),
            'id_genre'      => $this->input->post('id_genre'),
            'id_type'       => $this->input->post('id_type'),
            'title'         => $this->input->post('title'),
            'description'   => $this->input->post('description'),
            'rate'          => $this->input->post('rate'),
            'watch'         => $this->input->post('watch'),
            'statues'       => $this->input->post('statues'),
            'release_at'    => $this->input->post('date'),
            'create_at'     => date('Y-m-d H:i:s'),
            'image'         => $name_image,
            'slug'          => str_replace(' ', '-', $this->input->post('title'))
        ];
        $this->db->insert('list', $data);
    }
    public function updatelist($where)
    {
        $data = [
            'id_genre'      => $this->input->post('id_genre'),
            'id_type'       => $this->input->post('id_type'),
            'title'         => $this->input->post('title'),
            'description'   => $this->input->post('description'),
            'rate'          => $this->input->post('rate'),
            'watch'         => $this->input->post('watch'),
            'statues'       => $this->input->post('statues'),
            'release_at'    => $this->input->post('date'),
            'update_at'     => date('Y-m-d H:i:s'),
            'slug'          => str_replace(' ', '-', $this->input->post('title'))
        ];
        $this->db->update('list', $data, $where);
    }
    // get data list & data table lain untuk di tampilkan di ui list
    public function list()
    {
        $this->db->from('list a');
        $this->db->join('genre b', 'a.id_genre=b.id_genre', 'left');
        $this->db->join('user c', 'a.id_user=c.id_user', 'left');
        $this->db->join('type d', 'a.id_type=d.id_type', 'left');
        $this->db->order_by('title', 'ASC');
        $this->db->where('name',$this->session->userdata('name'));
        $list = $this->db->get()->result_array();
        return $list;
    }
    public function get_caraousel(){
        $this->db->from('caraousel')->order_by('title_car', 'ASC');
        $caraousel = $this->db->get()->result_array();
        return $caraousel;
    }
    // get all data in table type 
    public function type()
    {
        $this->db->from('type')->order_by('type_name', 'ASC');
        $type = $this->db->get()->result_array();
        return $type;
    }
    // get all data in table genre 
    public function genre()
    {
        $this->db->from('genre')->order_by('genre', 'ASC');
        $genre = $this->db->get()->result_array();
        return $genre;
    }
    // get all data form list di uurtkan berdasarkan kapan waktu list di buat (table list.create_at) dgn limit tampilan 5
    public function recent()
    {
        $this->db->from('list a');
        $this->db->join('genre b', 'a.id_genre=b.id_genre', 'left');
        $this->db->join('user c', 'a.id_user=c.id_user', 'left');
        $this->db->join('type d', 'a.id_type=d.id_type', 'left');
        $this->db->order_by('a.create_at', 'DESC');
        $this->db->where('name',$this->session->userdata('name'));
        $this->db->limit(5);
        $recent = $this->db->get()->result_array();
        return $recent;
    }
    // get all form list berdasarkan acak limit tamoilan 5
    // public function bawahrecent()
    // {
    //     $this->db->from('list a');
    //     $this->db->join('genre b', 'a.id_genre=b.id_genre', 'left');
    //     $this->db->join('user c', 'a.id_user=c.id_user', 'left');
    //     $this->db->join('type d', 'a.id_type=d.id_type', 'left');
    //     $this->db->order_by('a.title', 'DESC');
    //     $this->db->limit(5);
    //     $bawahrecent = $this->db->get()->result_array();
    //     return $bawahrecent;
    // }
    // get list by id_type di table list berdasarkan input id_type
    public function get_type_id($id)
    {
        $this->db->from('list a');
        $this->db->join('genre b', 'a.id_genre=b.id_genre', 'left');
        $this->db->join('user c', 'a.id_user=c.id_user', 'left');
        $this->db->join('type d', 'a.id_type=d.id_type', 'left');
        $this->db->where('a.id_type', $id);
        $this->db->where('name',$this->session->userdata('name'));
        $get_type_id = $this->db->get()->result_array();
        return $get_type_id;
    }
    // get nama type(kderama, anime, dll) berdasarkan input id_type
    public function get_type($id)
    {
        $this->db->from('type')->where('id_type', $id);
        $name_type = $this->db->get()->row()->type_name;
        return $name_type;
    }
    // get list by id_genre di list berdasarkan input id_genre
    public function get_genre_id($id)
    {
        $this->db->from('list a');
        $this->db->join('genre b', 'a.id_genre=b.id_genre', 'left');
        $this->db->join('user c', 'a.id_user=c.id_user', 'left');
        $this->db->join('type d', 'a.id_type=d.id_type', 'left');
        $this->db->where('a.id_genre', $id);
        $this->db->where('name',$this->session->userdata('name'));
        $get_genre_id = $this->db->get()->result_array();
        return $get_genre_id;
    }
    //get nama genre (romance, horor, thrailer) berdasarkan input id_genre
    public function get_genre($id)
    {
        $this->db->from('genre')->where('id_genre', $id);
        $name_genre = $this->db->get()->row()->genre;
        return $name_genre;
    }
    //get list by slug & id untuk tampil detaillist
    public function get_detail_id($id)
    {
        $this->db->from('list a');
        $this->db->join('genre b', 'a.id_genre=b.id_genre', 'left');
        $this->db->join('user c', 'a.id_user=c.id_user', 'left');
        $this->db->join('type d', 'a.id_type=d.id_type', 'left');
        $this->db->where('slug', $id);
        $get_detail_id = $this->db->get()->row();
        return $get_detail_id;
    }
    public function get_serch($kyword)
    {
        $this->db->like('title', $kyword);
        $this->db->or_like('description', $kyword);
        $this->db->from('list a');
        $this->db->join('genre b', 'a.id_genre=b.id_genre', 'left');
        $this->db->join('user c', 'a.id_user=c.id_user', 'left');
        $this->db->join('type d', 'a.id_type=d.id_type', 'left');
        $this->db->order_by('title', 'ASC');
        $get_serch = $this->db->get()->result_array();
        return $get_serch;
    }
    // menambah mesage dari frontend
    public function addcon()
    {
        $data = [
            'id_user'       => $this->session->userdata('id_user'),
            'name'         => $this->input->post('name'),
            'email'       => $this->input->post('email'),
            'fill'       => $this->input->post('fill'),
        ];
        $this->db->insert('contact', $data);
    }
    // menambahkan list yang ada ke table list
    public function addfav(){
        $data = array(
            'id_user' => $this->session->userdata('id_user'),
            'id_genre' => $this->input->post('id_genre'),
            'id_list' => $this->input->post('id_list'),
            'id_type' => $this->input->post('id_type'),
        );
        $this->db->insert('fav', $data);
    }
    // mendapatkan data dari table fav berdasarkan id table lain dimana nama username nya sesuai yang login
    public function fav(){
        $this->db->from('fav a');
        $this->db->join('genre b', 'a.id_genre=b.id_genre', 'left');
        $this->db->join('user c', 'a.id_user=c.id_user', 'left');
        $this->db->join('list d', 'a.id_list=d.id_list', 'left');
        $this->db->join('type e', 'a.id_type=e.id_type', 'left');
        $this->db->order_by('title', 'ASC');
        $this->db->where('name',$this->session->userdata('name'));
        $fav = $this->db->get()->result_array();
        return $fav;
    }
    // untuk mengecek apakah list tsb sudah di tambahkan apa belum
    public function cekfav(){
        $this->db->from('fav');
        $this->db->where('id_user',$this->session->userdata('id_user'));
        $this->db->where('id_genre',$this->input->post('id_genre'));
        $this->db->where('id_list',$this->input->post('id_list'));
        $this->db->where('id_type',$this->input->post('id_type'));
        $cek = $this->db->get()->result_array();
        return $cek;
    }
    // untuk menghitung total list berdasarkan name
    public function countlist(){
        $this->db->from('list')->where('id_user',$this->session->userdata('id_user'));
        $countlist =  $this->db->count_all_results();
        return $countlist;
    }
    // untuk menghitung total favorit nya
    public function countfav(){
        $this->db->from('fav')->where('id_user',$this->session->userdata('id_user'));
        $countfav =  $this->db->count_all_results();
        return $countfav;
    }
}
