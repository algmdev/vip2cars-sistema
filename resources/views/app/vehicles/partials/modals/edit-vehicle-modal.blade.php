<div class="modal fade" id="edit-vehicle-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar vehículo [{{ $vehicle->plate_number }}]</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="edit-vehicle-form">
                @csrf

                <input type="hidden" name="id" value="{{ $vehicle->id }}">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="plate_number" class="form-label">Placa: *</label>
                            <input type="text" class="form-control" name="plate_number" id="plate_number" value="{{ $vehicle->plate_number }}">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="year" class="form-label">Año de fabricación: *</label>
                            <input type="text" class="form-control" name="year" id="year" value="{{ $vehicle->year }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="brand_id" class="form-label">Marca: *</label>
                            <select class="form-select" name="brand_id">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @if ($brand->id === $vehicle->brands_id) selected @endif>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <label for="model_id" class="form-label">Modelo: *</label>
                            <select class="form-select" name="model_id">
                                @foreach ($models as $model)
                                    <option value="{{ $model->id }}" @if ($model->id === $vehicle->models_id) selected @endif>
                                        {{ $model->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label for="client_id" class="form-label">Cliente: *</label>
                            <select class="form-select" name="client_id">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" @if ($client->id === $vehicle->clients_id) selected @endif>
                                        {{ $client->document_number }} |
                                        {{ $client->name }} {{ $client->paternal_surname }}
                                        {{ $client->maternal_surname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
