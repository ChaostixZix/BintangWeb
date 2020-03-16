<?php

namespace App\Http\Controllers;

use App\Exports\PendaftarExport;
use App\Exports\PendaftarRaportExport;
use App\PendaftarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class Pendaftaran extends Controller
{
    private function PendaftarModel()
    {
        return new PendaftarModel();
    }

    public function exportData($nisn)
    {
//        return (new PendaftarExport($nisn))->download('invoices.xlsx');
        return Excel::download(new PendaftarExport($nisn), 'siswa- ' . $nisn . '.xlsx');
//        return response()->json($this->PendaftarModel()->getAllDataByNisn($nisn));
    }

    public function exportRaport($nisn)
    {
//        return (new PendaftarExport($nisn))->download('invoices.xlsx');
        return Excel::download(new PendaftarRaportExport($nisn), 'raport- ' . $nisn . '.xlsx');
//        return response()->json($this->PendaftarModel()->getAllDataByNisn($nisn));
    }

    public function getAllDataByNisn($nisn)
    {
        $find = $this->PendaftarModel()->getAllDataByNisn($nisn);
        return response()->json($find[0]);
    }

    public function getSiswaDatatable(Request $request)
    {
        $columns = ['nisn', 'nama_lengkap'];
        $length = $request->input('length');
        $column = $request->input('column'); //Indexweb
        $dir = $request->input('dir');
        $searchValue = $request->input('search');
        $draw = $request->input('draw');

        return $this->PendaftarModel()->getForDataTable($columns, $length, $column, $dir, $searchValue, $draw);
    }

    public function getDataByTable($table)
    {
        $nisn = Session::get('nisn');
        $find = $this->PendaftarModel()->getDataByTable($nisn, $table)[0];
        return response()->json($find);
    }

    public function getDataPrestasi()
    {
        $nisn = Session::get('nisn');
        $find = $this->PendaftarModel()->getDataPrestasi($nisn);
        if (empty($find) || $find == false) {
            return response()->json('null');
        }
        $find = json_decode($find[0]->prestasi, true);
        return response()->json($find);

    }
    public function getDataPrestasiByNisn($nisn)
    {
        $find = $this->PendaftarModel()->getDataPrestasi($nisn);
        if (empty($find) || $find == false) {
            return response()->json('null');
        }
        $find = json_decode($find[0]->prestasi, true);
        return response()->json($find);

    }

    public function getDataBeasiswa()
    {
        $nisn = Session::get('nisn');
        $find = $this->PendaftarModel()->getDataBeasiswa($nisn);
        if (empty($find) || $find == false) {
            return response()->json('null');
        }
        $find = json_decode($find[0]->beasiswa, true);
        return response()->json($find);

    }

    public function getDataBeasiswaByNisn($nisn)
    {
        $find = $this->PendaftarModel()->getDataBeasiswa($nisn);
        if (empty($find) || $find == false) {
            return response()->json('null');
        }
        $find = json_decode($find[0]->beasiswa, true);
        return response()->json($find);

    }

    public function getDataRaport($semester)
    {
        $nisn = Session::get('nisn');
        $find = $this->PendaftarModel()->getDataRaport($nisn);
        if (empty($find) || $find == false) {
            return response()->json('null');
        }
        $find = json_decode($find[0]->raport, true);
        if (isset($find[$semester]) && !empty($find[$semester])) {
            return response()->json($find[$semester]);
        } else {
            return response()->json('null');
        }
    }
    public function getDataRaportByNisn($nisn, $semester)
    {
        $find = $this->PendaftarModel()->getDataRaport($nisn);
        if (empty($find) || $find == false) {
            return response()->json('null');
        }
        $find = json_decode($find[0]->raport, true);
        if (isset($find[$semester]) && !empty($find[$semester])) {
            return response()->json($find[$semester]);
        } else {
            return response()->json('null');
        }
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

    public function submitKeteranganAyah(Request $request)
    {
        $data = $request->all();
        $data['nisn'] = Session::get('nisn');
        $do = $this->PendaftarModel()->submitKeteranganAyah($data);
        if (!$do) {
            $status = false;
        } else {
            $status = true;
        }
        return response()->json([
            'status' => $status,
        ]);
    }

    public function submitKeteranganIbu(Request $request)
    {
        $data = $request->all();
        $data['nisn'] = Session::get('nisn');
        $do = $this->PendaftarModel()->submitKeteranganIbu($data);
        if (!$do) {
            $status = false;
        } else {
            $status = true;
        }
        return response()->json([
            'status' => $status,
        ]);
    }

    public function submitKeteranganWali(Request $request)
    {
        $data = $request->all();
        $data['nisn'] = Session::get('nisn');
        $do = $this->PendaftarModel()->submitKeteranganWali($data);
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

    public function submitKeteranganPrestasi(Request $request)
    {
        $data = $request->all();
        $nisn = Session::get('nisn');
        $newData = [];
        foreach ($data as $d => $val)
        {
            $newData[$d] = json_decode($val);
        }
        $newData = json_encode($newData);
        $data = [
            'nisn' => $nisn,
            'prestasi' => $newData
        ];
        $do = $this->PendaftarModel()->submitKeteranganPrestasi($data);
        if (!$do) {
            $status = false;
        } else {
            $status = true;
        }
        return response()->json([
            'status' => $status,
        ]);
    }

    public function submitKeteranganBeasiswa(Request $request)
    {
        $data = $request->all();
        $nisn = Session::get('nisn');
        $newData = [];
        foreach ($data as $d => $val)
        {
            $newData[$d] = json_decode($val);
        }
        $newData = json_encode($newData);
        $data = [
            'nisn' => $nisn,
            'beasiswa' => $newData
        ];
        $do = $this->PendaftarModel()->submitKeteranganBeasiswa($data);
        if (!$do) {
            $status = false;
        } else {
            $status = true;
        }
        return response()->json([
            'status' => $status,
        ]);
    }

    public function submitFoto(Request $request)
    {
        $nisn = Session::get('nisn');
        $data = $request->all();
        $file = $request->file('file');

        $tujuan_upload = 'data_file/' . $nisn . '/' . $data['name'];
        $file->move($tujuan_upload,$file->getClientOriginalName());
        $array = [
            $data['name'] => $tujuan_upload . '/' . $file->getClientOriginalName()
        ];
        $do = $this->PendaftarModel()->submitFoto($array, $nisn);
        if (!$do) {
            $status = false;
        } else {
            $status = true;
        }
        return response()->json([
            'status' => $status,
        ]);
    }

    public function submitKeteranganRaport(Request $request, $semester)
    {
        $data = $request->all();
        $ket = [
            'nisn' => Session::get('nisn'),
        ];
        $newData = [];
        $raport = $this->PendaftarModel()->getDataRaport($ket['nisn']);
        if ($raport !== false) {
            $raport = json_decode($raport[0]->raport, true);
            $newRaport = $raport;
        }
        foreach ($data as $d => $value) {
            $newData[$d] = json_decode($value);
        }
        $newRaport[$semester] = $newData;
        $dataRaport = json_encode($newRaport);
        $do = $this->PendaftarModel()->submitKeteranganRaport(['nisn' => $ket['nisn'], 'raport' => $dataRaport]);
        if (!$do) {
            $status = false;
        } else {
            $status = true;
        }
        return response()->json([
            'status' => $status,
        ]);
    }

    public function selesai($nisn)
    {
        $do = $this->PendaftarModel()->selesai($nisn);
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
