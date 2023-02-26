<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class PesanModel extends Model
    {
        
        protected $table = 'tbl_pesanan';
        protected $useTimestamps = true;
        protected $allowedFields = ['id' ,'cover', 'judul', 'user', 'alamat', 'harga', 'kirim'];

        public function createID(){
            $idOld = $this->orderBy('id', 'desc')->first();

            if($idOld == null){
                $id = 1;
            }else{
                $idn = (int)$idOld['id'];
                $id = $idn + 1;
            }
            
            return $id;
        }

        public function getPesan($user){
            return $this->where(['user' => $user])->orderBy('created_at', 'desc')->findAll();
        }

        public function getAll(){
            return $this->orderBy('id', 'desc')->findAll();
        }

        public function getPesanan($id){
            return $this->where(['id' => $id])->first();
        }
    }

?>