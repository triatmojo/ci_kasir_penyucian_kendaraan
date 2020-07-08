<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $data['title'] = "Daftar Transaksi";
        $data['transaksi'] = $this->admin->get('transaksi');
        $this->_template('admin/transaksi/transaksi', $data);
    }

    private function _getId($char, $table, $field)
    {
        $kode_terakhir = $this->admin->getMax($table, $field, $char);
        $kode_tambah = substr($kode_terakhir, -3, 3);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);

        $newkode = $char . $number;
        return $newkode;
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('jenis', 'Jenis Kendaraan', 'required');
        $this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required|trim');
        $this->form_validation->set_rules('biaya', 'Biaya', 'numeric');
        $this->form_validation->set_rules('bayar', 'Bayar', 'required|numeric');
        $this->form_validation->set_rules('kembali', 'Kembali', 'numeric');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Transaksi";


        $userId = $this->admin->get_where('user', ['username' => $this->session->userdata('username')])['id_user'];
        $data['no_nota'] = $this->_getId('C', 'transaksi', 'no_nota');
        $data['biaya'] = $this->admin->get('biaya');

        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $this->_template('admin/transaksi/tambah', $data);
        } else {
            $input = $this->input->post(null, true);
            unset($input['biaya']);
            $input['tanggal'] = date('Y-m-d');
            $input['id_user'] = $userId;
            $this->admin->tambahData('transaksi', $input);
            redirect('transaksi');
        }
    }

    public function hapusTransaksi($id)
    {
        $id = encode_php_tags($id);
        $this->admin->delete('transaksi', ['id_transaksi' => $id]);
        redirect('transaksi');
    }
}
