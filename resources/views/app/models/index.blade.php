@extends('layouts.app')

@section('title', 'Modelos')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Lista de Modelos
                    </div>

                    <div>
                        <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#create-model-modal">
                            <i class="fa-solid fa-plus"></i>
                            Agregar
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div id="section-table-models"></div>
                </div>
            </div>
        </div>
    </div>

    @include('app.models.partials.modals.create-model-modal', [
        'brands' => $brands
    ])
    <div id="section-modal-edit-model"></div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/models/index.js') }}?v={{ date('YmdHis') }}"></script>
@endsection
