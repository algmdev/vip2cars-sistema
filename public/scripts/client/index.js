
const routes = {
    table: baseUrl + '/app/clients/partials/clients-table',
    editModal: baseUrl + '/app/clients/partials/modals/edit-client-modal',
    clients: baseUrl + '/app/clients',
}

const searchTable = () => {
    $.ajax({
        url: routes.table,
        type: 'GET',
        beforeSend: function () {
            Swal.fire({
                allowOutsideClick: false,
                showConfirmButton: false,
                showCloseButton: false,
                timer: 2000,
                title: 'Cargando...',
                html: '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div>'
            })
        },
        success: function (response) {
            $('#section-table-clients').html(response)

            $('#table-clients').DataTable({
                language: {
                    url: dtSpanish
                }
            })
        },
        error: function (error) {
            console.error(error)
        },
        complete: function () {
            Swal.close()
        }
    })
}

searchTable()

$(document).on('submit', '#create-client-form', function (e) {
    e.preventDefault()

    const form = $(this).serialize()
    const btnSubmit = $(this).find('button[type="submit"]')

    $.ajax({
        url: baseUrl + '/app/clients ',
        type: 'POST',
        data: form,
        beforeSend: function () {
            btnSubmit.attr('disabled', true)
        },
        success: function (response) {
            if (response.statusCode === 200) {
                $('#create-client-modal').modal('hide')

                Swal.fire({
                    title: 'Creada',
                    text: 'El cliente ha sido creado correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                    timer: 2000
                }).then(() => {
                    searchTable()
                })
            }
        },
        error: function (error) {
            const errors = error?.responseJSON

            formValidations($('#create-client-form'), errors)
        },
        complete: function () {
            btnSubmit.attr('disabled', false)
        }
    })
})

$(document).on('click', '#edit-client-button', function () {
    const id = $(this).attr('data-id')

    $.ajax({
        url: routes.editModal,
        type: 'GET',
        data: { id: id },
        success: function (response) {
            $('#section-modal-edit-client').html(response)

            $('#edit-client-modal').modal('show')
        },
        error: function (error) {
            console.error(error)
        }
    })
})

$(document).on('submit', '#edit-client-form', function (e) {
    e.preventDefault()

    const form = $(this).serialize()
    const id = $(this).find('input[name="id"]').val()
    const btnSubmit = $(this).find('button[type="submit"]')

    $.ajax({
        url: routes.clients + '/' + id,
        type: 'PUT',
        data: form,
        beforeSend: function () {
            btnSubmit.attr('disabled', true)
        },
        success: function (response) {
            if (response.statusCode === 200) {
                $('#edit-client-modal').modal('hide')

                Swal.fire({
                    title: 'Actualizada',
                    text: 'El cliente ha sido actualizado correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                    timer: 2000
                }).then(() => {
                    searchTable()
                })
            }
        },
        error: function (error) {
            const errors = error?.responseJSON

            formValidations($('#edit-client-form'), errors)
        },
        complete: function () {
            btnSubmit.attr('disabled', false)
        }
    })
})

$(document).on('click', '#delete-client-button', function () {
    const id = $(this).attr('data-id')

    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-secondary',
        },
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: routes.clients,
                type: 'DELETE',
                data: {
                    id: id
                },
                beforeSend: function () {
                    Swal.fire({
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        showCloseButton: false,
                        timer: 2000,
                        title: 'Borrando...',
                        html: '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Borrando...</span></div>'
                    })
                },
                success: function (response) {
                    if (response.statusCode === 200) {
                        Swal.fire({
                            title: 'Borrado',
                            text: 'El cliente ha sido borrado correctamente',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                            timer: 2000
                        }).then(() => {
                            searchTable()
                        })
                    }
                },
                error: function (error) {
                    console.error(error)
                },
                complete: function () {
                    Swal.close()
                }
            })
        }
    })
})
