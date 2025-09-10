<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class Vehicle
{
    public static function store(array $data): bool
    {
        $vehicle = DB::table('vehicles')
            ->insert($data);

        return $vehicle;
    }

    public static function delete(int $id): bool
    {
        $vehicle = DB::table('vehicles')
            ->where('id', $id)
            ->delete();

        return $vehicle;
    }

    public static function update(int $id, array $data): bool
    {
        $vehicle = DB::table('vehicles')
            ->where('id', $id)
            ->update($data);

        if ($vehicle === false) {
            return false;
        }

        return true;
    }

    public static function search()
    {
        $query = DB::table('vehicles as t0')
            ->select([
                't0.id',
                't0.plate_number',
                't0.year',
                't0.created_at',
                't0.models_id',
                't0.clients_id',
                't1.name as creator_name',
                't2.name as model_name',
                't2.brands_id',
                't3.name as brand_name',
                DB::raw('CONCAT(t4.name, " ", t4.paternal_surname, " ", t4.maternal_surname) as client_name'),
                't4.document_number as client_document_number',
                't4.email as client_email',
                't4.phone_number as client_phone_number'
            ])
            ->join('users as t1', 't1.id', 't0.created_by')
            ->join('models as t2', 't2.id', 't0.models_id')
            ->join('brands as t3', 't3.id', 't2.brands_id')
            ->join('clients as t4', 't4.id', 't0.clients_id')
            ->get();

        return $query;
    }

    public static function searchById($id)
    {
        $query = DB::table('vehicles as t0')
            ->select([
                't0.id',
                't0.plate_number',
                't0.year',
                't0.created_at',
                't0.models_id',
                't0.clients_id',
                't1.name as creator_name',
                't2.name as model_name',
                't2.brands_id',
                't3.name as brand_name',
                DB::raw('CONCAT(t4.name, " ", t4.paternal_surname, " ", t4.maternal_surname) as client_name'),
                't4.document_number as client_document_number',
                't4.email as client_email',
                't4.phone_number as client_phone_number'
            ])
            ->join('users as t1', 't1.id', 't0.created_by')
            ->join('models as t2', 't2.id', 't0.models_id')
            ->join('brands as t3', 't3.id', 't2.brands_id')
            ->join('clients as t4', 't4.id', 't0.clients_id')
            ->where('t0.id', $id)
            ->first();

        return $query;
    }
}
