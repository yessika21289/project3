/**
 * Created by nguks on 24/11/2016.
 */
$(document).ready(function() {
    var qty        = $('#qty');
    var sell_price = $('#sell-price');
    var discount_1 = $('#discount-1'); //percent
    var discount_2 = $('#discount-2'); //percent
    var discount_3 = $('#discount-3'); //rupiah
    var price_nett = $('#price-nett');
    var price_total = $('#price-total');
    var ppn = $('#ppn');
    var grand_total = $('#grand-total');
    var grand_total_nett = $('#grand-total-nett');
    var grand_discount = $('#grand-discount');
    var dp = $('#dp');
    var debt = $('#debt');

    $('#sell-price, #discount-1, #discount-2, #discount-3, #ppn').keyup(function(){
        nettPriceItemCalculate();
    })

    $('#grand-discount').keyup(function(){
        nettPriceGrandCalculate();
    })

    $('#dp').keyup(function(){
        depositeCalculate();
    })

    function nettPriceItemCalculate(){
        var discount_1_result = (100-discount_1.val())/100 * sell_price.val();
        var discount_2_result = (100-discount_2.val())/100 * discount_1_result;
        var discount_3_result = discount_2_result - discount_3.val();
        var ppn_val = (ppn.val().trim() == '') ? 0 : parseInt(ppn.val());
        var ppn_result = (100+ppn_val)/100 * discount_3_result;
        price_nett.text(Math.round(ppn_result));
        price_total.text(Math.round(ppn_result * qty.val()));
    }

    function nettPriceGrandCalculate(){
        var grand_total_nett_val = grand_total.text() - grand_discount.val();
        grand_total_nett.text(Math.round(grand_total_nett_val));
    }

    function depositeCalculate(){
        var debt_val = grand_total_nett.text() - dp.val();
        debt.text(debt_val);
    }
});