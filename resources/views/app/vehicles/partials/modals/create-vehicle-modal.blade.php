<div class="modal fade" id="create-vehicle-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Agregar nuevo vehículo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="create-vehicle-form">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="plate_number" class="form-label">Placa: *</label>
                            <input type="text" class="form-control" name="plate_number" id="plate_number">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="year" class="form-label">Año de fabricación: *</label>
                            <input type="text" class="form-control" name="year" id="year">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="model_id" class="form-label">Modelo: *</label>
                            <select class="form-select" name="model_id">
                                @foreach ($models as $model)
                                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="brand_id" class="form-label">Marca: *</label>
                            <select class="form-select" name="brand_id">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label for="client_id" class="form-label">Cliente: *</label>
                            <select class="form-select" name="client_id">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->document_number }} | {{ $client->name }} {{ $client->paternal_surname }} {{ $client->maternal_surname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
