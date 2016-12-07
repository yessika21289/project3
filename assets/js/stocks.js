/**
 * Created by nguks on 24/11/2016.
 */
$(document).ready(function() {
    var add_button = $('#add-stock-btn');
    var add_modal  = $('.add-stock-modal');
    $('.amount').autoNumeric('init', {
        aSep: '.',
        aDec: ',',
        unSetOnSubmit: true
    });

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
            "url": '/stocks/get-data',
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

    var $category = $('.category');
    $.get('/stocks/categories', function(data){
        $category.typeahead({
            source: data,
            autoSelect: true
        });
        $category.change(function() {
            var current = $category.typeahead("getActive");
            if (current) {
                // Some item from your model is active!
                if (current.name == $category.val()) {
                    // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
                } else {
                    // This means it is only a partial match, you can either add a new item
                    // or take the active if you don't want new items
                }
            } else {
                // Nothing is active so it is a new value (or maybe empty value)
            }
        });
    });

    var $name = $('.name');
    $.get('/stocks/names', function(data){
        $name.typeahead({
            source: data,
            autoSelect: true
        });
        $name.change(function() {
            var current = $name.typeahead("getActive");
            if (current) {
                // Some item from your model is active!
                if (current.name == $name.val()) {
                    // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
                } else {
                    // This means it is only a partial match, you can either add a new item
                    // or take the active if you don't want new items
                }
            } else {
                // Nothing is active so it is a new value (or maybe empty value)
            }
        });
    });
});