<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ModelVehicle
{
    public static function store(array $data): bool
    {
        $model = DB::table('models')
            ->insert($data);

        return $model;
    }

    public static function delete(int $id): bool
    {
        $model = DB::table('models')
            ->where('id', $id)
            ->delete();

        return $model;
    }

    public static function update(int $id, array $data): bool
    {
        $model = DB::table('models')
            ->where('id', $id)
            ->update($data);

        if ($model === false) {
            return false;
        }

        return true;
    }

    public static function search()
    {
        $query = DB::table('models as t0')
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
        $query = DB::table('models as t0')
            ->select([
                't0.id',
                't0.name',
                't0.description',
                't0.created_at',
                't0.brands_id',
                't1.name as creator_name'
            ])
            ->join('users as t1', 't1.id', 't0.created_by')
            ->where('t0.id', $id)
            ->first();

        return $query;
    }

    public static function searchByBrandId($id)
    {
        $query = DB::table('models as t0')
            ->select([
                't0.id',
                't0.name',
                't0.description',
                't0.created_at',
                't0.brands_id',
                't1.name as creator_name'
            ])
            ->join('users as t1', 't1.id', 't0.created_by')
            ->where('t0.brands_id', $id)
            ->get();

        return $query;
    }
}
