<div class="row">
    <div class="col-sm-12">
        <table id="table-models" class="table table-bordered table-hover">
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
                @foreach ($models as $model)
                    <tr>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->name }}</td>
                        <td>{{ $model->description }}</td>
                        <td>{{ $model->creator_name }}</td>
                        <td>{{ $model->created_at }}</td>
                        <td>
                            <button class="btn btn-sm text-primary" type="button" id="edit-model-button" data-id="{{ $model->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>

                            <button class="btn btn-sm text-danger" type="button" id="delete-model-button" data-id="{{ $model->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
