@extends('layouts.app')

@section('title', 'Marcas')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Lista de Marcas
                    </div>

                    <div>
                        <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#create-brand-modal">
                            <i class="fa-solid fa-plus"></i>
                            Agregar
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div id="section-table-brands"></div>
                </div>
            </div>
        </div>
    </div>

    @include('app.brands.partials.modals.create-brand-modal')
    <div id="section-modal-edit-brand"></div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/brand/index.js') }}?v={{ date('YmdHis') }}"></script>
@endsection
