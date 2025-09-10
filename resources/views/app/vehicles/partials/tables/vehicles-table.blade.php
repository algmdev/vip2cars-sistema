<div class="row">
    <div class="col-sm-12">
        <table id="table-vehicles" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año de Fabricación</th>
                    <th>Cliente</th>
                    <th>Nro Documento del Cliente</th>
                    <th>Correo del Cliente</th>
                    <th>Teléfono del Cliente</th>
                    <th>Creado por</th>
                    <th>Fecha creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->plate_number }}</td>
                        <td>{{ $vehicle->brand_name }}</td>
                        <td>{{ $vehicle->model_name }}</td>
                        <td>{{ $vehicle->year }}</td>
                        <td>{{ $vehicle->client_name }}</td>
                        <td>{{ $vehicle->client_document_number }}</td>
                        <td>{{ $vehicle->client_email }}</td>
                        <td>{{ $vehicle->client_phone_number }}</td>
                        <td>{{ $vehicle->creator_name }}</td>
                        <td>{{ $vehicle->created_at }}</td>
                        <td>
                            <button class="btn btn-sm text-primary" type="button" id="edit-vehicle-button" data-id="{{ $vehicle->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>

                            <button class="btn btn-sm text-danger" type="button" id="delete-vehicle-button" data-id="{{ $vehicle->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
