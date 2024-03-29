$(document).ready(function () {
    var table = $("#myTable").DataTable({
        layout: {
            top1: "searchBuilder",
        },
        ajax: {
            url: "https://antrian.rsreksawaluya.com.dev/api/ralan",
            dataSrc: "",
            responsive: true,
        },
        columns: [
            { data: "tgl_registrasi" },
            { data: "no_rkm_medis" },
            { data: "nm_pasien" },
            { data: "nm_dokter" },
            {
                data: null,
                render: function (data, type, row) {
                    return '<button class="btn btn-sm btn-primary"><i class="fas fa-bullhorn"></i></button>';
                },
            },
        ],
    });

    $("#myTable").on("click", 'button[type="submit"]', function () {
        var data = table.row($(this).closest("tr")).data();
        console.log("Data yang dikirim:", data);
    });

    function refreshDataTable() {
        table.ajax.reload(null, false);
    }
    setInterval(refreshDataTable, 5000); // Contoh: Setiap 5 detik
});
