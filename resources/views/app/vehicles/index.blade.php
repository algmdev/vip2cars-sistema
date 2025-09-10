@extends('layouts.app')

@section('title', 'Vehículos')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Lista de Vehículos
                    </div>

                    <div>
                        <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#create-vehicle-modal">
                            <i class="fa-solid fa-plus"></i>
                            Agregar
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div id="section-table-vehicles"></div>
                </div>
            </div>
        </div>
    </div>

    @include('app.vehicles.partials.modals.create-vehicle-modal')
    <div id="section-modal-edit-vehicle"></div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/vehicle/index.js') }}?v={{ date('YmdHis') }}"></script>
@endsection
