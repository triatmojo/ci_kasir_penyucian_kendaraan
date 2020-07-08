<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');

        is_level(1);
    }
    private function _template($page, $data = null)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }
    // Data Master user user
    public function index()
    {
        $data['title'] = "Data User";
        $data['user'] = $this->admin->get('user');
        $this->_template('admin/user/user', $data);
    }

    public function toggle($userId)
    {
        is_role(1, true);
        $id = encode_php_tags($userId);
        $user = $this->admin->get_where('user', ['id_user' => $id]);

        $toggle = $user['active'] ? 0 : 1;

        $data = [
            'active' => $toggle
        ];
        $edit = $this->admin->edit('user', $data, ['id_user' => $id]);
        if ($edit) {
            msgBox('edit');
        } else {
            msgBox('edit', false);
        }
        redirect('user');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('nomor', 'Nomor', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');
    }

    public function tambahUser()
    {


        $data['title'] =  "Tambah User Baru";

        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $this->_template('admin/user/tambah', $data);
        } else {
            $input = $this->input->post(null, true);
            $data = [
                'username' => $input['username'],
                'password' => password_hash($input['password'], PASSWORD_DEFAULT),
                'nama' => $input['nama'],
                'alamat' => $input['alamat'],
                'hp' => $input['nomor'],
                'level' => $input['level']
            ];

            $this->admin->tambahData('user', $data);
            redirect('user');
        }
    }

    public function ubahUser($id)
    {
        $data['title'] = "Edit Tipe User";
        $data['user'] = $this->admin->get_where('user', ['id_user' => $id]);

        $this->form_validation->set_rules('level', 'Level', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->_template('admin/user/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $data = [
                'username' => $input['username'],
                'nama' => $input['nama'],
                'level' => $input['level']
            ];

            $this->admin->edit('user', $data, ['id_user' => $id]);
            redirect('user');
        }
    }

    public function hapusUser($id)
    {
        $id = encode_php_tags($id);
        $data['user'] = $this->admin->delete('user', ['id_user' => $id]);
        redirect('user');
    }
}
