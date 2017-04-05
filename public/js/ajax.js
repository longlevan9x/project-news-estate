function handle_ajax(Url, Type, param) {
	data1 = '';
	$.each(param, function(item, index) {
		 // data1 += (data1.length == 0) ? "{ '" + index[0] + "' : '" + index[1] : "', '" + index[0] + "' : '" + index[1] + "'";
		 data1 += (data1.length == 0) ? '&' + index[0] + '=' + index[1] : '&' + index[0] + '=' + index[1];
	});
	$.ajax({
		url: Url,
		type: Type,
		data: data1,
		success: function(res) {
			if (res.length > 0) {
				return res;
			}
			else
			{
				return false;
			}
		}
	});
}
