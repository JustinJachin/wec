function AjaxGet(target,data){
	$.ajax({
		type:'get',
		url:target,
		data:data,
    	dataType:'json',
		success:function(data){
			if(data.status==1){
				// window.location.reload();
				$(".table").load(location.href+" .table");
				toastr.success('', data.msg);
				// window.location.reload();
			}else{
				toastr.error('', data.msg);
			}
			
			// alert(data.msg);
		},
		error(msg){
			toastr.error('请联系管理员', '系统错误');
		}
	})
}
function AjaxPost(target,data){
	$.ajax({
		type:'post',
		url:target,
		data:data,
    	dataType:'json',
		success:function(data){
			if(data.status==1){
				// window.location.reload();
				$(".table").load(location.href+" .table");
				toastr.success('', data.msg);
				// window.location.reload();
			}else{
				toastr.error('', data.msg);
			}
			
			// alert(data.msg);
		},
		error(msg){
			toastr.error('请联系管理员', '系统错误');
		}
	})
}

