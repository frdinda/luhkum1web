<?php

namespace App\Controllers\PrintPdf;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;

use TCPDF;

class Home extends BaseController
{
    protected $pertanyaanModel;
    protected $kasusModel;
    protected $userModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModel();
        $this->kasusModel = new KasusModel();
        $this->userModel = new UserModel();
    }

    public function index($id_pertanyaan)
    {
        $id_akses = $this->session->id_akses;
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $all_kasus = $this->kasusModel->get_kasus();
        $detail_pertanyaan = $this->pertanyaanModel->get_detail_pertanyaan($id_pertanyaan);
        $data_penjawab = $this->pertanyaanModel->get_nama_penyuluh($id_pertanyaan);
        $data_penanya = $this->pertanyaanModel->get_nama_penanya($id_pertanyaan);
        // dd($data_penanya);
        // ttd penanya
        $img = str_replace('data:image/png;base64,', '', $detail_pertanyaan['signature_penanya']);
        $img = str_replace(' ', '+', $img);
        $imgData = base64_decode($img);
        $namaimagenya_penanya = md5($imgData);
        // end ttd
        // ttd penjawab
        $img = str_replace('data:image/png;base64,', '', $detail_pertanyaan['signature_penjawab']);
        $img = str_replace(' ', '+', $img);
        $imgData = base64_decode($img);
        $namaimagenya_penjawab = md5($imgData);
        // end ttd
        // ttd penjawab
        $img = str_replace('data:image/png;base64,', '', $detail_pertanyaan['signature_pimpinan']);
        $img = str_replace(' ', '+', $img);
        $imgData = base64_decode($img);
        $namaimagenya_pimpinan = md5($imgData);
        // end ttd

        if ($data_penjawab['id_akses'] == 'super') {
            $nama_penjawab = "Super Admin";
        } else {
            $nama_penjawab = $data_penjawab['nama'];
        }
        if ($id_akses == 'luhkum') {
            $data_penyuluh = $this->userModel->get_detail_user($email);
        } else {
            $data_penyuluh = null;
        }
        $data = [
            'id_akses' => $this->session->id_akses,
            'email' => $email,
            'dp' => $detail_pertanyaan,
            'all_kasus' => $all_kasus,
            'data_penyuluh' => $data_penyuluh,
            'nama_penjawab' => $nama_penjawab,
            'data_penjawab' => $data_penjawab,
            'data_penanya' => $data_penanya,
            'data_user' => $data_user,
            'namaimagenya_penanya' => $namaimagenya_penanya,
            'namaimagenya_penjawab' => $namaimagenya_penjawab,
            'namaimagenya_pimpinan' => $namaimagenya_pimpinan
        ];
        $html = view('printpdf/printpdf', $data);
        $nama_pdf = "pdf_konsul_" . $detail_pertanyaan['id_pertanyaan'];

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Call before the addPage() method
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetFont('times', '', 12);
        $pdf->SetMargins(15, 15, 15, true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage('P', 'A4');

        // Print text using writeHTMLCell()
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        // ganti nama pdfnya
        $pdf->Output($nama_pdf, 'I');
    }
}
