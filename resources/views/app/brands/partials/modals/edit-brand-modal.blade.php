<div class="modal fade" id="edit-brand-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar marca [{{ $brand->name }}]</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="edit-brand-form">
                @csrf

                <input type="hidden" name="id" value="{{ $brand->id }}">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre: *</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre de la marca" value="{{ $brand->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción:</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Ingrese la descripción de la marca">{{ $brand->description }}</textarea>
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
