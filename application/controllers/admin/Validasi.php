<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengajuan_model');
        $this->check_login();
        if ($this->session->userdata('role_id') != '1') {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Pengajuan', 'Kelola Pengajuan');
        $data['pengajuans'] = $this->Pengajuan_model->get_belum_setuju();
        // print_r($this->session->userdata());
        // die();
        $this->template->load('layouts/template', 'admin/validasi/index', $data);
    }

    public function index_setuju()
    {
        $data = konfigurasi('Pengajuan', 'Pengajuan Disetujui');
        $data['pengajuans'] = $this->Pengajuan_model->get_setuju();
        // print_r($this->session->userdata());
        // die();
        $this->template->load('layouts/template', 'admin/validasi/disetujui', $data);
    }

    public function index_riwayat()
    {
        $data = konfigurasi('Pengajuan', 'Riwayat Pengajuan');
        $data['pengajuans'] = $this->Pengajuan_model->get_riwayat();
        // print_r($this->session->userdata());
        // die();
        $this->template->load('layouts/template', 'admin/validasi/riwayat', $data);
    }

    public function add()
    {
        $data = konfigurasi('Tambah Pengajuan', 'Tambah Pengajuan');
        $this->template->load('layouts/template', 'member/pengajuan/create', $data);
    }

    public function create()
    {
        // $proposal    = $this->input->post('proposal');
        // $surat_pengantar = $this->input->post('surat_pengantar');
        $proposal = $_FILES['proposal'];
        $surat_pengantar = $_FILES['surat_pengantar'];
        $topik    = $this->input->post('topik');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai    = $this->input->post('tanggal_selesai');
        $asal = $this->input->post('asal');
        $jurusan    = $this->input->post('jurusan');
        $prodi = $this->input->post('prodi');

        if ($proposal = '') {
            $config['upload_path']          = 'assets/uploads/proposal/';
            $config['allowed_types']        = 'doc|docx|pdf';
            $config['max_size']             = 4096;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('proposal')) {
                echo "Upload gagal";
                die();
            } else {
                $proposal = $this->upload->data('proposal');
            }
        }

        if ($surat_pengantar = '') {
            $config['upload_path']          = 'assets/uploads/surat_pengantar/';
            $config['allowed_types']        = 'doc|docx|pdf';
            $config['max_size']             = 4096;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('surat_pengantar')) {
                echo "Upload gagal";
                die();
            } else {
                $surat_pengantar = $this->upload->data('surat_pengantar');
            }
        }

        $data = [
            'proposal'    => $proposal,
            'surat_pengantar' => $surat_pengantar,
            'topik'    => $topik,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai'    => $tanggal_selesai,
            'asal' => $asal,
            'jurusan'    => $jurusan,
            'prodi' => $prodi,
        ];

        $this->Pengajuan_model->insert($data);

        redirect('member/pengajuan');
    }

    function do_upload()
    {
        // setting konfigurasi upload
        $config['upload_path'] = 'assets/uploads/proposal/';
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size'] = 4096;
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('proposal')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
    }

    public function edit($pengguna_id)
    {
        $data           = konfigurasi('Edit Pengajuan', 'Edit Pengajuan');
        $data['pengajuan'] = $this->Pengajuan_model->get_by_id($pengguna_id);
        $this->template->load('layouts/template', 'member/pengajuan/update', $data);
    }

    public function update()
    {
        $pengguna_id      = $this->input->post('pengguna_id');
        // $name    = $this->input->post('name');
        // $address = $this->input->post('address');
        $proposal    = $this->input->post('proposal');
        $surat_pengantar = $this->input->post('surat_pengantar');
        $topik    = $this->input->post('topik');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai    = $this->input->post('tanggal_selesai');
        $asal = $this->input->post('asal');
        $jurusan    = $this->input->post('jurusan');
        $prodi = $this->input->post('prodi');

        $data = [
            // 'name'    => $name,
            // 'address' => $address,
            'proposal'    => $proposal,
            'surat_pengantar' => $surat_pengantar,
            'topik'    => $topik,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai'    => $tanggal_selesai,
            'asal' => $asal,
            'jurusan'    => $jurusan,
            'prodi' => $prodi,
        ];
        $this->Pengajuan_model->update(['pengguna_id' => $pengguna_id], $data);
        redirect('member/pengajuan');
    }

    public function validasi_Pengajuan($id)
    {
        date_default_timezone_set('ASIA/JAKARTA');

        $idtmp = $this->input->post('idtmp');

        $data = array(
            'tanggal_disetujui'    => date('d-m-Y H:i:s')
        );
        $check = $this->db->select('tanggal_disetujui')->from('pengajuan')->where('pengajuan_id', $id)->get()->row()->tanggal_disetujui;
        if ($check == null) {
            $sisa = $this->db->select('sisa_slot')->from('slot')->get()->row()->sisa_slot;
            $new = $sisa - 1;
            $dataslot = array(
                'sisa_slot' => $new,
            );
            $this->db->where('sisa_slot', $sisa);
            $this->db->update('slot', $dataslot);
            $this->db->affected_rows();
        }

        $this->db->where(['pengguna_id' => $idtmp]);
        $this->db->update('pengajuan', $data);

        redirect('admin/validasi');
    }

    public function update_disetujui($id)
    {
        date_default_timezone_set('ASIA/JAKARTA');

        $idtmp = $this->input->post('idtmp');

        $suratbalasanFileName  = "";
        $sertifikatFileName  = "";

        if (!empty($_FILES['surat_balasan'])) {
            $querybalasan = $this->db->select('surat_balasan')
                ->from('pengajuan')
                ->where('pengajuan_id', $id)
                ->get()
                ->row();

            $suratbalasanFileName = strtolower(time() . $_FILES["surat_balasan"]['name']);
            $config['upload_path']          = 'assets/uploads/surat_balasan/';
            $config['allowed_types']        = 'doc|docx|pdf';
            $config['file_name'] = $suratbalasanFileName;
            //$config['max_size']             = 4096;

            $this->load->library('upload');
            $this->upload->initialize($config);


            if (!$this->upload->do_upload('surat_balasan')) {
                // echo $this->upload->display_errors() . " Masukkan proposal";
                // die();
                $suratbalasanFileName  = $this->input->post('databalasan');
            } else {
                $this->load->helper("file");
                unlink('assets/uploads/surat_balasan/' . $querybalasan->surat_balasan);
            }
        }

        if (!empty($_FILES['sertifikat'])) {
            $querysertifikat = $this->db->select('sertifikat')
                ->from('pengajuan')
                ->where('pengajuan_id', $id)
                ->get()
                ->row();

            $sertifikatFileName = strtolower(time() . $_FILES["sertifikat"]['name']);
            $config['upload_path']          = 'assets/uploads/sertifikat/';
            $config['allowed_types']        = '*';
            $config['file_name'] = $sertifikatFileName;
            //$config['max_size']             = 4096;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('sertifikat')) {
                // echo  $this->upload->display_errors() . "Masukkan sertifikat";
                // die();
                // $sertifikatFileName = $this->input->post('datasertif');
                $sertifikatFileName = null;
            } else {
                $sisa = $this->db->select('sisa_slot')->from('slot')->get()->row()->sisa_slot;
                $new = $sisa + 1;
                $dataslot = array(
                    'sisa_slot' => $new,
                );
                $this->db->where('sisa_slot', $sisa);
                $this->db->update('slot', $dataslot);
                $this->db->affected_rows();
                
                $this->load->helper("file");
                unlink('assets/uploads/sertifikat/' . $querysertifikat->sertifikat);
            }
        }

        $data = array(
            'surat_balasan' => $suratbalasanFileName,
            'sertifikat' => $sertifikatFileName
        );
        $check = $this->db->select('tanggal_disetujui')->from('pengajuan')->where('pengajuan_id', $id)->get()->row()->tanggal_disetujui;
        if ($check == null) {
            $sisa = $this->db->select('sisa_slot')->from('slot')->get()->row()->sisa_slot;
            $new = $sisa - 1;
            $dataslot = array(
                'sisa_slot' => $new,
            );
            $this->db->where('sisa_slot', $sisa);
            $this->db->update('slot', $dataslot);
            $this->db->affected_rows();
        }

        $this->db->where(['pengguna_id' => $idtmp]);
        $this->db->update('pengajuan', $data);

        redirect('admin/validasi');
    }

    public function do_download_propo($data)
    {
        $this->load->helper('download');
        force_download('assets/uploads/proposal/' . $data, NULL);
    }

    public function do_download_supeng($data)
    {
        $this->load->helper('download');
        force_download('assets/uploads/surat_pengantar/' . $data, NULL);
    }

    public function do_download_balasan($data)
    {
        $this->load->helper('download');
        force_download('assets/uploads/surat_balasan/' . $data, NULL);
    }

    public function do_download_sertifikat($data)
    {
        $this->load->helper('download');
        force_download('assets/uploads/sertifikat/' . $data, NULL);
    }

    public function detail($id)
    {
        $data           = konfigurasi('Detail Pengajuan', 'Detail Pengajuan');
        $data['pengajuan'] = $this->Pengajuan_model->get_by_id($id);
        $data['pengajuan_mahasiswa'] = $this->Pengajuan_model->pengajuan_mahasiswa($id);
        $this->template->load('layouts/template', 'admin/validasi/detail', $data);
    }

    public function detail_disetujui($id)
    {
        $data           = konfigurasi('Detail Pengajuan', 'Detail Pengajuan');
        $data['pengajuan'] = $this->Pengajuan_model->get_by_id($id);
        $data['pengajuan_mahasiswa'] = $this->Pengajuan_model->pengajuan_mahasiswa($id);
        $this->template->load('layouts/template', 'admin/validasi/detail_disetujui', $data);
    }

    public function detail_riwayat($id)
    {
        $data           = konfigurasi('Detail Pengajuan', 'Detail Pengajuan');
        $data['pengajuan'] = $this->Pengajuan_model->get_by_id($id);
        $data['pengajuan_mahasiswa'] = $this->Pengajuan_model->pengajuan_mahasiswa($id);
        $this->template->load('layouts/template', 'admin/validasi/detail_riwayat', $data);
    }

    public function delete($id)
    {
        $this->Pengajuan_model->delete($id);
        redirect('member/pengajuan');
    }

    public function search()
	{
        $data = konfigurasi('Pengajuan', 'Kelola Pengajuan');
        $keyword = $this->input->post('keyword');
		$data['pengajuans']=$this->Pengajuan_model->search($keyword);
		$this->template->load('layouts/template', 'admin/validasi/index', $data);
        // print_r($keyword);
        // die();
	}

    public function search_disetujui()
	{
        $data = konfigurasi('Pengajuan', 'Pengajuan Disetujui');
        $keyword = $this->input->post('keyword');
		$data['pengajuans']=$this->Pengajuan_model->search_disetujui($keyword);
		$this->template->load('layouts/template', 'admin/validasi/disetujui', $data);
        // print_r($keyword);
        // die();
	}

    public function search_riwayat()
	{
        $data = konfigurasi('Pengajuan', 'Riwayat Pengajuan');
        $keyword = $this->input->post('keyword');
		$data['pengajuans']=$this->Pengajuan_model->search_riwayat($keyword);
		$this->template->load('layouts/template', 'admin/validasi/riwayat', $data);
        // print_r($keyword);
        // die();
	}
}

/* End of file Person.php */
