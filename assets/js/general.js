$(document).ready(function(){
	$('.tooltip-actions').tooltip({
	    template: '<div class="tooltip"><div class="bg-teal"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div></div>'
	});
});




function disable(id, moduleName)
{
	swal({
        title: "Are you sure?",
        text: "",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, disable it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	$.ajax({
			url: base_url + moduleName + '/disable/' + id,
			dataType: 'json',
			success: function(data){
				if(data.success) {
					datatable();
				}
				swal({
	                title: data.message,
	                confirmButtonColor: "#2196F3"
	            });

			}
		});
    });
}

function enable(id, moduleName)
{
	swal({
        title: "Are you sure?",
        text: "",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, enable it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	$.ajax({
			url: base_url + moduleName + '/enable/' + id,
			dataType: 'json',
			success: function(data){
				if(data.success) {
					datatable();
				}
				swal({
	                title: data.message,
	                confirmButtonColor: "#2196F3"
	            });

			}
		});
    });
}


function disableUsers(id, moduleName, functionName)
{
	swal({
        title: "Disable",
        text: "Are you sure you want to disable?",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, disable it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	$.ajax({
			url: base_url + moduleName + '/disableUser/' + id +'/' + functionName,
			dataType: 'json',
			success: function(data){
				if(data.success) {
					datatable();
				}
				swal({
                    title: "Disabled!",
                    text: data.message,
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });

			}
		});
    });
}

function enableUsers(id, moduleName, functionName)
{
	swal({
        title: "Enable",
        text: "Are you sure you want to enable?",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, enable it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	$.ajax({
			url: base_url + moduleName + '/enabledUser/' + id +'/' + functionName,
			dataType: 'json',
			success: function(data){
				if(data.success) {
					datatable();
				}
				swal({
                    title: "Enabled!",
                    text: data.message,
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });

			}
		});
    });
}

function deleteUsers(id, moduleName, functionName)
{
	swal({
        title: "Delete",
        text: "Are you sure you want to delete?",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	$.ajax({
			url: base_url + moduleName + '/deleteUser/' + id +'/' + functionName,
			dataType: 'json',
			success: function(data){
				if(data.success) {
					datatable();
				}
				swal({
                    title: "Deleted!",
                    text: data.message,
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });

			}
		});
    });
}

function deleteData(id, moduleName)
{
	swal({
        title: "Are you sure?",
        text: "This operation cannot be undone. Would you like to proceed?",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	$.ajax({
			url: base_url + moduleName + '/delete/' + id,
			dataType: 'json',
			success: function(data){
				if(data.success) {
					datatable();
				}
				swal({
                    title: "Deleted!",
                    text: data.message,
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });

			}
		});
    });
}

function edit(id, module)
{
	window.location.href= base_url + module + '/edit/' + id;
}


function notif(title, text, className) 
{
	new PNotify({
        title: title,
        text: text,
        addclass: className
    });
}

function approve(id, field)
{
	swal({
        title: "Are you sure you want to approve this job request?",
        text: "",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, approve it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	var btn = $('.btn-approve');
		$.ajax({
			url: base_url + 'general/approve/' + id + '/' + field,
			dataType: 'json',
			success: function(data) {
				btn.button('reset');
				swal({
	                title: data.message,
	                confirmButtonColor: "#2196F3"
	            });
				if(data.success) {
					notif('SUCCESS', data.message, 'bg-success');
					setTimeout(function(){ window.location = base_url + 'dashboard'; }, 2000);
				} else {
					notif('ERROR', data.message, 'bg-danger');
				}
			}, beforeSend: function() {
				btn.button('loading');
			}
		});
    });

}

function reject(id, field)
{
	swal({
        title: "Are you sure you want to reject this job request?",
        text: "",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, reject it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
		var btn = $('.btn-reject');
		var reason_reject = $('#reason_reject').val();
		$.ajax({
			url: base_url + 'general/reject/' + id + '/' + field,
			dataType: 'json',
			type: 'post',
			data: {'reason_reject' : reason_reject},
			success: function(data) {
				btn.button('reset');
				swal({
	                title: data.message,
	                confirmButtonColor: "#2196F3"
	            });
				if(data.success) {
					notif('SUCCESS', data.message, 'bg-success');
					setTimeout(function(){ window.location = base_url + 'dashboard'; }, 2000);
				} else {
					notif('ERROR', data.message, 'bg-danger');
				}
			}, beforeSend: function() {
				btn.button('loading');
			}
		});
    });

}

function reject_box(id, field)
{
	$('#tbl_reject').removeClass('hide');
	$('.btn_action').addClass('hide');
}

function closeReject()
{
	$('#tbl_reject').addClass('hide');
	$('.btn_action').removeClass('hide');
}

function send_back_box(id, field)
{
	$('#tbl_sendback').removeClass('hide');
	$('.btn_action').addClass('hide');
}

function closeSendBack()
{
	$('#tbl_sendback').addClass('hide');
	$('.btn_action').removeClass('hide');
}

function send_back(id, field)
{
	swal({
        title: "Are you sure you want to send back this job request?",
        text: "",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, send back",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	var btn = $('.btn-sendback');
		var reason_sendback = $('#reason_sendback').val();
		$.ajax({
			url: base_url + 'general/sendback/' + id + '/' + field,
			dataType: 'json',
			type: 'post',
			data: {'reason_sendback' : reason_sendback},
			success: function(data) {
				btn.button('reset');
				swal({
	                title: data.message,
	                confirmButtonColor: "#2196F3"
	            });
				if(data.success) {
					notif('SUCCESS', data.message, 'bg-success');
					setTimeout(function(){ window.location = base_url + 'dashboard'; }, 2000);
				} else {
					notif('ERROR', data.message, 'bg-danger');
				}
			}, beforeSend: function() {
				btn.button('loading');
			}
		});
    });

}



function approve_job_offer(id, field)
{
	swal({
        title: "Are you sure you want to approve this job offer?",
        text: "",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, approve it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	var btn = $('.btn-approve-jo');
		$.ajax({
			url: base_url + 'general/approve_offer/' + id + '/' + field,
			dataType: 'json',
			success: function(data) {
				btn.button('reset');
				swal({
	                title: data.message,
	                confirmButtonColor: "#2196F3"
	            });
				if(data.success) {
					notif('SUCCESS', data.message, 'bg-success');
					setTimeout(function(){ window.location = base_url + 'dashboard'; }, 2000);
				} else {
					notif('ERROR', data.message, 'bg-danger');
				}
			}, beforeSend: function() {
				btn.button('loading');
			}
		});
    });

}

function reject_box_jo(id, field)
{
	$('#tbl_reject').removeClass('hide');
	$('.btn_action').addClass('hide');
}

function closeReject_jo()
{
	$('#tbl_reject').addClass('hide');
	$('.btn_action').removeClass('hide');
}

function reject_jo(id, field)
{
	swal({
        title: "Are you sure you want to reject this job offer?",
        text: "",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, reject it!",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
		var btn = $('.btn-reject');
		var reason_reject = $('#reason_reject_jo').val();
		$.ajax({
			url: base_url + 'general/reject_jo/' + id + '/' + field,
			dataType: 'json',
			type: 'post',
			data: {'reason_reject' : reason_reject},
			success: function(data) {
				btn.button('reset');
				swal({
	                title: data.message,
	                confirmButtonColor: "#2196F3"
	            });
				if(data.success) {
					notif('SUCCESS', data.message, 'bg-success');
					setTimeout(function(){ window.location = base_url + 'dashboard'; }, 2000);
				} else {
					notif('ERROR', data.message, 'bg-danger');
				}
			}, beforeSend: function() {
				btn.button('loading');
			}
		});
    });

}

function send_back_box_jo(id, field)
{
	$('#tbl_sendback_jo').removeClass('hide');
	$('.btn_action').addClass('hide');
}

function closeSendBack_jo()
{
	$('#tbl_sendback_jo').addClass('hide');
	$('.btn_action').removeClass('hide');
}

function send_back_jo(id, field)
{
	swal({
        title: "Are you sure you want to send back this job offer?",
        text: "",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonColor: "#D32F2F",
        confirmButtonText: "Yes, send back",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true
    },
    function() {
    	var btn = $('.btn-sendback');
		var reason_sendback = $('#reason_sendback_jo').val();
		$.ajax({
			url: base_url + 'general/sendback_jo/' + id + '/' + field,
			dataType: 'json',
			type: 'post',
			data: {'reason_sendback' : reason_sendback},
			success: function(data) {
				btn.button('reset');
				swal({
	                title: data.message,
	                confirmButtonColor: "#2196F3"
	            });
				if(data.success) {
					notif('SUCCESS', data.message, 'bg-success');
					setTimeout(function(){ window.location = base_url + 'dashboard'; }, 2000);
				} else {
					notif('ERROR', data.message, 'bg-danger');
				}
			}, beforeSend: function() {
				btn.button('loading');
			}
		});
    });

}