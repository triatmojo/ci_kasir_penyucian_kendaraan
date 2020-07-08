<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        is_logged_in();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $input = $this->input->post(null, true);
            $username = $input['name'];
            $pass = $input['password'];

            $user = $this->admin->get_where('user', ['username' => $username]);
            $pass_db = $user['password'];


            if ($user) {
                if (password_verify($pass, $pass_db)) {
                    if ($user['active'] == 1) {
                        $data = [
                            'username' => $user['username'],
                            'level' => $user['level']
                        ];
                        $this->session->set_userdata($data);

                        if ($user['level'] == 1) {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center">Selamat Anda Berhasil Login Sebagai Admin</div>');
                            redirect('admin');
                        } else {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Selamat Anda Berhasil Login Sebagai User</div>');
                            redirect('admin');
                        }
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Akun anda non-aktif. Silahkan hubungi admin.</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Username belum terdaftar!</div>');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(['username', 'level']);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Selamat Anda Berhasil Logout</div>');
        redirect('auth');
    }
}
