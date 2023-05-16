<?php

namespace App\Controllers;
use App\Models\NewsModel;

class News extends BaseController
{
    protected $NewsModel;
    public function __construct()
    {
        $this->NewsModel = new NewsModel();
    }
    public function index()
    {
        $news = $this->NewsModel->findAll();
        $data = [
            'title'=> 'Berita',
            'news' => $news
        ];
        return view('news/index',$data);
    }
    public function insert()
    {
        $data = [
            'title'=> 'Add News',
            'validation' => \Config\Services::validation()
        ];
        return view('news/insert',$data);
    }
    public function save()
    {

        //validasi input
        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[berita.title]',
                'errors' => [
                    'required' => '{field} Berita harus diisi.'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [

                    'max_size' => 'UKuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/news/insert')->withInput();
        }

        //ambil gambar
        $fileSampul = $this->request->getFile('gambar');
        //apakah tidak ada gambar yang diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            //nama random
            $namaSampul = $fileSampul->getRandomName();
            //pimdahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }
        $this->NewsModel->save([
            'title' => $this->request->getVar('title'),
            'penulis' => $this->request->getVar('penulis'),
            'content' => $this->request->getVar('content'),
            'gambar' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan.');

        return redirect()->to('/news');
    }


    public function delete($id)
    {
        //cari gambar berdasarkan id
        $News = $this->NewsModel->find($id);

        //cek jika gambarnya default
        if ($News['gambar'] != 'default.jpg') {
            //hapus gambar
            unlink('img/' . $News['gambar']);
        }


        $this->NewsModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
        return redirect()->to('/news');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Berita',
            'validation' => \Config\Services::validation(),
            'news' =>  $this->NewsModel->find($id)
        ];
        return view('news/edit', $data);
    }

    public function update($id)
    {
        $news = $this->NewsModel->find($id);
        //cek judul
        $beritaLama = $this->NewsModel->find($this->request->getVar('id_news'));
        if (!$this->validate([
            'title' => [
                'errors' => [
                    'required' => '{field} komik harus diisi.'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [

                    'max_size' => 'UKuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]

        ])) {

            return redirect()->to('/news/edit/' . $this->request->getVar('id_news'))->withInput();
        }


        $fileSampul = $this->request->getFile('gambar');


        //cek gambar , apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            //generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            //hapus file lama
            if ($news['gambar'] != 'default.jpg') {
                //hapus gambar
                unlink('img/' . $this->request->getvar('sampulLama'));
            }
            
        }

        $this->NewsModel->update($id,[
            'title' => $this->request->getPost('title'),
            'penulis' => $this->request->getPost('penulis'),
            'content' => $this->request->getVar('content'),
            'gambar' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil diubah.');

        return redirect()->to('/news');
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Berita',
            'validation' => \Config\Services::validation(),
            'news' =>  $this->NewsModel->find($id)
        ];
        return view('news/detail', $data);
    }
}