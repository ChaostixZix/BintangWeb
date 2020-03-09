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

    public function cekByNisn($nisn)
    {
        $get = $this->db()->where('nisn', $nisn)->get();
        if(count($get) > 0)
        {
            return true;
        }
        return false;
    }

    public function cekByNisnTable($nisn, $table)
    {
        $get = $this->db($table)->where('nisn', $nisn)->get();
        if(count($get) > 0)
        {
            return true;
        }
        return false;
    }

    public function getDataByTable($nisn, $table)
    {
        $find = $this->db($table)->where('nisn', $nisn)->get();
        if(count($find) > 0)
        {
            return $find;
        }
        return false;
    }

    public function tryDaftar(array $data)
    {
        $nisn = $data['nisn'];
        if(!$this->cekByNisn($nisn))
        {
            $this->db()->insertGetId($data);
        }else{
            $this->db()->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function submitKeteranganPendidikan(array $data)
    {
        $nisn = $data['nisn'];
        if(!$this->cekByNisnTable($nisn, 'pendaftar_pendidikan'))
        {
            $this->db('pendaftar_pendidikan')->insert($data);
        }elseif($this->cekByNisnTable($nisn, 'pendaftar_pendidikan'))
        {
            $this->db('pendaftar_pendidikan')->where('nisn', $nisn)->update($data);
        }
        return true;
    }

    public function submitKeteranganKesehatan(array $data)
    {
        $nisn = $data['nisn'];
        if(!$this->cekByNisnTable($nisn, 'pendaftar_kesehatan'))
        {
            $this->db('pendaftar_kesehatan')->insert($data);
        }elseif($this->cekByNisnTable($nisn, 'pendaftar_kesehatan'))
        {
            $this->db('pendaftar_kesehatan')->where('nisn', $nisn)->update($data);
        }
        return true;
    }
}
