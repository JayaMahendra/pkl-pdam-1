<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    public $tablep = 'pengguna';
    public $idp = 'pengguna.pengajuan_id';
    public $idpp = 'pengguna.pengguna_id';

    public $table = 'pengajuan';
    public $id    = 'pengajuan.pengajuan_id';
    public $pengajuanpengguna = 'pengajuan.pengguna_id';

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

    public function get_idx()
    {
        $this->db->from($this->table);
        $this->db->where($this->pengajuanpengguna, $this->session->userdata('pengguna_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function get_setuju()
    {
        // $query = $this -> db -> get_where('pengajuan', array('tanggal_disetujui !=' => NULL));
        $query = $this->db->where(array('tanggal_disetujui !=' => NULL))->where(array('sertifikat =' => NULL))->get('pengajuan');
        return $query->result();
    }

    public function get_belum_setuju()
    {
        $query = $this->db->get_where('pengajuan', array('tanggal_disetujui' => NULL));
        return $query->result();
    }

    public function get_riwayat()
    {
        $query = $this->db->get_where('pengajuan', array('sertifikat !=' => NULL));
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

                    $namaFoto = strtolower($_FILES['foto' . $i]['name']);
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

                $datap = array(
                    'pengajuan_id' => $idpengajuan,
                );
                $this->db->where($this->idpp, $this->session->userdata('pengguna_id'));
                $this->db->update($this->tablep, $datap);
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

            $idtmp = $this->input->post('id' . $i);
            if (($this->input->post('nama' . $i) != "")) {
                $namaFoto = "";
                if (!empty($_FILES['foto' . $i]["name"])) {

                    $queryfoto = $this->db->select('foto')
                        ->from('pengajuan_mahasiswa')
                        ->where('pengajuan_m_id', $idtmp)
                        ->get()
                        ->row();

                    $namaFoto = strtolower(time() . $_FILES['foto' . $i]['name']);
                    $config['upload_path']          = 'assets/uploads/foto/';
                    $config['allowed_types']        = 'png|jpg|jpeg';
                    $config['file_name'] = $namaFoto;

                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('foto' . $i)) {
                        // echo $this->upload->display_errors() . " <=== " . $i . " === " . $namaFoto;
                        // die();
                        $namaFoto = $this->input->post('datafoto' . $i);
                    } else {
                        $this->load->helper("file");
                        unlink('assets/uploads/foto/' . $queryfoto->foto);
                    }
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
                $this->db->where($this->idm, $idtmp);
                $this->db->update($this->tablem, $datam);
            }
        }

        return $this->db->affected_rows();
    }

    public function delete($id)
    {

        $idpp = $this->input->post('idpeng');
        // print_r($this->idp);
        // die();

        $datap = array(
            'status_pendaftaran' => 3,
            'pengajuan_id' => null
            // 'pengajuan_id' => $idpengajuan,
        );

        $this->db->where($this->idp, $id);
        $this->db->update($this->tablep, $datap);
        // $this->db->affected_rows();

        $this->db->where($this->idmpengajuan, $id);
        $this->db->delete($this->tablem);
        $this->db->affected_rows();

        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function search($keyword)
    {
        // $this->db->select('*');
        // $this->db->from('pengajuan');
        // if(!empty($keyword)){
        //     $this->db->like('proposal', $keyword);
        //     $this->db->or_like('surat_pengantar', $keyword);
        //     $this->db->or_like('topik', $keyword);
        //     $this->db->or_like('asal', $keyword);
        //     $this->db->or_like('jurusan', $keyword);
        //     $this->db->or_like('prodi', $keyword);
        // }
        // return $this->db->get()->result();

        $where = "tanggal_disetujui is null and proposal like '%$keyword' or tanggal_disetujui is null and surat_pengantar like '%$keyword' or tanggal_disetujui is null and topik like '%$keyword' or tanggal_disetujui is null and asal like '%$keyword' or tanggal_disetujui is null and jurusan like '%$keyword' or tanggal_disetujui is null and prodi like '%$keyword'";
        $notwhere = "tanggal_disetujui is null";
        $this->db->select('*');
        $this->db->from('pengajuan');
        if(!empty($keyword)){
            $this->db->where($where);
        } else {
            $this->db->where($notwhere);
        }
        return $this->db->get()->result();
    }

    public function search_disetujui($keyword)
    {
        $where = "proposal like '$keyword' or surat_pengantar like '$keyword' or topik like '$keyword' or asal like '$keyword' or jurusan like '$keyword' or prodi like '$keyword' and tanggal_disetujui is not null and sertifikat is null";
        $notwhere = "tanggal_disetujui is not null and sertifikat is null";
        $this->db->select('*');
        $this->db->from('pengajuan');
        if(!empty($keyword)){
            $this->db->where($where);
        } else {
            $this->db->where($notwhere);
        }
        return $this->db->get()->result();
    }

    public function search_riwayat($keyword)
    {
        $where = "proposal like '$keyword' or surat_pengantar like '$keyword' or topik like '$keyword' or asal like '$keyword' or jurusan like '$keyword' or prodi like '$keyword' and sertifikat is not null";
        $notwhere = "sertifikat is not null";
        $this->db->select('*');
        $this->db->from('pengajuan');
        if(!empty($keyword)){
            $this->db->where($where);
        } else {
            $this->db->where($notwhere);
        }
        return $this->db->get()->result();
    }
}

/* End of file Person_model.php */
