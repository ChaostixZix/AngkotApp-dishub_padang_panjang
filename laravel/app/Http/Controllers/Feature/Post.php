<?php

namespace App\Http\Controllers\Feature;


use App\Http\Controllers\Controller;
use App\web\postModel;
use Illuminate\Http\Request;

class Post extends Controller
{
    private function post_model()
    {
        return new postModel();
    }

        function new(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");
        $judul = $request->input('inputJudul');
        $konten = $request->input('inputKonten');
        $category = $request->input('inputCategory');
        $author = $request->input('author');
        $created_at = date('Y-m-d H:i:s');
        $gambar = null;

        if($request->hasFile('inputGambar'))
        {
            $file = $request->file('inputGambar');
            $nama_folder = substr_replace(' ', '_',  $judul);
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'postGambar/' . $nama_folder;
            $file->move($tujuan_upload, $nama_file());
            $gambar = $nama_folder . "/" . $nama_file;
        }

        $do = $this->post_model()->newPost($judul, $konten, $category, $gambar, $author, $created_at);
        if($do)
        {
            return 'true';
        }
        return 'false';
    }

    function update(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");
        $id = $request->input('id');
        $judul = $request->input('inputJudul');
        $konten = $request->input('inputKonten');
        $category = $request->input('inputCategory');
        $updated_at = date('Y-m-d H:i:s');
        $gambar = null;

        if($request->hasFile('inputGambar'))
        {
            $file = $request->file('inputGambar');
            $nama_folder = substr_replace(' ', '_',  $judul);
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'postGambar/' . $nama_folder;
            $file->move($tujuan_upload, $nama_file());
            $gambar = $nama_folder . "/" . $nama_file;
        }

        $do = $this->post_model()->updatePost($id, $judul, $konten, $category, $gambar, $updated_at);
        if($do)
        {
            return 'true';
        }
        return 'false';
    }

    function delete(Request $request)
    {
        $id = $request->input('id');

        $do = $this->post_model()->deletePost($id);
        if($do)
        {
            return 'true';
        }
        return 'false';
    }
}
