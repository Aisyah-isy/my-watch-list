<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        
    }
    public function index()
    {
        if($this->session->userdata('role')<>NULL){
            redirect('admin/home');
        }
        $data = array(
            'page_title' => 'Log in to MyWatchlist'
        );
        $this->load->view('auth', $data);
    }
    public function register()
    {
        //aturan validasi akun
        $this->form_validation->set_rules('username', 'Username', 'required|callback_un_chek'); //username is required ad check un using callback
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_em_chek'); //email harus valid dan berbeda
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
        //pw_confirmharus sama dgn pw

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            //and if the validation true, data will be procesing
            date_default_timezone_set('Asia/Jakarta');
            $data = array(
                'username' => $this->input->post('username'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'role' => 'user',
                'create_at' => date('Y-m-d H:i:s')
            );
            //add user function
            if ($this->User_model->register($data)) { //input db user
                redirect('auth'); //users harus log in setelah mendaftar
            } else { //
                $this->session->set_flashdata(
                    'alert',
                    '<div class="alert alert-warning alert-dismissible" role="alert">
                    There was a problem creating your account. Please try again!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>'
                );
                redirect('auth/register');
            }
        }
    }
    public function un_chek($username) //callback
    {
        if ($this->User_model->un_chek($username)) { // //$usrname berasal dari inputan form_validation
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-warning alert-dismissible" role="alert">
                Username already exists. Please choose another one!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            return FALSE; //validasi gagal /ada username sama didb, maka tidak bisa membuat akun dgn username tsb
        } else {
            return TRUE; //validasi berhasil / tidak ada username yang sama, user bisa membuat akun dan masuk ke tahap login
        }
    }
    public function em_chek($email) //callback
    {
        if ($this->User_model->em_chek($email)) { //$email berasal dari inputan form_validation
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-warning alert-dismissible" role="alert">
                Email already exists. Please choose another one!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            return FALSE; //validasi gagal /ada email sama didb, maka tidak bisa membuat akun dgn email tsb
        } else {
            return TRUE; //validasi berhasil / tidak ada email yang sama, user bisa membuat akun dan masuk ke tahap login
        }
    }
    public function auth()
    {
        date_default_timezone_set('Asia/Jakarta');
        $username = $this->input->post('email_or_username');
        $password = md5($this->input->post('password'));
        $this->db->from('user');
        $this->db->where('username', $username)->or_where('password',$password);
        $user = $this->db->get()->row();
        if ($user == NULL) {
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-danger alert-dismissible" role="alert">
                Username Not Aviable!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('auth');
        } else if ($password == $user->password) {
            $data = array(
                'id_user'   => $user->id_user,
                'username' => $user->username,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($data);
            redirect('admin/home');
        } else {
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-danger alert-dismissible" role="alert">
                Incorrect Password!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'
            );
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
}
