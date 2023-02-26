<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class JenisModel extends Model
    {
        
        protected $table = 'tbl_jenis';

        public function jenisAll(){
            return $this->findAll();
        }

        public function getJenis($jenis){
            return $this->where(['id' => $jenis])->first();
        }
    }

?>