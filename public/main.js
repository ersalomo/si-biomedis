$(document).ready(() =>{
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
                     Toastify({
                            avatar: '/dist/assets/images/icon/sucess.png',
                            text: `Data pasien created successfully`,
                            duration: 2500,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#2fb344",
                            // selector: $('#modal-obat').modal('hide'),
                        }).showToast();
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
