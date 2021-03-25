<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukti_pinjam extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
    }
    
    function index()
    {
        // $dompdf = new Dompdf();
        $this->load->view('laporan/bukti_pinjam');
    }

    public function cetak($no_transaksi)
	{
        $dompdf = new Dompdf();

        $where = array('no_transaksi' => $no_transaksi );
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE no_transaksi='$no_transaksi'")->result();

		// ini buat ngeload halaman yg bakal diprint
        $html = $this->load->view('laporan/bukti_pinjam', $data,true);

		$dompdf->load_html($html);

		//(Optional) Setup the paper size and orientation
		$dompdf->set_paper('A4', 'landscape');

		//render the HTML as PDF
		$dompdf->render();

		//Get the generated PDF file contents
		$pdf = $dompdf->output();

        //Output the generated PDF to Browser
        $dompdf->stream('bukti_pinjam.pdf', array("Attachment" => false)); 

	}
}
