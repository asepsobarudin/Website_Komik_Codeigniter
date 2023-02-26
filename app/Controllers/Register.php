<?php

namespace App\Controllers;
use App\Models\UserModel;

class Register extends BaseController
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
        return view('Pages/login', $data);
    }
    
}
