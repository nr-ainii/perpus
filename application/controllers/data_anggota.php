<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_anggota extends CI_Controller {

    public function index()
	{
        $data['anggota'] = $this->perpus_model->get_data('anggota')->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('anggota/data_anggota', $data);
        $this->load->view('template/footer');
    }
    
    public function tambah_anggota()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('anggota/form_tambah_anggota');
        $this->load->view('template/footer');
    }

    public function tambah_anggota_aksi()
    {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_anggota();
        } else {
            $nis               = $this->input->post('nis');
            $nama              = $this->input->post('nama');
            $kelas             = $this->input->post('kelas');
            $jenis_kelamin     = $this->input->post('jenis_kelamin');

            $data = array(
                'nis'             => $nis,
                'nama'            => $nama,
                'kelas'           => $kelas,
                'jenis_kelamin'   => $jenis_kelamin
            );

            $this->perpus_model->insert_data($data, 'anggota');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Anggota Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('data_anggota');
        }
    }

    public function update_anggota($nis)
    {
        $where = array('nis' => $nis );
        $data['anggota'] = $this->db->query("SELECT * FROM anggota WHERE nis='$nis'")->result();
        // $data['supplier'] = $this->perpus_model->get_data('supplier')->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('anggota/form_update_anggota',$data);
        $this->load->view('template/footer');

    }

    public function update_anggota_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update_anggota();
        } else {
            $nis                  = $this->input->post('nis');
            $nis                  = $this->input->post('nis');
            $nama                 = $this->input->post('nama');
            $kelas                = $this->input->post('kelas');
            $jenis_kelamin        = $this->input->post('jenis_kelamin');

            $data = array(
                'nis'             => $nis,
                'nama'            => $nama,
                'kelas'           => $kelas,
                'jenis_kelamin'   => $jenis_kelamin
            );
            
            $where = array('nis' => $nis );

            $this->perpus_model->update_data('anggota', $data, $where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data anggota Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('data_anggota');
        }
    }

    public function delete_anggota($nis)
    {
        $where = array('nis' => $nis );

        $this->perpus_model->delete_data($where, 'anggota');
        $this->session->set_flashdata('pesan','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data anggota Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('data_anggota');
    }

    public function search()
    {
        $cari = $this->input->post('cari');
        // // $data ['buku'] = $this->perpus_modal->cari_buku($cari);
        $data['anggota']   = $this->perpus_model->cari_anggota($cari);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('anggota/hasil', $data);
        $this->load->view('template/footer');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('nama', 'Nama anggota', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
    }
}
