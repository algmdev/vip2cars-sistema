<div class="row">
    <div class="col-sm-12 table-responsive">
        <table id="table-clients" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Nro. de documento</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Creado por</th>
                    <th>Fecha creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->paternal_surname }} {{ $client->maternal_surname }}</td>
                        <td>{{ $client->document_number }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone_number }}</td>
                        <td>{{ $client->creator_name }}</td>
                        <td>{{ $client->created_at }}</td>
                        <td>
                            <button class="btn btn-sm text-primary" type="button" id="edit-client-button" data-id="{{ $client->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>

                            <button class="btn btn-sm text-danger" type="button" id="delete-client-button" data-id="{{ $client->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
