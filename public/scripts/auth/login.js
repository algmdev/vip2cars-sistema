
const routes = {
    login: baseUrl + '/auth',
}

$(document).on('submit', '#login-form', function (e) {
    e.preventDefault()

    const form = $(this).serialize()
    const btnSubmit = $(this).find('button[type="submit"]')

    $.ajax({
        url: routes.login,
        type: 'POST',
        data: form,
        beforeSend: function () {
            btnSubmit.attr('disabled', true)
        },
        success: function (response) {
            if (response.statusCode === 200) {
                window.location.href = '/app'
            }
        },
        error: function (error) {
            const errors = error?.responseJSON

            formValidations($('#login-form'), errors)
        },
        complete: function () {
            btnSubmit.attr('disabled', false)
        }
    })
})
