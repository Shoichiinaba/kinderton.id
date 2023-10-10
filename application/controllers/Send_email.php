<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Send_email extends CI_Controller
{


    public function index()
    {
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'mail.kinderton.id',
            'smtp_user' => 'aktivasi@kinderton.id',  // Email gmail
            'smtp_pass'   => 'kinderton123!',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('aktivasi@kinderton.id', 'Kinderton');

        // Email penerima
        $this->email->to('aktivasi@kinderton.id'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.orami.co.id%2Fmagazine%2Fkartun-anak-yang-mendidik&psig=AOvVaw2gXK9JDYmKMCv3oz92HvwW&ust=1664341553038000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCPDh_86ZtPoCFQAAAAAdAAAAABAD');

        // Subject email
        $this->email->subject('Aktivasi akun kinderton shop  | Kinderton.id');
        $data = array(
            'userName' => 'Kinderton'
        );
        $body = $this->load->view('email/email_template.php', $data, TRUE);
        $this->email->message($body);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }


    }
}