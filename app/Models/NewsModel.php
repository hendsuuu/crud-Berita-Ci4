<?php  

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'berita';
    protected $useTimestamps = true;
    protected $primaryKey = 'id_news';
    protected $allowedFields = ['title','penulis','gambar','content'];
    public function getNews($id)
    {
        return $this->where(['id_news' => $id])->first();
    }
}