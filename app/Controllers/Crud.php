<?php

    namespace App\Controllers;
    use App\Models\KomikModel;
    use App\Models\UserModel;
    use App\Models\PesanModel;

    class Crud extends BaseController{

        protected $KomikModel;
        protected $UserModel;
        protected $PesanModel;
        public function __construct(){
            $this->KomikModel = new KomikModel();
            $this->UserModel = new UserModel();
            $this->PesanModel = new PesanModel();
        }

        public function save(){

            if(!$this->validate([ 
                'judul' => [
                    'rules' => 'required|is_unique[tbl_komik.judul]',
                    'errors' => [
                        'required' => 'Judul komik harus di isi.',
                        'is_unique' => 'Judul komik sudah ada.'
                    ]
                    ],
                    'sinopsis' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Sinopsis harus di isi.'
                        ]
                        ],
                        'harga' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Harga harus di isi.'
                            ]
                            ],
                            'jenis' =>[
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Isi jenis buku.'
                                ]
                            ],
                            'cover' => [
                                'rules' => 'uploaded[cover]|max_size[cover,3072]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                                'errors' => [
                                    'uploaded' => 'Silahkan pilih gambar.',
                                    'max_size' => 'File gambar terlalu besar.',
                                    'is_image' => 'File yang anda pilih buakan gambar.',
                                    'mime_in' => 'File yang anda pilih buakan gambar.'
                                ]
                            ]
            ])){

                return redirect()->to('admin/insert')->withInput();
            }

            $cover = $this->request->getFile('cover');
            $cover->move('dist/img');
            $coverNama = $cover->getName();

            $slug = url_title($this->request->getVar('judul'), '-', true);
            $this->KomikModel->insert([
                'id' => $this->request->getVar('id'),
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'sinopsis' => $this->request->getVar('sinopsis'),
                'harga' => $this->request->getVar('harga'),
                'jenis' => $this->request->getVar('jenis'),
                'cover' => $coverNama,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil di tambahkan.');

            return redirect()->to('/admin');
        }

        public function update($id){

            $komikLama = $this->KomikModel->getKomik($this->request->getVar('slug'));

            if($komikLama['judul'] == $this->request->getVar('judul')){
                $rules_judul = 'required';
            }else{
                $rules_judul = 'required|is_unique[tbl_komik.judul]';
            }

            if(!$this->validate([ 
                'judul' => [
                    'rules' => $rules_judul,
                    'errors' => [
                        'required' => 'Judul komik harus di isi.',
                        'is_unique' => 'Judul komik sudah ada.'
                    ]
                    ],
                    'sinopsis' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Sinopsis harus di isi.'
                        ]
                        ],
                        'harga' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Harga harus di isi.'
                            ]
                            ],
                            'jenis' =>[
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Isi jenis buku.'
                                ]
                            ],
                            'cover' => [
                                'rules' => 'max_size[cover,3072]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                                'errors' => [
                                    'max_size' => 'File gambar terlalu besar.',
                                    'is_image' => 'File yang anda pilih buakan gambar.',
                                    'mime_in' => 'File yang anda pilih buakan gambar.'
                                ]
                            ]
            ])){
                
                return redirect()->to('admin/edit/'. $this->request->getVar('slug'))->withInput();
            }

            $cover = $this->request->getFile('cover');

            if($cover->getError() == 4){
                $coverNama = $this->request->getVar('coverLama');
            }else{
                $coverBaru = $this->request->getFile('cover');
                $coverBaru->move('dist/img');
                $coverNama = $coverBaru->getName();
                unlink('dist/img/'.$this->request->getVar('coverLama'));
            }

            $slug = url_title($this->request->getVar('judul'), '-', true);
            $this->KomikModel->save([
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'sinopsis' => $this->request->getVar('sinopsis'),
                'harga' => $this->request->getVar('harga'),
                'jenis' => $this->request->getVar('jenis'),
                'cover' => $coverNama, 
            ]);

            return redirect()->to('/admin');
        }

        public function delete($id){
            $komik = $this->KomikModel->find($id);
            unlink('dist/img/'.$komik['cover']);
            $this->KomikModel->delete($id);
            session()->setFlashdata('pesan', 'Data berhasil di hapus.');
            return redirect()->to('/admin');
        }

        public function pesan(){
            $data = $this->KomikModel->getKomik($this->request->getVar('slug'));
            $user = $this->UserModel->getUnik($_COOKIE['unik']);

            $saldoAwal = (int)$user['saldo'];
            $hargaAwal = (int)$data['harga'];

            if($saldoAwal != 0){
                $saldo = $saldoAwal - $hargaAwal;
            }else{
                session()->setFlashdata('pesan', 'Jumlah saldo tidak mencukupi.');
                return redirect()->to('/');
            }

            if($saldo <= -1){
                $saldo = -1;
            }

            if($saldo == -1){
                session()->setFlashdata('pesan', 'Jumlah saldo tidak mencukupi.');
                return redirect()->to('/');
            }else{
                $this->UserModel->save([
                    'id' => $user['id'],
                    'saldo' => $saldo
                ]);
    
                $this->PesanModel->insert([
                    'id' => $this->PesanModel->createID(),
                    'cover' => $data['cover'],
                    'judul' => $data['judul'],
                    'user' => $user['id'],
                    'alamat' => $user['alamat'],
                    'harga' => $data['harga'],
                    'kirim' => 'Dipesan'
                ]);
                return redirect()->to('/pesanan');
            }

            
        }

        public function batal(){
            $data = $this->PesanModel->getPesanan($this->request->getVar('id'));
            $user = $this->UserModel->getUnik($_COOKIE['unik']);

            $saldoAwal = (int)$user['saldo'];
            $hargaAwal = (int)$data['harga'];
            $saldo = $saldoAwal + $hargaAwal;

            $this->UserModel->save([
                'id' => $user['id'],
                'saldo' => $saldo,
            ]);

            $id = $this->request->getVar('id');
            $this->PesanModel->save([
                'id' => $id,
                'kirim' => 'Dibatalkan'
            ]);
            return redirect()->to('/pesanan');
        }

        public function kirim(){
            $data = $this->PesanModel->getPesanan($this->request->getVar('id'));
            $id = $this->request->getVar('id');

            if($data['kirim'] == "Dibatalkan"){
                $this->PesanModel->delete($id);
            }else{
                $this->PesanModel->save([
                    'id' => $this->request->getVar('id'),
                    'kirim' => 'Dikirim'
                ]);
            }

            return redirect()->to('/admin/pesanan_admin');
        }
    }

?>