$(document).ready(function() {
    var qty        = $('#qty');
    var sell_price = $('#sell-price');
    var discount_1 = $('#discount-1'); //percent
    var discount_2 = $('#discount-2'); //percent
    var discount_3 = $('#discount-3'); //rupiah
    var price_nett = $('#price-nett');
    var price_total = $('#price-total');
    var ppn         = $('#ppn');
    var grand_total = $('#grand-total');
    var grand_total_nett = $('#grand-total-nett');
    var grand_discount = $('#grand-discount');
    var dp = $('#dp');
    var debt = $('#debt');

    $('#qty, #sell-price, #discount-1, #discount-2, #discount-3, #ppn').keyup(function(){
        nettPriceItemCalculate();
    })

    $('#grand-discount').keyup(function(){
        nettPriceGrandCalculate();
    })

    $('#dp').keyup(function(){
        depositeCalculate();
    })

    var grand_total_sum = 0;

    var selling_list = $('#table-selling-list').DataTable({
        "paging"    : true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": true,
        "pageLength": 10,
        "ajax": {
            "url": '/selling/getSellingList',
            'dataSrc':''
        },
        "columns": [
            { "data": "no" },
            { "data": "no_faktur" },
            { "data": "date_faktur" },
            { "data": "price_nett" },
            { "data": "dp" },
            { "data": "debt" },
            { "data": "edit" }
        ]
    });

    var list_product_selling = $('#list-product-selling').DataTable({
        "paging"    : true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": true,
        "pageLength": 5,
        "ajax": {
            "url": '/selling/getProductSelling/'+$('#selling-id').val(),
            'dataSrc':''
        },
        "columns": [
            { "data": "product_id" },
            { "data": "qty" },
            { "data": "unit" },
            { "data": "sell_price" },
            { "data": "sell_price_total" }
        ],
        "initComplete": function(settings, json) {
            for(var i = 0; i<json.length; i++){
                grand_total_sum += parseInt(json[i].sell_price_total);
            }
            grand_total.val(grand_total_sum);
            nettPriceGrandCalculate();
          }
    });

    var stocks_table_selling = $('#stocks-table-selling').DataTable({
        "paging"    : true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": true,
        "pageLength": 5,
        "ajax": {
            "url": '/selling/getStockSelling',
            'dataSrc':''
        },
        "columns": [
            { "data": "category" },
            { "data": "pid" },
            { "data": "name" },
            { "data": "size" },
            { "data": "qty" },
            { "data": "box" },
            { "data": "total" },
            { "data": "coverage" },
            { "data": "selling_price" }
        ],
        "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ]
    });

    $('#stocks-table-selling tbody').on('click', 'tr', function () {
        var data = stocks_table_selling.row( this ).data();
        $('#product-id').val(29);
        $('#product-name').val('willi');
        $('#myModal2').modal('hide');
    } );

    var cust_table = $('#customer-table').DataTable({
        "paging"    : true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "responsive": true,
        "autoWidth": true,
        "pageLength": 5,
        "ajax": {
            "url": '/selling/getCustomerSelling',
            'dataSrc':''
        },
        "columns": [
            { "data": "KODE" },
            { "data": "NAMA" },
            { "data": "ALAMAT" },
            { "data": "KOTA" },
            { "data": "TELP" }
        ],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ]
    })

    $('#customer-table tbody').on('click', 'tr', function () {
        var data = cust_table.row( this ).data();
        $('#cust-id').val(data.KODE);
        $('#cust-name').val(data.NAMA);
        $('#cust-address').val(data.ALAMAT);
        $('#customer-modal').modal('hide');
    } );

    $('form#add-product-selling').on( "submit", function(event) {
        addProductSelling(event)
    });

    $('form#selling-header').on( "submit", function(event) {
        console.log('adffsa');
    });

    function nettPriceItemCalculate(){
        var discount_1_result = (100-discount_1.val())/100 * sell_price.val();
        var discount_2_result = (100-discount_2.val())/100 * discount_1_result;
        var discount_3_result = discount_2_result - discount_3.val();
        var ppn_val = (ppn.val().trim() == '') ? 0 : parseInt(ppn.val());
        var ppn_result = (100+ppn_val)/100 * discount_3_result;
        price_nett.val(Math.round(ppn_result));
        price_total.val(Math.round(ppn_result * qty.val()));
    }

    function nettPriceGrandCalculate(){
        var grand_total_nett_val = grand_total.val() - grand_discount.val();
        grand_total_nett.val(Math.round(grand_total_nett_val));
        depositeCalculate();
    }

    function depositeCalculate(){
        var debt_val = grand_total_nett.val() - dp.val();
        debt.val(debt_val);
    }

    function addProductSelling(e){
        $.ajax({
            "type": "POST",
            "data": $('#add-product-selling').serialize(),
            "url" : "/selling/saveProductSelling",
            "success" : function(data){
                list_product_selling.rows.add([{
                    "product_id": data.product_id,
                    "qty": data.qty,
                    "unit": data.unit,
                    "sell_price": data.sell_price,
                    "sell_price_total": data.sell_price_total
                }]).draw();
                grand_total_sum += parseInt(data.sell_price_total);
                grand_total.val(grand_total_sum);
                nettPriceGrandCalculate();
                $('#add-product-selling-modal').modal('hide');
            }
        })
        e.preventDefault();
    }
});