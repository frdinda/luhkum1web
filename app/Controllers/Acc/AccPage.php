<?php

namespace App\Controllers\Acc;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;

class AccPage extends BaseController
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
        $detail_pertanyaan = $this->pertanyaanModel->get_detail_pertanyaan($id_pertanyaan);
        $all_kasus = $this->kasusModel->get_kasus();
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $data_penjawab = $this->pertanyaanModel->get_nama_penyuluh($id_pertanyaan);
        $data_penanya = $this->userModel->get_detail_user($detail_pertanyaan['email_penanya']);
        $data = [
            'dp' => $detail_pertanyaan,
            'all_kasus' => $all_kasus,
            'id_akses' => $this->session->id_akses,
            'data_user' => $data_user,
            'nama_penjawab' => $data_penjawab['nama'],
            'nama_penanya' => $data_penanya['nama'],
            'email_penanya' => $detail_pertanyaan['email_penanya']
        ];
        return view('acc/acc_page', $data);
    }

    public function save_acc()
    {
        $id_akses = $this->session->id_akses;
        $id_pertanyaan = $this->request->getVar('id-pertanyaan');
        $email = $this->session->email;

        // TTD
        $img_awal = $this->request->getVar('sig-dataUrl');
        $img = str_replace('data:image/png;base64,', '', $img_awal);
        $img = str_replace(' ', '+', $img);
        $imgData = base64_decode($img);
        $namaimagenya = md5($imgData);
        $im = imagecreatefromstring($imgData);
        imagesavealpha($im, true);
        $white = imagecolorallocate($im, 255, 255, 255);
        imagefill($im, 0, 0, $white);
        $fileName = "ac201fd270c3b96beab24f2829780ab2/" . $namaimagenya . ".png";
        imagepng($im, $fileName);
        // END TTD 

        if ($id_akses == 'super' || $id_akses == 'pimti' || $id_akses == 'kasub' || $id_akses == 'kabid' || $id_akses == 'kadiv') {
            $this->pertanyaanModel->save([
                'id_pertanyaan' => $id_pertanyaan,
                'acc_pimpinan' => $this->request->getVar('acc'),
                'email_pimpinan' => $email,
                'keterangan_pimpinan' => $this->request->getVar('keterangan-pimpinan'),
                'signature_pimpinan' => $img_awal,
                'tanggal_acc' => $this->request->getVar('tanggal-acc')
            ]);
            $detail_pertanyaan = $this->pertanyaanModel->get_detail_pertanyaan($id_pertanyaan);
            $data_penanya = $this->userModel->get_detail_user($detail_pertanyaan['email_penanya']);
            $subject = 'Notifikasi Jawaban atas Konsultasi Hukum Anda';
            $message = "Penyuluh Hukum kami telah menjawab konsultasi hukum yang Anda buat di website kami. Silahkan klik link di bawah ini untuk melihat detail jawaban tersebut.";
            $path = base_url('/detail-tanya/' . $id_pertanyaan);
            $link = "Jawaban Konsultasi Hukum";
            $data = [
                'email' => $data_penanya['email'],
                'nama' => $data_penanya['nama'],
                'message' => $message,
                'path' => $path,
                'subject' => $subject,
                'link' => $link
            ];
            if ($this->request->getVar('acc') == '1') {
                $this->_sendEmail($data);
            } else {
                echo "<script>
                alert('Data Telah Terinput');
                window.location.href='/dashgen';
                </script>";
            }
        }
    }

    private function _sendEmail($data)
    {
        $to = $data['email'];
        $message = 'Hai, ' . $data['nama'] . '. ' . $data['message'] . ' <br> <a href="' . $data['path'] . '" >' . $data['link'] . '</a>';
        // $message = "LOL";
        $email = \Config\Services::email();
        $email->setSubject($data['subject']);
        $email->setTo($to);
        $email->setMessage($message);
        if ($email->send()) {
            // ganti
            echo "<script>
            alert('Data Telah Terinput dan Email Notifikasi Telah Terkirim kepada Penanya');
            window.location.href='/dashgen';
            </script>";
        } else {
            // pas production, matikan atau ganti echo lain
            echo $email->printDebugger();
            // return false;
            // echo "<script>
            // alert('Sepertinya Ada Masalah.');
            // window.location.href='/dashgen';
            // </script>";
        }
    }

    public function detail($id_pertanyaan)
    {
        $detail_pertanyaan = $this->pertanyaanModel->get_detail_pertanyaan($id_pertanyaan);
        $all_kasus = $this->kasusModel->get_kasus();
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $data_penjawab = $this->pertanyaanModel->get_nama_penyuluh($id_pertanyaan);
        $data_pimpinan = $this->pertanyaanModel->get_nama_pimpinan($id_pertanyaan);
        $data = [
            'dp' => $detail_pertanyaan,
            'all_kasus' => $all_kasus,
            'id_akses' => $this->session->id_akses,
            'data_user' => $data_user,
            'nama_penjawab' => $data_penjawab['nama'],
            'nama_pimpinan' => $data_pimpinan['nama'],
            'email' => $email
        ];
        return view('acc/detail_page', $data);
    }

    public function edit($id_pertanyaan)
    {
        $detail_pertanyaan = $this->pertanyaanModel->get_detail_pertanyaan($id_pertanyaan);
        $all_kasus = $this->kasusModel->get_kasus();
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $data_penjawab = $this->pertanyaanModel->get_nama_penyuluh($id_pertanyaan);
        $data_penanya = $this->userModel->get_detail_user($detail_pertanyaan['email_penanya']);
        $data = [
            'dp' => $detail_pertanyaan,
            'all_kasus' => $all_kasus,
            'id_akses' => $this->session->id_akses,
            'data_user' => $data_user,
            'nama_penjawab' => $data_penjawab['nama'],
            'nama_penanya' => $data_penanya['nama'],
            'email_penanya' => $detail_pertanyaan['email_penanya']
        ];
        return view('acc/edit_acc_page', $data);
    }
}
