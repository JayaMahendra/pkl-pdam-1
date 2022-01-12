<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends MY_Controller
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
        $data            = konfigurasi('Pengajuan', 'Kelola Pengajuan');
        $data['pengajuans'] = $this->Person_model->get_all();
        $this->template->load('layouts/template', 'admin/pengajuans/index', $data);
    }

    public function add()
    {
        $data = konfigurasi('Tambah pengajuan', 'Tambah pengajuan');
        $this->template->load('layouts/template', 'admin/pengajuans/create', $data);
    }

    public function create()
    {
        $name    = $this->input->post('name');
        $address = $this->input->post('address');

        $data = [
            'name'    => $name,
            'address' => $address,
        ];
        $this->Person_model->insert($data);
        redirect('admin/pengajuan');
    }

    public function edit($id)
    {
        $data           = konfigurasi('Edit pengajuan', 'Edit pengajuan');
        $data['person'] = $this->Person_model->get_by_id($id);
        $this->template->load('layouts/template', 'admin/pengajuans/update', $data);
    }

    public function update()
    {
        $id      = $this->input->post('id');
        $name    = $this->input->post('name');
        $address = $this->input->post('address');

        $data = [
            'name'    => $name,
            'address' => $address,
        ];
        $this->Person_model->update(['id' => $id], $data);
        redirect('admin/pengajuan');
    }

    public function detail($id)
    {
        $data           = konfigurasi('Detail pengajuan', 'Detail pengajuan');
        $data['pengajuan'] = $this->Person_model->get_by_id($id);
        $this->template->load('layouts/template', 'admin/pengajuans/detail', $data);
    }

    public function delete($id)
    {
        $this->Person_model->delete($id);
        redirect('admin/pengajuan');
    }
}

/* End of file Person.php */
