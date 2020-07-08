<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function count($table)
    {
        return $this->db->get($table)->num_rows();
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row()->$field;
    }

    public function get_where($table, $where = null)
    {
        return $this->db->get_where($table, $where)->row_array();
    }

    public function tambahData($table, $data = null)
    {
        return $this->db->insert($table, $data);
    }

    public function delete($table, $where = null)
    {
        return $this->db->delete($table, $where);
    }

    public function edit($table, $data = null, $where = null)
    {
        return $this->db->update($table, $data, $where);
    }

    public function getMax($table, $field, $char = null)
    {
        $this->db->select_max($field);
        if ($char != null) {
            $this->db->like($field, $char, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function getTotalPelanggan($tgl1, $tgl2)
    {
        $this->db->where('tanggal' . ' >=', $tgl1);
        $this->db->where('tanggal' . ' <=', $tgl2);
        return $this->db->get('transaksi')->num_rows();
    }

    public function getTotalPendapatan($tgl1, $tgl2)
    {
        $this->db->where('tanggal' . ' >=', $tgl1);
        $this->db->where('tanggal' . ' <=', $tgl2);
        $this->db->select_sum('total');
        return $this->db->get('transaksi')->row()->total;
    }
}
