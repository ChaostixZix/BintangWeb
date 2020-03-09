<?php

namespace App\Http\Controllers;

use App\PendaftarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Pendaftaran extends Controller
{
    private function PendaftarModel()
    {
        return new PendaftarModel();
    }

    public function getDataByTable($table)
    {
        $nisn = Session::get('nisn');
        $find = $this->PendaftarModel()->getDataByTable($nisn, $table)[0];
        return response()->json($find);
    }

    public function submitKeteranganSiswa(Request $request)
    {
        $data = $request->all();
        $data['nisn'] = Session::get('nisn');
        $do = $this->PendaftarModel()->tryDaftar($data);
        if (!$do) {
            $status = false;
        } else {
            $status = true;
        }
        return response()->json([
            'status' => $status,
            'id' => $do
        ]);
    }

    public function submitKeteranganPendidikan(Request $request)
    {
        $data = $request->all();
        $data['nisn'] = Session::get('nisn');
        $do = $this->PendaftarModel()->submitKeteranganPendidikan($data);
        if (!$do) {
            $status = false;
        } else {
            $status = true;
        }
        return response()->json([
            'status' => $status,
        ]);
    }

    public function submitKeteranganKesehatan(Request $request)
    {
        $data = $request->all();
        $data['nisn'] = Session::get('nisn');
        $do = $this->PendaftarModel()->submitKeteranganKesehatan($data);
        if (!$do) {
            $status = false;
        } else {
            $status = true;
        }
        return response()->json([
            'status' => $status,
        ]);
    }

}
