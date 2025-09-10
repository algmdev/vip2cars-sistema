@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="roiw">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h2>¡Bienvenido {{ auth()->user()->name }}!</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
