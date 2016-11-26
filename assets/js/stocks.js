/**
 * Created by nguks on 24/11/2016.
 */

$(document).ready(function() {
    $('#stocks-table').DataTable({
        "paging"    : true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": true,
        "pageLength": 10,
        "ajax": {
            "url": '/stocks/get-data',
            'dataSrc':''
        },
        "columns": [
            { "data": "category" },
            { "data": "name" },
            { "data": "length" },
            { "data": "qty" },
            { "data": "box" },
            { "data": "total" },
            { "data": "coverage" },
            { "data": "selling_price" },
            { "data": "action" }
        ]
    });
});