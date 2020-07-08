<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biaya extends CI_Controller
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

    // Data master Biaya
    public function index()
    {
        $data['title'] = "Data Master Biaya Jasa";
        $data['biaya'] = $this->admin->get('biaya');
        $this->_template('admin/master/biaya', $data);
    }

    public function tambahBiaya()
    {

        $this->form_validation->set_rules('jenis_kendaraan', 'Kendaraan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|min_length[3]', [
            'min_length' => "angka harus lebih dari 3 digit"
        ]);
        $data['title'] = "Tambah Data Master Biaya";

        if ($this->form_validation->run() == false) {
            $this->_template('admin/master/tambah', $data);
        } else {
            $input = $this->input->post(null, true);
            $data = [
                'jenis' => $input['jenis_kendaraan'],
                'biaya' => $input['harga']
            ];

            $this->admin->tambahData('biaya', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-success" role="alert">
            Data berhasil ditambahkan</div>');
            redirect('biaya');
        }
    }

    public function hapusBiaya($id)
    {
        $id = encode_php_tags($id);
        $this->admin->delete('biaya', ['id_biaya' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-success" role="alert">
        Data berhasil dihapus</div>');
        redirect('biaya');
    }

    public function ubahBiaya($id)
    {
        $this->form_validation->set_rules('jenis', 'Kendaraan', 'required');
        $this->form_validation->set_rules('biaya', 'Harga', 'required|min_length[3]', [
            'min_length' => "angka harus lebih dari 3 digit"
        ]);

        $data['title'] = "Edit Data Master Biaya";
        $data['biaya'] = $this->admin->get_where('biaya', ['id_biaya' => $id]);

        if ($this->form_validation->run() == false) {
            $this->_template('admin/master/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $this->admin->edit('biaya', $input, ['id_biaya' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-success" role="alert">
            Data berhasil diubah</div>');
            redirect('biaya');
        }
    }
}
