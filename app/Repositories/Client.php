<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class Client
{
    public static function store(array $data): bool
    {
        $client = DB::table('clients')
            ->insert($data);

        return $client;
    }

    public static function delete(int $id): bool
    {
        $client = DB::table('clients')
            ->where('id', $id)
            ->delete();

        return $client;
    }

    public static function update(int $id, array $data): bool
    {
        $client = DB::table('clients')
            ->where('id', $id)
            ->update($data);

        if ($client === false) {
            return false;
        }

        return true;
    }

    public static function search()
    {
        $query = DB::table('clients as t0')
            ->select([
                't0.id',
                't0.name',
                't0.paternal_surname',
                't0.maternal_surname',
                't0.document_number',
                't0.email',
                't0.phone_number',
                't0.created_at',
                't1.name as creator_name'
            ])
            ->join('users as t1', 't1.id', 't0.created_by')
            ->get();

        return $query;
    }

    public static function searchById(int $id)
    {
        $query = DB::table('clients as t0')
            ->select([
                't0.id',
                't0.name',
                't0.paternal_surname',
                't0.maternal_surname',
                't0.document_number',
                't0.email',
                't0.phone_number',
                't0.created_at',
                't1.name as creator_name'
            ])
            ->join('users as t1', 't1.id', 't0.created_by')
            ->where('t0.id', $id)
            ->first();

        return $query;
    }
}
