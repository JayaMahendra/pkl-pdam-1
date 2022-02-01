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
        $data['pengajuans'] = $this->Pengajuan_model->get_all();
        // print_r($this->session->userdata());
        // die();
        $this->template->load('layouts/template', 'admin/validasi/index', $data);
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

        // if (!empty($_FILES['proposal']['name'])) {
        //     $upload = $this->_do_upload();

        //     //delete file
        //     $user = $this->Pengajuan_model->get_by_id($this->session->userdata('id'));
        //     if (file_exists('assets/uploads/proposal/' . $user->proposal) && $user->proposal) {
        //         unlink('assets/uploads/proposal/' . $user->proposal);
        //     }

        //     $data['proposal'] = $upload;
        // }

        $this->Pengajuan_model->insert($data);

        redirect('member/pengajuan');
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

        $suratbalasanFileName  = "";
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

        $data = array(
            'tanggal_disetujui'    => date('d-m-Y H:i:s'),
            'surat_balasan' => $suratbalasanFileName,
        );
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

    public function detail($id)
    {
        $data           = konfigurasi('Detail Pengajuan', 'Detail Pengajuan');
        $data['pengajuan'] = $this->Pengajuan_model->get_by_id($id);
        $data['pengajuan_mahasiswa'] = $this->Pengajuan_model->pengajuan_mahasiswa($id);
        $this->template->load('layouts/template', 'admin/validasi/detail', $data);
    }

    public function delete($id)
    {
        $this->Pengajuan_model->delete($id);
        redirect('member/pengajuan');
    }
}

/* End of file Person.php */
