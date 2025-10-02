<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() {
        return view('home', 
        ['title' => 'Home Page']);
    }

    public function profile() {
        $data = [
            'nama' => 'Esta Janitra Lituhayu',
            'kelas' => 'XI PPLG 2',
            'sekolah' => 'SMK Raden Umar Said'
        ];
        return view('profile', $data, 
        ['title' => 'Profile Page']);
    }

    public function contact() {
        return view ('contact', 
        ['title' => 'Contact Page']);
    }
}
