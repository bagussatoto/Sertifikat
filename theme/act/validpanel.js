		$(document).ready(function() {
			$("#formlogin").submit(function() { 
				console.log("excute");
				clearconsole();
				var username = $("#lusername").val();
				var password = $("#lpassword").val();
				var req = $("#req").val();
				if(username == "" && password != ""){
					toastr['warning']("The username cannot be empty");
					return false;
				} 
				else if(username != "" && password == ""){
					toastr['warning']("Password cannot be empty");
					return false;
				}
				else if(username == "" && password == ""){
					toastr['warning']("Username and Password cannot be empty");
					return false;
				}
				var dataString = 'username='+ username
								+ '&password=' + password        
								+ '&req='	+	req ;				         
				$.ajax({
					type: "POST", 
					url: site_url+"panel/ceklogin",
					data: dataString,
					beforeSend: function() {
						$('.msg').html('<img src="theme/images/loader/loadingwhite.gif"> Cheking...');
					},
					success: function(data) 
					{
						if(data==0) 
						{
							clearconsole();
							$('.msg').html('');
							toastr['warning']("Sorry, your username or password is incorrect");
							return false;
						}else if(data==2){
							clearconsole();
							$('.msg').html('');
							toastr['warning']("Check your email to verify");
							return false;
						}else if(data==1){
							clearconsole();
							$('.msg').html('');
							window.location = site_url+"dashboard";
							activemenu();
						}
							
					}
				});
				return false;
				
			});
			
			$('#formregister').submit(function(e) {
				e.preventDefault();
					var a1 = $('#fullname').val();
					var a2 = $('#gender').val();
					var a3 = $('#email').val();
					var a4 = $('#mobilephone').val();
					var a5 = $("#username").val();
					var a6 = $("#password").val();
					var a7 = $("#repassword").val();
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					if(a1=='' || a2=='none' || a3=='' || a4=='' || a5=='' || a6=='' || a7==''){
						toastr['warning']("Make sure all fields are filled");
						return false;
					}else if(a6 != a7){
						toastr['warning']("Please repeat the password correctly");
						return false;
					}else if( !emailReg.test(a3) ){
						toastr['warning']("Enter the @ email format");
						return false;
					}else{
					$.ajax({
						url:site_url+"panel/create",
						method:'POST',
						data:new FormData(this),
						contentType:false,
						processData:false,
						chace:false,
						beforeSend: function() {
							$('.msg').html('<img src="theme/images/loader/loadingwhite.gif"> Cheking...');
						},
						success:function(data)
						{
							if(data!=0){
								toastr['success']("Successfully created an account, please check the validation in your email");
								$('#formregister')[0].reset();
								$('.msg').html('');
								$('#page-register').hide();
								$('#page-login').show();
							}else{
								toastr['warning']("This email has been registered");
								$('.msg').html('');
								return false;
							}
							
						},
						error: function(jqXHR, textStatus, errorThrown){ toastr['error']("Gagal memproses"); $('.msg').html(''); return false;}  
					});
					}
					
					

			});
		});