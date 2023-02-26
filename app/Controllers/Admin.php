<?php

    namespace App\Controllers;
    use App\Models\KomikModel;
    use App\Models\UserModel;
    use App\Models\JenisModel;
    use App\Models\PesanModel;

    class Admin extends BaseController{

        protected $KomikModel;
        protected $UserModel;
        protected $JenisModel;
        protected $PesanModel;
        public function __construct(){
            $this->KomikModel = new KomikModel();
            $this->UserModel = new UserModel();
            $this->JenisModel = new JenisModel();
            $this->PesanModel = new PesanModel();
        }

        public function admin(){
            $data = [
                'title' => ['title' => 'Admin'],
                'home' => ['home' => 'admin'],
                'h' => ['h' => 'active'],
                'p' => ['p' => ''],
                'pesan' => ['pesan' => 'admin/pesanan_admin'],
                'komik' =>  $this->KomikModel->getAll(),
                'user' => $this->UserModel->getUser()
            ];

            return view('Pages/admin', $data);
        }

        public function detail_admin($slug){

            $id = $this->KomikModel->getKomik($slug);
            $data = [
                'title' => ['title' => 'Detail Komik'],
                'home' => ['home' => 'admin'],
                'h' => ['h' => ''],
                'p' => ['p' => ''],
                'pesan' => ['pesan' => 'admin/pesanan_admin'],
                'komik' => $this->KomikModel->getKomik($slug),
                'jenis' => $this->JenisModel->getJenis($id['jenis']),
                'user' => $this->UserModel->getUser()
            ];

            if(empty($data['komik'])){
                throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul Komik $slug tidak ditemukan.");
            }

            return view('Pages/detail_admin', $data);
        }

        public function insert(){

            $data = [
                'title' => ['title' => 'Insert Data'],
                'home' => ['home' => 'admin'],
                'h' => ['h' => ''],
                'p' => ['p' => ''],
                'pesan' => ['pesan' => 'admin/pesanan_admin'],
                'komik' => $this->KomikModel->createID(),
                'jenis' => $this->JenisModel->jenisAll(),
                'validation' => \Config\Services::validation(),
                'user' => $this->UserModel->getUser()
            ];

            return view('Pages/insert', $data);
        }

        public function edit($slug){

            $data = [
                'title' => ['title' => 'Edit Data'],
                'home' => ['home' => 'admin'],
                'h' => ['h' => ''],
                'p' => ['p' => ''],
                'pesan' => ['pesan' => 'admin/pesanan_admin'],
                'komik' => $this->KomikModel->getKomik($slug),
                'jenis' => $this->JenisModel->jenisAll(),
                'validation' => \Config\Services::validation(),
                'user' => $this->UserModel->getUser()
            ];

            return view('Pages/edit', $data);
        }

        public function pesanan_admin(){
            $data = [
                'title' => ['title' => 'Data Pesanan'],
                'home' => ['home' => 'admin'],
                'h' => ['h' => ''],
                'p' => ['p' => 'active'],
                'pesan' => ['pesan' => 'admin/pesanan_admin'],
                'user' => $this->UserModel->getUser(),
                'pesanan' => $this->PesanModel->getAll()
            ];

            return view('Pages/pesanan_admin', $data);
        }
    }
?>