<div class="modal fade" id="edit-client-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar cliente [{{ $client->name }}]</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="edit-client-form">
                @csrf

                <input type="hidden" name="id" value="{{ $client->id }}">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre: *</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Ingrese el nombre del cliente" value="{{ $client->name }}">
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="paternal_surname" class="form-label">Apellido paterno: *</label>
                                <input type="text" class="form-control" name="paternal_surname"
                                    id="paternal_surname" value="{{ $client->paternal_surname }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="maternal_surname" class="form-label">Apellido materno: *</label>
                                <input type="text" class="form-control" name="maternal_surname"
                                    id="maternal_surname" value="{{ $client->maternal_surname }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="document_number" class="form-label">Nro. de documento: *</label>
                                <input type="text" class="form-control" name="document_number" id="document_number" value="{{ $client->document_number }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="email" class="form-label">Correo: *</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ $client->email }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Teléfono: *</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $client->phone_number }}">
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
