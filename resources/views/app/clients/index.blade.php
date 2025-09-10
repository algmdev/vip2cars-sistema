@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Lista de Clientes
                    </div>

                    <div>
                        <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#create-client-modal">
                            <i class="fa-solid fa-plus"></i>
                            Agregar
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div id="section-table-clients"></div>
                </div>
            </div>
        </div>
    </div>

    @include('app.clients.partials.modals.create-client-modal')
    <div id="section-modal-edit-client"></div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/client/index.js') }}?v={{ date('YmdHis') }}"></script>
@endsection
