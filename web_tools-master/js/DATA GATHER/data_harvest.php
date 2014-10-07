<?php ?>
	
<script type="text/javascript" >
    $("#editUserButton").click(function () {
        var datalist = new Array();
        var data_post='function=globalAccountInfo_function';
      $("#ID_UNIQUE_xyz123 td input").each(function(){
    		//-----		CHECKBOX
			if($(this).attr('type')=='checkbox' ){
				if($(this).attr('checked')){
					var value = $(this).attr("value");
       				var key = $(this).attr("name");
				}
			}
			//-----		RADIO
			if($(this).attr('type')=='radio' ){
				//alert($(this).attr('checked'));
				if($(this).attr('checked')){
					var value = $(this).attr("value");
       				var key = $(this).attr("name");
				}
			}
			//-----		TEXT INPUT
			if($(this).attr('type')=='text'){
		    	var value = $(this).attr("value");
       			var key = $(this).attr("name");
			}
        data_post +='&'+key+'='+value;
      }); 
     	var TYPE="POST";
		var URL =BASE_URL+"globalsettings/account/account_settings/";
		var DATA=data_post;
		$.ajax({
				type:TYPE,
				url:URL,
				data:DATA,
				success:function(returnData)
				{
				
				//alert(returnData);
				$('#ajax_globalUserInfo').html(returnData);
				},
				error:function()
				{
				alert("check controller path");
				}
			});
    });
</script>
