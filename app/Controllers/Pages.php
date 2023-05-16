<?php

namespace App\Controllers;
use App\Models\NewsModel;

class Pages extends BaseController
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
            'title'=> 'Eric News',
            'news' => $news
        ];
        return view('pages/home',$data);
    }
    public function about()
    {
        $data = [
            'title' => 'About'
        ];
        return view('pages/about',$data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact'
        ];
        return view('pages/contact',$data);
    }
    public function login()
    {
        $data = [
            'title' => 'login'
        ];
        return view('pages/login',$data);
    }
    public function register()
    {
        return view('pages/register');
    }
}
