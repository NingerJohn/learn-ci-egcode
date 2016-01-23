var common = {}

common.ajaxRequest = function(url, data, type, dataType){
	// 
	var data = data ? data : $('form');
	var type = type ? type : 'post';
	var dataType = dataType ? dataType : 'json';
	if(!url){
		return false;
	}
	var finRes;
	$.ajax({
		type:type,
		url:url,
		data:data,
		dataType:dataType,
		async:false,
		success:function (result) {
			 /* body... */
			 finRes = result;
		}
	})
	return finRes;
}

