$(document).ready(function() {
	$('.permission').change(function(){
		console.log($(this).prop('id'));
		console.log($(this).prop('checked'));
		var permission = $(this).prop('id').split('-');
		var permission_id = permission[0];
		var role = permission[1];
		var value = ($(this).prop('checked')) ? 1 : 0;
		$.ajax({
			"type": "POST",
            "data": "id="+permission_id+"&role="+role+"&value="+value,
            "url" : "/user/savePermission",
            "success" : function(data){
                console.log(data);
            }
		})
	})
})