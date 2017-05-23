// JavaScript Document
function sendmail() {
	event.preventDefault();
	if($('#email_to').val()!=''){
	$.ajax({
						url: "consulting/content/email.php",
						type: "POST",
						data: {email_body:$('#email_to').val()},
						dataType: 'json',
						beforeSend: function(){
						$('#sendmailLoader').html('<input name="" type="image" src="images/ajax-loader.gif" />')
			},	
						success: function(data){	
						//$('#ViewNotesloader').empty();
						if(data.success!=false){
							$('#sendmailLoader').html('Mail Sent Successfully.');
						}else{
							$('#sendmailLoader').html('Unable to Send Mail Successfully.');
							}
						},
						failure: function(errMsg) {
						alert(errMsg);
					}
	});
	}else{
		$('#VemailTo').html('*Please enter email address');
		}
	
}
function preview() {
	$.ajax({
						url: "consulting/content/preview.php",
						type: "POST",
						data: {email_body:""},
						dataType: 'json',
						beforeSend: function(){
						//$('#ViewNotesloader').html('<input name="" type="image" src="images/ajax-loader.gif" />')
			},	
						success: function(data){	
								//$('#ViewNotesloader').empty();
							/*if(data.success!=false){
								
							}*/
							$('#preview').html(data.preview);
							$('#subject').html(data.subject);
							$('#cc').html(data.cc);
							//console.log(data.preview);
						},
						failure: function(errMsg) {
						alert(errMsg);
					}
	});
	
}
function ecopysendmail() {
	event.preventDefault();
	if($('#ecopyemail_to').val()!=''){
	$.ajax({
						url: "reports/report_data/tcpdf/reports_pdf/ecopyemail.php",
						type: "POST",
						data: $("#print_report").serialize(),
						dataType: 'json',
						beforeSend: function(){
						$('#ecopyLoader').html('<input name="" type="image" src="images/ajax-loader.gif" />');
						$('#ecopyLoader').show();
						},	
						success: function(data){	
						console.log(data);
								//$('#ViewNotesloader').empty();
						if(data.success==false){
						$('#ecopyLoader').html('Unable to Send Mail Successfully.');
						}else{
							$('#ecopyLoader').html('Mail Sent Successfully.');
							}
						},
						failure: function(errMsg) {
						alert(errMsg);
					}
	});
	}else{
		$('#Vecopy').html('*Please enter email address');
		}
	
}
function ecopypreview() {
	$.ajax({
						url: "Reports/ecopypreview.php",
						type: "POST",
						data: {ecopyemail_body:""},
						dataType: 'json',
						beforeSend: function(){
						//$('#ViewNotesloader').html('<input name="" type="image" src="images/ajax-loader.gif" />')
			},	
						success: function(data){	
								//$('#ViewNotesloader').empty();
							/*if(data.success!=false){
								
							}*/
							$('#ecopypreview').html(data.ecopypreview);
							$('#subject').html(data.subject);
							$('#cc').html(data.cc);
							//console.log(data.preview);
						},
						failure: function(errMsg) {
						alert(errMsg);
					}
	});
	
}
function mybutton()
{
	alert("");
}
