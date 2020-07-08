<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->library('pdf');
        $this->load->model('Admin_model', 'admin');
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
        $data['title'] = "Form Laporan Transaksi";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi');
        $this->form_validation->set_message('numeric', 'Kolom {field} hanya bisa diisi oleh angka');

        if ($this->form_validation->run() == false) {
            $this->_template('admin/laporan/index', $data);
        } else {
            $input  = $this->input->post(null, true);
            $tgl    = explode(' - ', $input['tanggal']);
            $tgl1   = date('Y-m-d', strtotime($tgl[0]));
            $tgl2   = date('Y-m-d', strtotime(end($tgl)));

            $this->cetak($tgl1, $tgl2);
        }
    }

    public function cetak($tgl1 = null, $tgl2 = null)
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'Rekap Laporan Penghasilan', 0, 1, 'C');
        // Periode
        if ($tgl1 != null && $tgl2 != null) {
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(190, 7, indo_date($tgl1) . ' - ' . indo_date($tgl2), 0, 1, 'C');
        } else {
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(190, 7, "Semua Data", 0, 1, 'C');
        }

        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->Cell(95, 6, 'Jumlah Pelanggan', 1, 0, 'C');
        $pdf->Cell(95, 6, 'Jumlah Pendapatan', 1, 1, 'C');
        $pdf->Cell(95, 6, $this->admin->getTotalPelanggan($tgl1, $tgl2), 1, 0, 'C');
        $pdf->Cell(95, 6, $this->admin->getTotalPendapatan($tgl1, $tgl2), 1, 1, 'C');

        $pdf->Cell(10, 7, '', 0, 1);


        $pdf->SetFont('Arial', 'B', 12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 6, 'No Nota', 1, 0, 'C');
        $pdf->Cell(55, 6, 'Nama Pelanggan', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Biaya', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Total Bayar', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Tanggal', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);

        if ($tgl1 != null && $tgl2 != null) {
            $this->db->where('tanggal' . ' >=', $tgl1);
            $this->db->where('tanggal' . ' <=', $tgl2);
        }
        $transaksi = $this->admin->get('transaksi');

        foreach ($transaksi as $row) {
            $pdf->Cell(30, 6, $row['no_nota'], 1, 0, 'C');
            $pdf->Cell(55, 6, $row['nama'], 1, 0, 'C');
            $pdf->Cell(35, 6, $row['jenis'], 1, 0, 'C');
            $pdf->Cell(35, 6, $row['total'], 1, 0, 'C');
            $pdf->Cell(35, 6, $row['tanggal'], 1, 1, 'C');
        }
        $pdf->Output();
    }
}
