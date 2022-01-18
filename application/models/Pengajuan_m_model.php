<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_m_model extends CI_Model
{
    public $table = 'pengajuan_mahasiswa';
    public $id    = 'pengajuan_mahasiswa.pengajuan_m_id';

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_all()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data)
    {
        date_default_timezone_set('ASIA/JAKARTA');
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'nim' => $this->input->post('nim'),
            'handphone' => $this->input->post('handphone'),
            'email' => $this->input->post('email'),
            'foto' => $this->input->post('foto'),
            'pengajuan_id' => $this->session->userdata('pengguna_id'),
        );
        return $this->db->insert($this->table, $data);

        // $this->db->insert($this->table, $data);
        // return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}

/* End of file Person_model.php */
