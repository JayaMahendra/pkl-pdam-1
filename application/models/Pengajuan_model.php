<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    public $table = 'pengajuan';
    public $id    = 'pengajuan.pengajuan_id';

    public $tablem = 'pengajuan_mahasiswa';
    public $idm    = 'pengajuan_mahasiswa.pengajuan_m_id';
    public $idmpengajuan    = 'pengajuan_mahasiswa.pengajuan_id';

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

    public function pengajuan_mahasiswa($id)
    {
        $this->db->order_by('nim', 'ASC');
        $this->session->userdata('pengajuan_id');
        return $this->db->from('pengajuan_mahasiswa')
            ->where('pengajuan_id', $id)
            ->get()
            ->result();
        // return $this->db->from('pengajuan')
        //     ->join('pengajuan_mahasiswa', 'pengajuan_mahasiswa.pengajuan_m_id=pengajuan.pengajuan_id')
        //     ->get()
        //     ->result();
    }
    


    public function insert($data)
    {
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

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();

        // $this->db->where($this->id, $id);
        // $this->db->update($this->table, $data);
        // return $this->db->affected_rows();
    }

    public function update_pengajuan($data, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        
        for ($i = 0; $i < 5; $i++) {
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
                

                $datam = array(
                    'nama' => $this->input->post('nama' . $i),
                    'alamat' => $this->input->post('alamat' . $i),
                    'nim' => $this->input->post('nim' . $i),
                    'handphone' => $this->input->post('handphone' . $i),
                    'email' => $this->input->post('email' . $i),
                    'foto' => $namaFoto,
                    // 'pengajuan_id' => $idpengajuan,
                );
                // print_r($this->input->post('nama' . $i));
                // die();
                $this->db->where($this->idmpengajuan, $id);
                $this->db->update($this->tablem, $datam);
                // print_r($this->db->update($this->tablem, $datam));
                // die();
            }
        }

        return $this->db->affected_rows();
	}

    public function delete($id)
    {
    
        $this->db->where($this->idmpengajuan, $id);
        $this->db->delete($this->tablem);
        $this->db->affected_rows();

        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

}

/* End of file Person_model.php */
