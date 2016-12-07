/**
 * Created by nguks on 21/11/2016.
 */
var loading = $('#loading');
$(document).ready(function() {
    $('#stocks_migration').click(function () {
        $.ajax({
            type:'GET',
            url:'./migration',
            data: {
                migrate: 'stocks'
            },
            beforeSend: function(data) {
                loading.show();
            },
            success:function (data) {
                loading.hide();
                document.location.href = './migration'
            }
        });
    });
});

function sellMigration(){
    $.ajax({
        type:'GET',
        url:'./migration/sell',
        beforeSend: function(data) {
            loading.show();
        },
        success:function (data) {
            loading.hide();
            document.location.href = './migration'
        }
    });
}