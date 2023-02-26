<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    
    public function index(){
        $data = [
            'title' => ['title' => 'Komiku.com'],
        ];
        
        return view('/Pages/login', $data);
    }

    public function login(){
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $this->UserModel->getUnik($email);

        if($email == $data['username'] && $password == $data['password'] && $data['nama'] == 'Admin'){
            return redirect()->to('/admin');
        }else if($email == $data['username'] && $password == $data['password']){
            return redirect()->to('/home');
        }
    }


}
