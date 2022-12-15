 $('#form-anemnesa').on('submit', (e) => {
    e.preventDefault()
     $.ajax({
        url: e.target['action'],
        method: e.target['method'],
        processData: false,
        contentType: false,
        dataType: 'json',
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: new FormData(e.target),
        beforeSend: () => {
             $(e.target).find("span.error-text").text("");
        },
        success: (res) => {
            console.log(res)
             $("#form-anemnesa")[0].reset();
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
        error: (res) => {
            $.each(res.responseJSON.errors, (prefix, val) => {
                        $("span." + prefix + "_error").text(val[0]);
                    });
        }
        })
})

