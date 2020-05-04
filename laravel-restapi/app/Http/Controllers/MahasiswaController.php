<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index(){
        $data = Mahasiswa::all();

        if(count($data) > 0){
            $res['message'] = 'Success!';
            $res['values'] = $data;
            return response($res);
        }else{
            $res['message'] = 'Kosong!';
            return response($res);
        }
    }

    public function getId($id){
        $data = Mahasiswa::where('id', $id)->get();

        if(count($data) > 0){
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }else{
            $res['message'] = 'Gagal!';
            return response($res);
        }
    }

    public function create(Request $request){
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->email = $request->email;
        $mahasiswa->jurusan = $request->jurusan;

        if($mahasiswa->save()){
            $res['messages'] = "Data Berhasil ditambah!";
            $res['value'] = "$mahasiswa";
            return response($res);
        }
    }

    public function update(Request $request, $id){
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;

        $mhs = Mahasiswa::find($id);
        $mhs->nama = $nama;
        $mhs->nim = $nim;
        $mhs->email = $email;
        $mhs->jurusan = $jurusan;

        if($mhs->save()){
            $res['message'] = "Data berhasil diubah!";
            $res['value'] = "$mhs";
            return response($res);
        }else{
            $res['message'] = "Gagal!";
            return response($res);
        }
    }

    public function delete($id){
        $mhs = Mahasiswa::where('id', $id);

        if($mhs->delete()){
            $res['message'] = "Data berhasil dihapus!";
            return response($res);
        }else{
            $res['message'] = "Gagal!";
            return response($res);
        }
    }
}