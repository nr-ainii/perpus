<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_petugas extends CI_Controller {

    public function index()
	{
        $data['petugas'] = $this->perpus_model->get_data('petugas')->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('petugas/data_petugas', $data);
        $this->load->view('template/footer');
    }
    
    public function tambah_petugas()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('petugas/form_tambah_petugas');
        $this->load->view('template/footer');
    }

    public function tambah_petugas_aksi()
    {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_petugas();

        } else {
            $nama             = $this->input->post('nama');
            $email            = $this->input->post('email');
            $password         = md5($this->input->post('password'));

            $data = array(
                'nama'        => $nama,
                'email'       => $email,
                'password'    => $password
            );

            $this->perpus_model->insert_data('petugas', $data );
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data petugas Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('data_petugas');
        }
        
    }

    public function update_petugas($id_petugas)
    {
        $where = array('id_petugas' => $id_petugas );
        $data['petugas'] = $this->db->query("SELECT * FROM petugas WHERE id_petugas='$id_petugas'")->result();
        // $data['supplier'] = $this->perpus_model->get_data('supplier')->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('petugas/form_update_petugas',$data);
        $this->load->view('template/footer');

    }

    public function update_petugas_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update_petugas();
        } else {
            $id_petugas               = $this->input->post('id_petugas');
            $nama               = $this->input->post('nama');
            $email              = $this->input->post('email');
            $password           = md5($this->input->post('password'));

            $data = array(
                'nama'          => $nama,
                'email'         => $email,
                'password'      => $password
            );
            
            $where = array('id_petugas' => $id_petugas );

            $this->perpus_model->update_data('petugas', $data, $where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data petugas Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('data_petugas');
        }
    }

    public function delete_petugas($id_petugas)
    {
        $where = array('id_petugas' => $id_petugas );

        $this->perpus_model->delete_data($where, 'petugas');
        $this->session->set_flashdata('pesan','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data petugas Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('data_petugas');
    }


    public function _rules()
    {
        $this->form_validation->set_rules('id_petugas', 'id_petugas', 'required');
        $this->form_validation->set_rules('nama', 'nama petugas', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    }
}
