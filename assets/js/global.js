function check_pwd(event){
    var pwd = $('#pwd');
    var con_pwd = $('#conf-pwd');
    if(pwd.val() || con_pwd.val()){
        pwd.attr('minlength', '6');
        pwd.attr('required', true);
        con_pwd.attr('minlength', '6');
        con_pwd.attr('required', true);
        if(pwd.val() != con_pwd.val() && pwd.val().length >=6 && con_pwd.val().length >=6){
            $('.pwd-error').show();
            event.preventDefault();
        }
        else
            $('.pwd-error').hide();
    }
    else if(typeof $('#user-id').val() !== 'undefined'){
        pwd.removeAttr('minlength');
        pwd.removeAttr('required');
        con_pwd.removeAttr('minlength');
        con_pwd.removeAttr('required');
    }
}

function check_duplicate_user(event, username){
    $.get('./duplicate_check/'+username, function(data){
        if(data['response']){
            $('.user-error').show();
            event.preventDefault();
        }
        else
            $('.user-error').hide();
    })
}

$(document).ready(function() {
    var $input = $('.area-form');

    $.get('./exist_area', function(data){
        $input.typeahead(
            {source: data, 
            autoSelect: true
            }
        ); 
        $input.change(function() {
            var current = $input.typeahead("getActive");
            if (current) {
                // Some item from your model is active!
                if (current.name == $input.val()) {
                    // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
                } else {
                    // This means it is only a partial match, you can either add a new item 
                    // or take the active if you don't want new items
                }
            } else {
                // Nothing is active so it is a new value (or maybe empty value)
            }
        });
        
    })
})