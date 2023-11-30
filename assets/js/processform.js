function processForm(formId) {
    Swal.fire({
        title: "Loading",
        html: "Please wait...",
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    var formData = $(formId).serialize();
    $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: formData,
        dataType: 'json',
        success: function (response) {
            setTimeout(function () {
                Swal.fire({
                    icon: response.status,
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                }).then(function () {
                    if (response.redirect) {
                        window.location.href = response.redirect
                    }
                })
            }, 1000)
        },
        error: function (error) {
            // Handle errors here
            console.log("Error:", error);
            setTimeout(function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Something went wrong',
                    showConfirmButton: false,
                    timer: 750
                }).then(function () {
                    if (response.redirect) {
                        window.location.href = response.redirect
                    }
                })
            }, 1000)
        },
    });
}