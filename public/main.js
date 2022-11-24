$(function () {
    $("#form-pasien").on("submit", (e) => {
        e.preventDefault();
            $.ajax({
                url: e.target["action"],
                method: e.target["method"],
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                // data: new FormData(e.target),
                data:Object.assign(new FormData(e.target),{'_token':"{{csrf_token()}}"}),
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: () => {
                    $(e.target).find("span.error-text").text("");
                },
                success: (data) => {
                    $("#form-pasien")[0].reset();
                    Swal.fire({
                        title: data.title,
                        text: data.msg,
                        icon: "success",
                    });
                },
                error: (data) => {
                    $.each(data.responseJSON.errors, (prefix, val) => {
                        $("span." + prefix + "_error").text(val[0]);
                    });
                },
            });
    });
    $('button.btn-cancel').on('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        $('#form-pasien').find("span.error-text").text("");
    })
});
