<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['tot_user'] = $this->admin->count('user');
        $data['tot_pengunjung'] = $this->admin->count('transaksi');
        $data['tot_transaksi'] = $this->admin->sum('transaksi', 'total');
        $this->_template('admin/index', $data);
    }
}
