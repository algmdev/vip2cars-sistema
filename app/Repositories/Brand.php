<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class Brand
{
    public static function store(array $data): bool
    {
        $brand = DB::table('brands')
            ->insert($data);

        return $brand;
    }

    public static function delete(int $id): bool
    {
        $brand = DB::table('brands')
            ->where('id', $id)
            ->delete();

        return $brand;
    }

    public static function update(int $id, array $data): bool
    {
        $brand = DB::table('brands')
            ->where('id', $id)
            ->update($data);

        if ($brand === false) {
            return false;
        }

        return true;
    }

    public static function search()
    {
        $query = DB::table('brands as t0')
            ->select([
                't0.id',
                't0.name',
                't0.description',
                't0.created_at',
                't1.name as creator_name'
            ])
            ->join('users as t1', 't1.id', 't0.created_by')
            ->get();

        return $query;
    }

    public static function searchById(int $id)
    {
        $query = DB::table('brands as t0')
            ->select([
                't0.id',
                't0.name',
                't0.description',
                't0.created_at',
                't1.name as creator_name'
            ])
            ->join('users as t1', 't1.id', 't0.created_by')
            ->where('t0.id', $id)
            ->first();

        return $query;
    }
}
