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
        $data            = konfigurasi('Pengajuan', 'Kelola Pengajuan');
        $data['pengajuans'] = $this->Pengajuan_model->get_all();
        $this->template->load('layouts/template', 'member/pengajuan/index', $data);
    }

    public function add()
    {
        $data = konfigurasi('Tambah Pengajuan', 'Tambah Pengajuan');
        $this->template->load('layouts/template', 'member/pengajuan/create', $data);
    }

    public function create()
    {
        $proposal    = $this->input->post('proposal');
        $surat_pengantar = $this->input->post('surat_pengantar');
        $topik    = $this->input->post('topik');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai    = $this->input->post('tanggal_selesai');
        $asal = $this->input->post('asal');
        $jurusan    = $this->input->post('jurusan');
        $prodi = $this->input->post('prodi');

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

    public function detail($id)
    {
        $data           = konfigurasi('Detail Pengajuan', 'Detail Pengajuan');
        $data['pengajuan'] = $this->Pengajuan_model->get_by_id($id);
        $this->template->load('layouts/template', 'member/pengajuan/detail', $data);
    }

    public function delete($id)
    {
        $this->Pengajuan_model->delete($id);
        redirect('member/pengajuan');
    }
}

/* End of file Person.php */
