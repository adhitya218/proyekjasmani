<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new fpdf('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'PT. HILMI BOOKS YANG GOOD SANGAT',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR LAPORAN PRODUK KELUAR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(85,6,'KODE BARANG',1,0);
        $pdf->Cell(85,6,'NAMA BARANG',1,1);

        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get('tb_barang_keluar')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(85,6,$row->kode_barang,1,0);
            $pdf->Cell(85,6,$row->nama_barang,1,1);

        }
        $pdf->Output();
    }
}