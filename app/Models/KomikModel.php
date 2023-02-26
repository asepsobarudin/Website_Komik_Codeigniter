<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class KomikModel extends Model
    {
        
        protected $table = 'tbl_komik';
        protected $useTimestamps = true;
        protected $allowedFields = ['id', 'judul', 'slug', 'cover', 'sinopsis', 'jenis', 'harga'];

        public function getAll(){
            return $this->orderBy('created_at', 'desc')->findAll();
        }

        public function getManga(){
            return $this->where(['jenis' => '1'])->orderBy('created_at', 'desc')->findAll();
        }

        public function getNovel(){
            return $this->where(['jenis' => '2'])->orderBy('created_at', 'desc')->findAll();
        }

        public function getKomik($slug = false){
            return $this->where(['slug' => $slug])->first();
        }

        public function getJenis($slug = false){
            return $this->where(['jenis' => $slug])->orderBy('id', 'desc')->findAll();
        }

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
    }

?>