$(document).ready(function () {
    var oldEmpresa = "{{ old('empresa_id', $sucursal->empresa_id ?? '') }}";
    var oldSucursal = "{{ old('sucursal_id', $sucursal->id ?? '') }}";

    $("#empresa_id").change(function () {
        var empresaId = $(this).val();
        if (empresaId) {
            $.ajax({
                url: "/get-sucursales/" + empresaId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#sucursal_id")
                        .empty()
                        .prop("disabled", false)
                        .append(
                            '<option value="" disabled selected>Selecciona una Sucursal</option>'
                        );
                    $.each(data, function (key, value) {
                        $("#sucursal_id").append(
                            '<option value="' + key + '">' + value + "</option>"
                        );
                    });
                },
            });
        } else {
            $("#sucursal_id").empty().prop("disabled", true);
        }
    });

    if (oldEmpresa) {
        $("#empresa_id").val(oldEmpresa).trigger("change");
    }

    if (oldSucursal) {
        $.ajax({
            url: "/get-sucursales/" + oldEmpresa,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $("#sucursal_id")
                    .empty()
                    .prop("disabled", false)
                    .append(
                        '<option value="" disabled selected>Selecciona una Sucursal</option>'
                    );
                $.each(data, function (key, value) {
                    $("#sucursal_id").append(
                        '<option value="' +
                            key +
                            '" ' +
                            (key == oldSucursal ? "selected" : "") +
                            ">" +
                            value +
                            "</option>"
                    );
                });
            },
        });
    }
});
