<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        $data['total'] = $this->perpus_model->totalRows('anggota');
        $data['totall'] = $this->perpus_model->totalRows('buku');
        $data['totalll'] = $this->perpus_model->totalRows('petugas');
        $data['totallll'] = $this->perpus_model->totalRows('transaksi');

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
	}
}
