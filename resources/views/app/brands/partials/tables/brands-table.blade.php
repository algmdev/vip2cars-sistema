<div class="row">
    <div class="col-sm-12">
        <table id="table-brands" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Creado por</th>
                    <th>Fecha creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->description }}</td>
                        <td>{{ $brand->creator_name }}</td>
                        <td>{{ $brand->created_at }}</td>
                        <td>
                            <button class="btn btn-sm text-primary" type="button" id="edit-brand-button" data-id="{{ $brand->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>

                            <button class="btn btn-sm text-danger" type="button" id="delete-brand-button" data-id="{{ $brand->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
