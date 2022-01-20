<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengajuan_model');
        $this->check_login();
        if ($this->session->userdata('role_id') != '2') {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Pengajuan', 'Kelola Pengajuan');
        $data['pengajuans'] = $this->Pengajuan_model->get_all();
        // print_r($this->session->userdata());
        // die();
        if ($this->session->userdata('status_pengajuan') == '1') {
            $this->template->load('layouts/template', 'member/pengajuan/create', $data);
        } else {
            $this->template->load('layouts/template', 'member/pengajuan/index', $data);
        }
        // $this->template->load('layouts/template', 'member/pengajuan/index', $data);
    }

    public function add()
    {
        $data = konfigurasi('Tambah Pengajuan', 'Tambah Pengajuan');
        $this->template->load('layouts/template', 'member/pengajuan/create', $data);
    }

    public function createm()
    {
        // $proposal    = $this->input->post('proposal');
        // $surat_pengantar = $this->input->post('surat_pengantar');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $nim    = $this->input->post('nim');
        $handphone = $this->input->post('handphone');
        $email    = $this->input->post('email');
        $foto = $this->input->post('foto');


        $data = [
            'nama'    => $nama,
            'alamat' => $alamat,
            'nim'    => $nim,
            'handphone' => $handphone,
            'email'    => $email,
            'foto' => $foto
        ];

        $this->Pengajuan_model->insertm($data);
        redirect('member/pengajuan');
    }

    public function create()
    {
        // $proposal = $_FILES['proposal'];
        $proposal = $this->input->post('proposal');
        $surat_pengantar = $this->input->post('surat_pengantar');
        $topik    = $this->input->post('topik');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai    = $this->input->post('tanggal_selesai');
        $asal = $this->input->post('asal');
        $jurusan    = $this->input->post('jurusan');
        $prodi = $this->input->post('prodi');

        $proposalFileName  = "";
        $suratpengantarFileName  = "";
        // echo "<pre>";
        //  print_r($_FILES);
        //  die();

        if (!empty($_FILES['proposal'])) {
            $proposalFileName = strtolower($_FILES["proposal"]['name']);
            $config['upload_path']          = 'assets/uploads/proposal/';
            $config['allowed_types']        = 'doc|docx|pdf';
            $config['file_name'] = $proposalFileName;
            //$config['max_size']             = 4096;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('proposal')) {
                echo $this->upload->display_errors() . " <== proposal";
                die();
            }
        }

        if (!empty($_FILES['surat_pengantar'])) {
            $suratpengantarFileName = strtolower($_FILES["surat_pengantar"]['name']);
            $config['upload_path']          = 'assets/uploads/surat_pengantar/';
            $config['allowed_types']        = 'doc|docx|pdf';
            $config['file_name'] = $suratpengantarFileName;
            //$config['max_size']             = 4096;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                echo  $this->upload->display_errors() . " <== surat_pengantar";
                die();
            }
        }



        $data = [
            'proposal'    => $proposalFileName,
            'surat_pengantar' => $suratpengantarFileName,
            'topik'    => $topik,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai'    => $tanggal_selesai,
            'asal' => $asal,
            'jurusan'    => $jurusan,
            'prodi' => $prodi,
            'pengguna_id' => $this->session->userdata('pengguna_id'),
        ];

        $this->Pengajuan_model->insert($data);


        redirect('member/pengajuan');
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

    public function updatePengajuan($id)
    {
        // if ($this->form_validation->run() == true) {
        $proposalFileName  = "";
        $suratpengantarFileName  = "";
        // echo "<pre>";
        //  print_r($proposalFileName);
        //  die();

        if (!empty($_FILES['proposal'])) {
            $queryproposal = $this->db->select('proposal')
            ->from('pengajuan')
            ->where('pengajuan_id', $id)
            ->get()
            ->row();

            $this->load->helper("file");
            unlink('assets/uploads/proposal/'. $queryproposal->proposal);
            $proposalFileName = strtolower($_FILES["proposal"]['name']);
            $config['upload_path']          = 'assets/uploads/proposal/';
            $config['allowed_types']        = 'doc|docx|pdf';
            $config['file_name'] = $proposalFileName;
            //$config['max_size']             = 4096;

            $this->load->library('upload');
            $this->upload->initialize($config);


            if (!$this->upload->do_upload('proposal')) {
                echo $this->upload->display_errors() . " Masukkan proposal";
                die();
            }
        }

        if (!empty($_FILES['surat_pengantar'])) {
            $querypengantar = $this->db->select('surat_pengantar')
            ->from('pengajuan')
            ->where('pengajuan_id', $id)
            ->get()
            ->row();
            
            $this->load->helper("file");
            unlink('assets/uploads/surat_pengantar/'. $querypengantar->surat_pengantar);
            $suratpengantarFileName = strtolower($_FILES["surat_pengantar"]['name']);
            $config['upload_path']          = 'assets/uploads/surat_pengantar/';
            $config['allowed_types']        = 'doc|docx|pdf';
            $config['file_name'] = $suratpengantarFileName;
            //$config['max_size']             = 4096;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('surat_pengantar')) {
                echo  $this->upload->display_errors() . "Masukkan surat_pengantar";
                die();
            } 
        }
        $data = array(
            'proposal' => $proposalFileName,
            'surat_pengantar' => $suratpengantarFileName,
            'topik' => $this->input->post('topik'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'asal' => $this->input->post('asal'),
            'jurusan' => $this->input->post('jurusan'),
            'prodi' => $this->input->post('prodi'),
        );
        // print_r($proposalFileName);
        // die();

        $result = $this->Pengajuan_model->update_pengajuan($data, $id);
        if ($result > 0) {
            // $this->updatePengajuan($id);
            $this->session->set_flashdata('msg', show_succ_msg('Data Pengajuan Berhasil diubah'));
            redirect('member/pengajuan');
        } else {
            $this->session->set_flashdata('msg', show_err_msg('Data Pengajuan Gagal diubah'));
            redirect('member/pengajuan');
        }
        // } else {
        //     $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
        //     redirect('auth/profile');
        // }
    }

    public function detail($id)
    {
        $data           = konfigurasi('Detail Pengajuan', 'Detail Pengajuan');
        $data['pengajuan'] = $this->Pengajuan_model->get_by_id($id);
        $data['pengajuan_mahasiswa'] = $this->Pengajuan_model->pengajuan_mahasiswa($id);
        $this->template->load('layouts/template', 'member/pengajuan/detail', $data);
    }

    public function delete($id)
    {
        $this->Pengajuan_model->delete($id);
        redirect('member/pengajuan');
    }
}
