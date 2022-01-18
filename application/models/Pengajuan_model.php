<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    public $table = 'pengajuan';
    public $id    = 'pengajuan.pengajuan_id';

    public $tablem = 'pengajuan_mahasiswa';
    public $idm    = 'pengajuan_mahasiswa.pengajuan_m_id';

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

    public function pengajuan_mahasiswa()
    {
        $this->db->order_by('nik', 'ASC');
        return $this->db->from('pengajuan')
            ->join('pengajuan_mahasiswa', 'pengajuan_mahasiswa.pengajuan_m_id=pengajuan.pengajuan_id')
            ->get()
            ->result();
    }
    


    public function insert($data)
    {

        /*
        $data = array(
            'proposal' => $this->input->post('proposal'),
            'surat_pengantar' => $this->input->post('surat_pengantar'),
            'topik' => $this->input->post('topik'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'asal' => $this->input->post('asal'),
            'jurusan' => $this->input->post('jurusan'),
            'prodi' => $this->input->post('prodi'),
            'pengguna_id' => $this->session->userdata('pengguna_id'),
        );
        */

        $result = $this->db->insert($this->table, $data);
        $idpengajuan = $this->db->insert_id();

        for ($i = 0; $i < 5; $i++) {
            if (($this->input->post('nama' . $i) != "")) {
                $namaFoto = "";
                if (!empty($_FILES['foto' . $i]["name"])) {
                    $namaFoto = strtolower(time() . $_FILES['foto' . $i]['name']);
                    $config['upload_path']          = 'assets/uploads/foto/';
                    $config['allowed_types']        = 'png|jpg|jpeg';
                    $config['file_name'] = $namaFoto;

                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('foto' . $i)) {
                        echo $this->upload->display_errors() . " <=== " . $i . " === " . $namaFoto;
                        die();
                    }
                }



                $datam = array(
                    'nama' => $this->input->post('nama' . $i),
                    'alamat' => $this->input->post('alamat' . $i),
                    'nim' => $this->input->post('nim' . $i),
                    'handphone' => $this->input->post('handphone' . $i),
                    'email' => $this->input->post('email' . $i),
                    'foto' => $namaFoto,
                    'pengajuan_id' => $idpengajuan,
                );
                $this->db->insert($this->tablem, $datam);
            }
        }

        return  $result;




        // $this->db->insert($this->table, $data);
        // return $this->db->insert_id();
    }
    public function insertm($data)
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
        return $this->db->insert($this->tablem, $data);

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
