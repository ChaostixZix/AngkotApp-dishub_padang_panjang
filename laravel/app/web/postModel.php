<?php

namespace App\web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class postModel extends Model
{
    private function db()
    {
        return DB::table('post_data');
    }

    private function db_other($table)
    {
        return DB::table($table);
    }

    public function newPost($judul, $konten, $category, $gambar,  $author, $created_at)
    {
        if(!$this->isCategoryExist($category))
        {
            $this->addCategory($category);
        }
        $insert = [
            'judul' => $judul,
            'konten' => $konten,
            'kategori' => $category,
            'gambar' => $gambar,
            'author' => $author,
            'created_at' => $created_at
        ];
        $this->db()->insert($insert);
        return true;
    }

    public function addCategory($category)
    {
        $insert = [
            'nama' => $category
        ];
        $this->db_other('post_category')->insert($insert);
        return true;
    }

    public function getCategories()
    {
        $get = $this->db_other('post_category')->get();
        return $get;
    }

    public function isCategoryExist($category)
    {
        $get = $this->db_other('post_category')->where('nama', $category)->exists();
        return $get;
    }

    public function deletePost($id)
    {
        $this->db()->where('id', $id)->delete();
        return true;
    }

    public function updatePost($id, $judul, $konten, $category, $gambar,  $updated_at)
    {
        if(!$this->isCategoryExist($category))
        {
            $this->addCategory($category);
        }
        $update = [
            'judul' => $judul,
            'konten' => $konten,
            'kategori' => $category,
            'updated_at' => $updated_at
        ];
        if($gambar !== null)
        {
            $update['gambar'] = $gambar;
        }
        $this->db()->where('id', $id)->update($update);
        return true;
    }

    public function get($id = null)
    {
        if($id !== null)
        {
            $get = $this->db()->where('id', $id)->get();
            return $get;
        }
        $get = $this->db()->orderBy('created_at', 'desc')->get();
        return $get;
    }
}
