<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanpdf extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
    }
    
    function index()
    {
        // $dompdf = new Dompdf();
        $this->load->view('laporan/laporan_tampilan');
    }

    public function cetak_laporan(Type $var = null)
	{
        $dompdf = new Dompdf();

        $data['transaksi'] = $this->perpus_model->get_data('transaksi')->result();

		// ini buat ngeload halaman yg bakal diprint
        $html = $this->load->view('laporan/laporan_tampilan', $data,true);

		$dompdf->load_html($html);

		//(Optional) Setup the paper size and orientation
		$dompdf->set_paper('A4', 'landscape');

		//render the HTML as PDF
		$dompdf->render();

		//Get the generated PDF file contents
		$pdf = $dompdf->output();

        //Output the generated PDF to Browser
        $dompdf->stream('laporan.pdf', array("Attachment" => false)); 

	}
}
