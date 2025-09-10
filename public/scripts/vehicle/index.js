
const routes = {
    table: baseUrl + '/app/vehicles/partials/vehicles-table',
    editModal: baseUrl + '/app/vehicles/partials/modals/edit-vehicle-modal',
    vehicles: baseUrl + '/app/vehicles',
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
            $('#section-table-vehicles').html(response)

            $('#table-vehicles').DataTable({
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

$(document).on('submit', '#create-vehicle-form', function (e) {
    e.preventDefault()

    const form = $(this).serialize()
    const btnSubmit = $(this).find('button[type="submit"]')

    $.ajax({
        url: baseUrl + '/app/vehicles ',
        type: 'POST',
        data: form,
        beforeSend: function () {
            btnSubmit.attr('disabled', true)
        },
        success: function (response) {
            if (response.statusCode === 200) {
                $('#create-vehicle-modal').modal('hide')

                Swal.fire({
                    title: 'Creada',
                    text: 'El vehículo ha sido creado correctamente',
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

            formValidations($('#create-vehicle-form'), errors)
        },
        complete: function () {
            btnSubmit.attr('disabled', false)
        }
    })
})

$(document).on('click', '#edit-vehicle-button', function () {
    const id = $(this).attr('data-id')

    $.ajax({
        url: routes.editModal,
        type: 'GET',
        data: { id: id },
        success: function (response) {
            $('#section-modal-edit-vehicle').html(response)

            $('#edit-vehicle-modal').modal('show')
        },
        error: function (error) {
            console.error(error)
        }
    })
})

$(document).on('submit', '#edit-vehicle-form', function (e) {
    e.preventDefault()

    const form = $(this).serialize()
    const id = $(this).find('input[name="id"]').val()
    const btnSubmit = $(this).find('button[type="submit"]')

    $.ajax({
        url: routes.vehicles + '/' + id,
        type: 'PUT',
        data: form,
        beforeSend: function () {
            btnSubmit.attr('disabled', true)
        },
        success: function (response) {
            if (response.statusCode === 200) {
                $('#edit-vehicle-modal').modal('hide')

                Swal.fire({
                    title: 'Actualizada',
                    text: 'El vehículo ha sido actualizado correctamente',
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

            formValidations($('#edit-vehicle-form'), errors)
        },
        complete: function () {
            btnSubmit.attr('disabled', false)
        }
    })
})

$(document).on('click', '#delete-vehicle-button', function () {
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
                url: routes.vehicles,
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
                            text: 'El vehículo ha sido borrado correctamente',
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
