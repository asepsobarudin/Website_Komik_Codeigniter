<?php

    namespace App\Controllers;
    use App\Models\KomikModel;
    use App\Models\UserModel;
    use App\Models\JenisModel;
    use App\Models\PesanModel;

    class Pages extends BaseController{

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

        public function home(){
            $data = [
                'title' => ['title' => 'Komiku.com'],
                'home' => ['home' => 'home'],
                'h' => ['h' => 'active'],
                'p' => ['p' => ''],
                'pesan' => ['pesan' => 'pesanan'],
                'manga' =>  $this->KomikModel->getManga(),
                'novel' =>  $this->KomikModel->getNovel(),
                'user' => $this->UserModel->getUser()
            ];
            return view('Pages/home', $data);
        }

        public function pesanan(){

            $id = $this->UserModel->getUser();
            
            $data = [
                'title' => ['title' => 'Pesanan'],
                'home' => ['home' => 'home'],
                'h' => ['h' => ''],
                'p' => ['p' => 'active'],
                'pesan' => ['pesan' => 'pesanan'],
                'user' => $this->UserModel->getUser(),
                'pesanan' => $this->PesanModel->getPesan($id['id'])
            ];
            return view('Pages/pesanan', $data);
        }

        public function all($slug){
            $data = [
                'title' => ['title' => 'All Komik'],
                'home' => ['home' => '/home'],
                'h' => ['h' => ''],
                'p' => ['p' => ''],
                'pesan' => ['pesan' => '/pesanan'],
                'komik' =>  $this->KomikModel->getJenis($slug),
                'user' => $this->UserModel->getUser()
            ];
            return view('Pages/all', $data);
        }

        public function detail($slug){

            $id = $this->KomikModel->getKomik($slug);
            $data = [
                'title' => ['title' => 'Detail'],
                'home' => ['home' => 'home'],
                'h' => ['h' => ''],
                'p' => ['p' => ''],
                'pesan' => ['pesan' => 'pesanan'],
                'komik' =>  $this->KomikModel->getKomik($slug),
                'jenis' => $this->JenisModel->getJenis($id['jenis']),
                'user' => $this->UserModel->getUser()
            ];
            return view('Pages/detail', $data);
        }
    }
?>