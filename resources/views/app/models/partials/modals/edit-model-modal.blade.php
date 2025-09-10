<div class="modal fade" id="edit-model-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar modelo [{{ $model->name }}]</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="edit-model-form">
                @csrf

                <input type="hidden" name="id" value="{{ $model->id }}">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="brands_id" class="form-label">Marca: *</label>
                        <select class="form-select" name="brands_id">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @if ($brand->id === $model->brands_id) selected @endif>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre: *</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Ingrese el nombre de la modelo" value="{{ $model->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción:</label>
                        <textarea class="form-control" name="description" id="description" rows="3"
                            placeholder="Ingrese la descripción de la modelo">{{ $model->description }}</textarea>
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
