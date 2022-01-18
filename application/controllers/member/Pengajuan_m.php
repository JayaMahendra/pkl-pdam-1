<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_m extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengajuan_m_model');
        $this->check_login();
        if ($this->session->userdata('role_id') != '2') {
            redirect('', 'refresh');
        }
    }
    
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('Pengajuan_m_model');
    //     $this->check_login();
    //     if ($this->session->userdata('role_id') != '2') {
    //         redirect('', 'refresh');
    //     }
    // }

    // public function index()
    // {
    //     $data = konfigurasi('Pengajuan', 'Kelola Pengajuan');
    //     $data['pengajuans'] = $this->Pengajuan_model->get_all();
    //     // print_r($this->session->userdata());
    //     // die();
    //     if ($this->session->userdata('status_pengajuan') == '1') {
    //         $this->template->load('layouts/template', 'member/pengajuan/create', $data);
    //     } else {
    //         $this->template->load('layouts/template', 'member/pengajuan/index', $data);
    //     }
    //     // $this->template->load('layouts/template', 'member/pengajuan/index', $data);
    // }

    // public function add()
    // {
    //     $data = konfigurasi('Tambah Pengajuan', 'Tambah Pengajuan');
    //     $this->template->load('layouts/template', 'member/pengajuan/create', $data);

    // }

    public function create()
    {
        // $proposal    = $this->input->post('proposal');
        // $surat_pengantar = $this->input->post('surat_pengantar');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $nim = $this->input->post('nim');
        $handphone = $this->input->post('handphone');
        $email = $this->input->post('email');
        $foto = $this->input->post('foto');

        if (!empty($_FILES['foto']['name'])) {
            $upload = $this->_do_upload();

            //delete file
            $user = $this->Auth_model->get_by_id($this->session->userdata('id'));
            if (file_exists('assets/uploads/images/foto_profil/' . $user->photo) && $user->photo) {
                unlink('assets/uploads/images/foto_profil/' . $user->photo);
            }

            $data['photo'] = $upload;
        }

        $data = [
            'nama'    => $nama,
            'alamat' => $alamat,
            'nim'    => $nim,
            'handphone' => $handphone,
            'email' => $email,
            'foto' => $foto
        ];
        // $jurusan    = $this->input->post('jurusan');
        // $prodi = $this->input->post('prodi');
        
        // $proposalf = $_FILES['proposal'];
        // $surat_pengantarf = $_FILES['surat_pengantar'];
        
        // echo "<pre>";
        // print_r($proposal);
        // print_r($surat_pengantar);
        // die();
        

        // if(!empty($proposalf)){
        //     $config['upload_path']          = 'assets/uploads/proposal/';
        //     $config['allowed_types']        = 'doc|docx|pdf';
        //     $config['max_size']             = 4096;

        //     $this->load->library('upload', $config);
        //     if(!$this->upload->do_upload('proposal')){
        //         echo "Upload gagal"; die();
        //     } else {
        //         $proposal=$this->upload->data('proposal');
        //     }
        // }

        // if(!empty($surat_pengantarf)){
        //     $config['upload_path']          = 'assets/uploads/surat_pengantar/';
        //     $config['allowed_types']        = 'doc|docx|pdf';
        //     $config['max_size']             = 4096;

        //     $this->load->library('upload', $config);
        //     if(!$this->upload->do_upload('surat_pengantar')){
        //         echo "Upload gagal"; die();
        //     } else {
        //         $surat_pengantar=$this->upload->data('surat_pengantar');
        //     }
        // }

        

        $this->Pengajuan_m_model->insert($data);
    }

    private function _do_upload()
    {
        $config['upload_path']          = 'assets/uploads/images/foto_profil/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('member/pengajuan/create');
        }
        return $this->upload->data('file_name');
    }

    // private function _do_upload()
    // {
    //     $config['upload_path']          = 'assets/uploads/proposal/';
    //     $config['allowed_types']        = 'doc|docx|pdf';
    //     $config['max_size']             = 4096; //set max size allowed in Kilobyte
    //     // $config['max_width']            = 1000; // set max width image allowed
    //     // $config['max_height']           = 1000; // set max height allowed
    //     // $config['file_name']            = round(microtime(true) * 1000);
    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload('proposal')) {
    //         $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
    //         redirect('member/pengajuan');
    //     }
    //     return $this->upload->data('file_name');
    // }

    // function do_upload() {
    //     // setting konfigurasi upload
    //     $config['upload_path'] = 'assets/uploads/proposal/';
    //     $config['allowed_types'] = 'doc|docx|pdf';
    //     $config['max_size'] = 4096;
    //     // load library upload
    //     $this->load->library('upload', $config);
    //     if (!$this->upload->do_upload('proposal')) {
    //         $error = $this->upload->display_errors();
    //         // menampilkan pesan error
    //         print_r($error);
    //     } else {
    //         $result = $this->upload->data();
    //         echo "<pre>";
    //         print_r($result);
    //         echo "</pre>";
    //     }
    // }

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
