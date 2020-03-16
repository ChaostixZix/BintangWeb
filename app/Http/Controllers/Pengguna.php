<?php

namespace App\Http\Controllers;

use App\PenggunaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Pengguna extends Controller
{
    private function PenggunaModel()
    {
        return new PenggunaModel();
    }

    public function daftar(Request $request)
    {
        $request->request->remove('_token');
        $data = $request->all();
        $do = $this->PenggunaModel()->tryRegister($data);
        if($do)
        {
            Session::put([
                'username' => $request->input('username'),
                'nisn' => $request->input('nisn')
            ]);
            return redirect()->route('index');
        }
        return redirect()->back();
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $do = $this->PenggunaModel()->tryLogin($username, $password);
        if($do)
        {
            $get = $this->PenggunaModel()->getData($username);
            Session::put([
                'username' => $get->username,
                'nisn' => $get->nisn,
                'level' => $get->level
            ]);
            return redirect()->route('index');
        }
        return redirect()->back();
    }
}
