<?php
defined('BASEPATH') or exit('No direct script access allowed');
// MODEL USER AND GENRE
class User_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    public function register($data) {
        return $this->db->insert('user', $data);
    }
    public function un_chek($username){
        //get data username, check apakah inputan usrname sama dengan yang di db 
        $this->db->from('user')->where('username',$username);//database, inputan
        $check = $this->db->get()->num_rows() > 0;//> 0 = ada
        return $check;
    }
    public function em_chek($email){
        //get data email, check apakah inputan usrname sama dengan yang di db 
        $this->db->from('user')->where('email',$email);//database, inputan
        $check = $this->db->get()->num_rows() > 0;//> 0 = ada
        return $check;
    }
    public function login(){
        
    }
    public function adduser(){
        {
            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => $this->input->post('role')
            );
            $this->db->insert('user', $data);
        }
    }
    public function update()
    {
        $where = array(
            'id_user'   =>  $this->input->post('id_user')
        );
        $data = array(
            'name'      =>  $this->input->post('name'),
            'role'      =>  $this->input->post('role')
        );
        $this->db->update('user', $data, $where);
    }
    public function get_contact(){
        $this->db->from('contact a');
        $this->db->join('user b', 'a.id_user=b.id_user', 'left');
        $this->db->order_by('fill', 'ASC');
        $con = $this->db->get()->result_array();
        return $con;
    }
    
}
