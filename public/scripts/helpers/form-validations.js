
const formValidations = (form, response) => {
    $('.form-control').removeClass('is-invalid')
    $('.invalid-feedback').remove()
    $('#alert-errors').empty()

    if (response?.errors) {
        form.find('.form-control').each(function () {
            const $this = $(this)
            const name = $this.attr('name')

            if (response?.errors[name]) {
                $this.addClass('is-invalid')
                $this.after(`<div class="invalid-feedback">${response?.errors[name]}</div>`)
            } else {
                $this.removeClass('is-invalid')
                $this.next('.invalid-feedback').remove()
            }
        })
    }


    if (response?.message && !response?.errors) {
        form.find('#alert-errors').html(`<div class="alert alert-danger" role="alert">${response.message}</div>`)
    }
}
