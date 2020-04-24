<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenggunaModel extends Model
{
    private function db()
    {
        return DB::table('user');
    }

    public function getData($username)
    {
        $find = $this->db()->where('username', $username)->get()->first();
        return $find;
    }

    public function tryRegister(array $data)
    {
        return $this->db()->insert($data);
    }

    public function tryLogin($username, $password)
    {
        $find = $this->db()->where([
            'username' => $username,
            'password' => $password
        ])->get();
        if($find)
        {
            return true;
        }
        return false;
    }
}
