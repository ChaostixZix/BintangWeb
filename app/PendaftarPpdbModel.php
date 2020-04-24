<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PendaftarPpdbModel extends Model
{
    private function db($table = 'pendaftar_ppdb')
    {
        return DB::table($table);
    }

    public function getById($id)
    {
        $get = $this->db()->where('id', $id)->get();
        if($get)
        {
            return $get;
        }
        return false;
    }
}
