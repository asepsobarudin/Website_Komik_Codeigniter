<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class UserModel extends Model
    {
        
        protected $table = 'tbl_user';
        protected $useTimestamps = true;
        protected $allowedFields = ['id', 'nama', 'alamat', 'nohp', 'username', 'password', 'unik', 'profile', 'saldo'];

        public function getUser(){
            return $this->where(['username' => 'Admin@gmail.com' ])->first();
        }

        public function getUnik($email){
            return $this->where(['username' => $email ])->first();
        }
    }

?>