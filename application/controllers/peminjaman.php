<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function index()
	{
		// $nis = $this->input->post('nis');
		$data['tglpinjam']  = date('Y-m-d');
		$data['tglkembali'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tglpinjam'])));
		$data['autonumber'] = $this->mod_peminjaman->AutoNumbering();
        $data['anggota']    = $this->perpus_model->get_data('anggota')->result();
        $data['buku']    = $this->perpus_model->get_data('buku')->result();
        // $data['anggota']   = $this->mod_peminjaman->tampil_nama($nis);
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjaman/peminjaman_data', $data);
		$this->load->view('template/footer');
	}

	public function pinjam_buku()
    {
        // $this->_rules();
        
        // if ($this->form_validation->run() == FALSE) {
            // $this->peminjaman();
        // } else {
            $no_transaksi     = $this->input->post('no_transaksi');
            $nama             = $this->input->post('nama');
			$judul            = $this->input->post('judul');
            $tgl_pinjam       = $this->input->post('tgl_pinjam');
			$tgl_kembali      = $this->input->post('tgl_kembali');
			$status       	  = '1';
			$nama_petugas     = $this->session->userdata('nama');
			//1 pinjem, 2 balik

            $data = array(
                'no_transaksi'  => $no_transaksi,
				'nama'          => $nama,
                'judul'         => $judul,
				'tgl_pinjam'    => $tgl_pinjam,
                'tgl_kembali'   => $tgl_kembali,
                'status'       	=> $status,
                'nama_petugas'  => $nama_petugas
            );

            $this->perpus_model->insert_data($data, 'transaksi');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Peminjaman Berhasil!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('peminjaman/peminjaman_tampil');
        // }
	}
	
	public function peminjaman_tampil()
	{
        $data['transaksi'] = $this->perpus_model->get_data('transaksi')->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('peminjaman/peminjaman_tampil', $data);
        $this->load->view('template/footer');
	}

	public function form_kembali($no_transaksi)
    {
        $where = array('no_transaksi' => $no_transaksi );
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE no_transaksi='$no_transaksi'")->result();
        // $data['supplier'] = $this->perpus_model->get_data('supplier')->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('peminjaman/pengembalian',$data);
        $this->load->view('template/footer');

	}
	
	public function kembaliin()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->update_buku();
        // } else {
            $no_transaksi      = $this->input->post('no_transaksi');
            $nama         	   = $this->input->post('nama');
            $judul             = $this->input->post('judul');
            $tgl_kembali       = $this->input->post('tgl_kembali');
			$tgl_pengembalian  = $this->input->post('tgl_pengembalian');
			$status            = $this->input->post('status');

			$x                 = strtotime ($tgl_pengembalian);
			$y				   = strtotime ($tgl_kembali);
			$selisih   		   = abs($x - $y)/(60*60*24);
			$denda			   = $selisih * 2000;
			// var_dump($selisih);
			// die();

            $data = array(
                'no_transaksi'   	=> $no_transaksi,
				'nama'        		=> $nama,
				'judul'    			=> $judul,
                'tgl_kembali'       => $tgl_kembali,
                'tgl_pengembalian'  => $tgl_pengembalian,
				'status'    		=> $status,
				'denda'				=> $denda
            );
            
            $where = array('no_transaksi' => $no_transaksi );

            $this->perpus_model->update_data('transaksi', $data, $where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Buku Berhasil Dikembalikan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('peminjaman/peminjaman_tampil');
        // }
	}
	
	public function perpanjang($no_transaksi)
    {
        $where = array('no_transaksi' => $no_transaksi );
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE no_transaksi='$no_transaksi'")->result();
        // $data['supplier'] = $this->perpus_model->get_data('supplier')->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('peminjaman/perpanjang',$data);
        $this->load->view('template/footer');
	}

	public function perpanjang_aksi()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->update_buku();
        // } else {
            $no_transaksi      = $this->input->post('no_transaksi');
            $nama         	   = $this->input->post('nama');
            $judul             = $this->input->post('judul');
            $tgl_kembali       = $this->input->post('tgl_kembali');

            $data = array(
                'no_transaksi'   	=> $no_transaksi,
				'nama'        		=> $nama,
				'judul'    			=> $judul,
                'tgl_kembali'       => $tgl_kembali
            );
            
            $where = array('no_transaksi' => $no_transaksi );

            $this->perpus_model->update_data('transaksi', $data, $where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil Diperpanjang!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('peminjaman/peminjaman_tampil');
        // }
	}

	public function search()
    {
        $cari = $this->input->post('cari');
        // // $data ['buku'] = $this->perpus_modal->cari_buku($cari);
        $data['transaksi']   = $this->perpus_model->cari_transaksi($cari);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('peminjaman/hasil', $data);
        $this->load->view('template/footer');
    }
	

	// public function _rules()
    // {
    //     $this->form_validation->set_rules('nama', 'Nama', 'required');
    //     $this->form_validation->set_rules('judul', 'Judul', 'required');
    // }

	
}