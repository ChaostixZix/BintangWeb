<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PendaftarModel extends Model
{
    private function db($table = 'pendaftar')
    {
        return DB::table($table);
    }

    public function getAllDataByNisn($nisn)
    {
        $find = $this->db('user')->where('user.nisn', $nisn)
            ->leftJoin('pendaftar', 'user.nisn', '=', 'pendaftar.nisn')
            ->leftJoin('pendaftar_pendidikan', 'pendaftar.nisn', '=', 'pendaftar_pendidikan.nisn')
            ->leftJoin('pendaftar_kesehatan', 'pendaftar.nisn', '=', 'pendaftar_kesehatan.nisn')
            ->leftJoin('pendaftar_ayah', 'pendaftar.nisn', '=', 'pendaftar_ayah.nisn')
            ->leftJoin('pendaftar_ibu', 'pendaftar.nisn', '=', 'pendaftar_ibu.nisn')
            ->leftJoin('pendaftar_wali', 'pendaftar.nisn', '=', 'pendaftar_wali.nisn')
//            ->leftJoin('pendaftar_raport', 'pendaftar.nisn', '=', 'pendaftar_raport.nisn')
//            ->leftJoin('pendaftar_prestasi', 'pendaftar.nisn', '=', 'pendaftar_prestasi.nisn')
//            ->leftJoin('pendaftar_beasiswa', 'pendaftar.nisn', '=', 'pendaftar_beasiswa.nisn')
            ->get();
        if (isset($find[0]->raport)) {
            $find[0]->raport = json_decode($find[0]->raport);
        }
        if (isset($find[0]->prestasi)) {
            $find[0]->prestasi = json_decode($find[0]->prestasi);
        }
        if (isset($find[0]->beasiswa)) {
            $find[0]->beasiswa = json_decode($find[0]->beasiswa);
        }
        return $find;
    }

    public function getForDataTable(array $columns, $length, $column, $dir, $searchValue, $draw)
    {
        $query = $this->db()->orderBy('pendaftar.' . $columns[$column], $dir);
        if ($searchValue) {
            $query->where(function ($query) use ($searchValue) {
                $query->where('pendaftar.nama_lengkap', 'like', '%' . $searchValue . '%')
                    ->orWhere('pendaftar.nisn', 'like', '%' . $searchValue . '%');
            });
        }
        $query = $query->leftJoin('user', 'pendaftar.nisn', '=', 'user.nisn');
        $projects = $query->paginate($length);
        return ['data' => $projects, 'draw' => $draw];
    }

    public function cekByNisn($nisn)
    {
        $get = $this->db()->where('nisn', $nisn)->get();
        if (count($get) > 0) {
            return true;
        }
        return false;
    }

    public function cekByNisnTable($nisn, $table)
    {
        $get = $this->db($table)->where('nisn', $nisn)->get();
        if (count($get) > 0) {
            return true;
        }
        return false;
    }

    public function getDataByTable($nisn, $table)
    {
        $find = $this->db($table)->where('nisn', $nisn)->get();
        if (count($find) > 0) {
            return $find;
        }
        return false;
    }

    public function getDataFoto($nisn)
    {
        $find = $this->db('pendaftar_foto')->where('nisn', $nisn)->get();
        if (count($find) > 0) {
            return $find;
        }
        return false;
    }

    public function getDataRaport($nisn)
    {
        $find = $this->db('pendaftar_raport')->where('nisn', $nisn)->get();
        if (count($find) > 0) {
            return $find;
        }
        return false;
    }

    public function getDataPrestasi($nisn)
    {
        $find = $this->db('pendaftar_prestasi')->where('nisn', $nisn)->get();
        if (count($find) > 0) {
            return $find;
        }
        return false;
    }

    public function getDataBeasiswa($nisn)
    {
        $find = $this->db('pendaftar_beasiswa')->where('nisn', $nisn)->get();
        if (count($find) > 0) {
            return $find;
        }
        return false;
    }

    public function tryDaftar(array $data)
    {
        $nisn = $data['nisn'];
        if (!$this->cekByNisn($nisn)) {
            $this->db()->insertGetId($data);
        } else {
            $this->db()->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function submitKeteranganPendidikan(array $data)
    {
        $nisn = $data['nisn'];
        if (!$this->cekByNisnTable($nisn, 'pendaftar_pendidikan')) {
            $this->db('pendaftar_pendidikan')->insert($data);
        } elseif ($this->cekByNisnTable($nisn, 'pendaftar_pendidikan')) {
            $this->db('pendaftar_pendidikan')->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function submitKeteranganAyah(array $data)
    {
        $nisn = $data['nisn'];
        if (!$this->cekByNisnTable($nisn, 'pendaftar_ayah')) {
            $this->db('pendaftar_ayah')->insert($data);
        } elseif ($this->cekByNisnTable($nisn, 'pendaftar_ayah')) {
            $this->db('pendaftar_ayah')->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function submitKeteranganWali(array $data)
    {
        $nisn = $data['nisn'];
        if (!$this->cekByNisnTable($nisn, 'pendaftar_wali')) {
            $this->db('pendaftar_wali')->insert($data);
        } elseif ($this->cekByNisnTable($nisn, 'pendaftar_wali')) {
            $this->db('pendaftar_wali')->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function submitKeteranganPrestasi(array $data)
    {
        $nisn = $data['nisn'];
        if (!$this->cekByNisnTable($nisn, 'pendaftar_prestasi')) {
            $this->db('pendaftar_prestasi')->insert($data);
        } elseif ($this->cekByNisnTable($nisn, 'pendaftar_prestasi')) {
            $this->db('pendaftar_prestasi')->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function submitKeteranganBeasiswa(array $data)
    {
        $nisn = $data['nisn'];
        if (!$this->cekByNisnTable($nisn, 'pendaftar_beasiswa')) {
            $this->db('pendaftar_beasiswa')->insert($data);
        } elseif ($this->cekByNisnTable($nisn, 'pendaftar_beasiswa')) {
            $this->db('pendaftar_beasiswa')->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function submitKeteranganIbu(array $data)
    {
        $nisn = $data['nisn'];
        if (!$this->cekByNisnTable($nisn, 'pendaftar_ibu')) {
            $this->db('pendaftar_ibu')->insert($data);
        } elseif ($this->cekByNisnTable($nisn, 'pendaftar_ibu')) {
            $this->db('pendaftar_ibu')->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function submitKeteranganKesehatan(array $data)
    {
        $nisn = $data['nisn'];
        if (!$this->cekByNisnTable($nisn, 'pendaftar_kesehatan')) {
            $this->db('pendaftar_kesehatan')->insert($data);
        } elseif ($this->cekByNisnTable($nisn, 'pendaftar_kesehatan')) {
            $this->db('pendaftar_kesehatan')->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function submitKeteranganRaport(array $data)
    {
        $nisn = $data['nisn'];
        if (!$this->cekByNisnTable($nisn, 'pendaftar_raport')) {
            $this->db('pendaftar_raport')->insert($data);
        } elseif ($this->cekByNisnTable($nisn, 'pendaftar_raport')) {
            $this->db('pendaftar_raport')->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function submitFoto(array $data, $nisn)
    {
        if (!$this->cekByNisnTable($nisn, 'pendaftar_foto')) {
            $data['nisn'] = $nisn;
            $this->db('pendaftar_foto')->insert($data);
        } elseif ($this->cekByNisnTable($nisn, 'pendaftar_foto')) {
            $this->db('pendaftar_foto')->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function selesai($nisn)
    {
        $data = [
            'selesai' => 1
        ];
        return $this->db('user')->where('nisn', $nisn)->update($data);
    }
}
