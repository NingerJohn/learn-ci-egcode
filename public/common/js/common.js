var common = {}

/**
 * jquery ajax请求封装
 * 
 * @author NJ
 * @param  {string} url      请求的url地址
 * @param  {mixed} data     提交的数据
 * @param  {string} type     post or get 默认post
 * @param  {string} dataType 服务器返回的数据格式，默认json
 * @return {mixed}           服务器返回的数据
 * 
 */
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

