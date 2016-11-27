/**
 * Created by nguks on 21/11/2016.
 */
$(document).ready(function() {
    var loading = $('#loading');
    $('#stocks_migration').click(function () {
        $.ajax({
            type:'GET',
            url:'/migration',
            data: {
                migrate: 'stocks'
            },
            beforeSend: function(data) {
                loading.show();
            },
            success:function (data) {
                loading.hide();
                document.location.href = '/migration'
            }
        });
    });
});
