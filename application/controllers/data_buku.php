<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_buku extends CI_Controller {

    public function index()
	{
        $data['buku'] = $this->perpus_model->get_data('buku')->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('buku/data_buku', $data);
        $this->load->view('template/footer');
    }
    
    public function tambah_buku()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('buku/form_tambah_buku');
        $this->load->view('template/footer');
    }

    public function tambah_buku_aksi()
    {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_buku();
        } else {
            $kode_buku         = $this->input->post('kode_buku');
            $judul             = $this->input->post('judul');
            $pengarang         = $this->input->post('pengarang');
            $deskripsi         = $this->input->post('deskripsi');

            $data = array(
                'kode_buku'    => $kode_buku,
                'judul'        => $judul,
                'pengarang'    => $pengarang,
                'deskripsi'    => $deskripsi
            );

            $this->perpus_model->insert_data($data, 'buku');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data buku Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('data_buku');
        }
    }

    public function update_buku($kode_buku)
    {
        $where = array('kode_buku' => $kode_buku );
        $data['buku'] = $this->db->query("SELECT * FROM buku WHERE kode_buku='$kode_buku'")->result();
        // $data['supplier'] = $this->perpus_model->get_data('supplier')->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('buku/form_update_buku',$data);
        $this->load->view('template/footer');

    }

    public function update_buku_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update_buku();
        } else {
            $kode_buku         = $this->input->post('kode_buku');
            $kode_buku         = $this->input->post('kode_buku');
            $judul             = $this->input->post('judul');
            $pengarang         = $this->input->post('pengarang');
            $deskripsi         = $this->input->post('deskripsi');

            $data = array(
                'kode_buku'    => $kode_buku,
                'judul'        => $judul,
                'pengarang'    => $pengarang,
                'deskripsi'    => $deskripsi
            );
            
            $where = array('kode_buku' => $kode_buku );

            $this->perpus_model->update_data('buku', $data, $where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data buku Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('data_buku');
        }
    }

    public function delete_buku($kode_buku)
    {
        $where = array('kode_buku' => $kode_buku );

        $this->perpus_model->delete_data($where, 'buku');
        $this->session->set_flashdata('pesan','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data buku Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('data_buku');
    }

    public function search()
    {
        $cari = $this->input->post('cari');
        // // $data ['buku'] = $this->perpus_modal->cari_buku($cari);
        $data['buku']   = $this->perpus_model->cari_buku($cari);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('buku/hasil', $data);
        $this->load->view('template/footer');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_buku', 'kode_buku', 'required');
        $this->form_validation->set_rules('judul', 'judul buku', 'required');
        $this->form_validation->set_rules('pengarang', 'pengarang', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
    }
}
