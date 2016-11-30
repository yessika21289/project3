/**
 * Created by nguks on 24/11/2016.
 */
$(document).ready(function() {
    var add_button = $('#add-stock-btn');
    var add_modal  = $('.add-stock-modal');

    var table = $('#stocks-table').DataTable({
        "paging"    : true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": true,
        "pageLength": 10,
        "ajax": {
            "url": './stocks/get-data',
            'dataSrc':''
        },
        "columns": [
            { "data": "category" },
            { "data": "name" },
            { "data": "size" },
            { "data": "qty" },
            { "data": "box" },
            { "data": "total" },
            { "data": "coverage" },
            { "data": "selling_price" },
            { "data": "action" }
        ]
    });

    add_button.on('click', function() {
        add_modal.modal('show');
    });

    

    $('#category_name').autocomplete({
        serviceUrl: '/stocks/categories',
        onSelect: function (suggestion) {
            console.log(suggestion);
            //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
        }
    });

});