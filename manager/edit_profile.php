<?php
session_start();
include('connection/config.php');
$no = $_SESSION['no'];
$sql = "SELECT * FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$image_src2 = $row['image'];

$sqlProfile = "SELECT personal_info.id FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$sql_query = "SELECT * FROM experience, login  WHERE  login.no=experience.no AND login.no = '$no' AND experience.no='$no'";;
$resultView = mysqli_query($db, $sql_query);
$rowView = mysqli_fetch_array($resultView);

 $sql_res = "SELECT no, GROUP_CONCAT(emp_name SEPARATOR ', ')";
 $sql_res .= " AS emp_names FROM experience GROUP BY no";
$result_sql = mysqli_query($db,$sql_res);

//SELECT no count(*) as 'nos' FROM experiecne where no='$no' group by no

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
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  


  <!-- Google Font -->
  <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
       
<body class="hold-transition skin-yellow layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar">
      <!-- Sidebar toggle button-->
     
             <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
	  <li class="home-menu">
		  <a href="main.php">
              <i class="fa fa-home fa-fw"></i>
            </a>
		  </li>
           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <?php if ($row['image'] == ''){
			   echo "<img class='user-image' alt='User profile picture' id='blah1' src='assets/img/user.png' width='125' height='125'/>";}
               else{
			   echo "<img class='user-image' alt='User profile picture' id='blah1' src='uploads/".$row['image']."' width='125' height='125'/>";}?>
              <span class="hidden-xs"><?php echo $row['name']; ?></span>
            </a>
			<ul class="dropdown-menu">
			 <!-- User image -->
              <li class="user-header">
				<?php if ($row['image'] == ''){
			   echo "<img class='img-circle' alt='User profile picture' id='blah1' src='assets/img/user.png' width='125' height='125'/>";}
               else{
			   echo "<img class='img-circle' alt='User profile picture' id='blah1' src='uploads/".$row['image']."' width='125' height='125'/>";}?>
         
                <p>
                  <span class="hidden-xs"><?php echo $row['name']; ?></span>
                  <!--<small>Toris Sdn.Bhd</small>-->
                </p>
              </li>
			   <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="profile_details.php?id=<?php echo $rowProfile['id']; ?>" class="text-center">Profile</a>
                  </div>
                  <!--<div class="col-xs-4 text-center">
                    <a href="company_details.html">Syarikat</a>
                  </div>-->
                  <div class="col-xs-6 text-center">
                   <a href="logout.php" class="text-center">Sign Out</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
			</ul>
		</li>
          
        </ul>
      </div>
    </nav>
  </header>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header col-md-10 col-md-offset-1">
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>-->
    </section>
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
	   <div class="col-md-10 col-md-offset-1">
	   <div class="box box-warning">
            <div class="box-header with-border ">
              <h3 class="box-title">Profile</h3>
            </div>
			<form id="fileupload" class="form-horizontal" action="update_personal.php?id=<?php echo $rowProfile['id']; ?>" method="POST" enctype="multipart/form-data">
            		<!-- Text input-->
                    <div class="form-group">
                                          <label class="col-sm-4 control-label" for="exampleInputFile"></label>
                                        
                                        </div>
                                 <div class="form-group">
                                          <label class="col-sm-4 control-label" for="exampleInputFile"></label>
                                        <div class="col-sm-5">
                                            <?php 
											echo "<img class='profile-user img-circle' alt='User profile picture' id='blah' src='uploads/".$row['image']."' width='300px' height='300'/>";
                                            echo "<div class='col-sm-offset-2 col-sm-10'>";
                                            echo "<input class='input-group' type='file' name='image' onchange='readURL(this);' />";
                                                ?>
                                        </div>
                                        </div>
                                        </div>
                               
							   <div class="form-group">
					  				<label class="col-sm-2  control-label">Name</label>
									  <div class="col-sm-8">
									   <input id="name" name="name" type="text" class="form-control input-sm" value="<?php echo $row['name']; ?>">
									  </div>
								</div>

								<div class="form-group">
					  				<label class="col-sm-2  control-label">NRIC/Passport</label>
									  <div class="col-sm-8">
									   <input id="nric" name="nric" type="text" class="form-control input-sm" value="<?php echo $row['nric']; ?>">
									  </div>
								</div>
								
								<div class="form-group">
					  				<label class="col-sm-2  control-label">Gender</label>
									  <div class="col-sm-8">
									  	<select id="gender" name="gender" type="text" class="form-control input-sm" >
									  		<option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option selected>
									  		<option value="Male">Male</option>
									  		<option value="Female">Female</option>
									  	</select>
									  </div>
								</div>

								<div class="form-group">
					  				<label class="col-sm-2  control-label">Race</label>
									  <div class="col-sm-8">
									  	<select id="race" name="race" type="text" class="form-control input-sm" >
									  		<option value="<?php echo $row['race']; ?>"><?php echo $row['race']; ?></option selected>
									  		<option value="Malay">Malay</option>
									  		<option value="Chinese">Chinese</option>
									  		<option value="Indian">Indian</option>
									  		<option value="Others">Others</option>
									  	</select>
									 </div>
								</div>							

								<div class="form-group">
					  				<label class="col-sm-2 control-label">Nationality</label>
									  <div class="col-sm-8">
									  	<select id="nationality" name="nationality" type="text" class="form-control input-sm" >
									  		<option value="<?php echo $row['nationality']; ?>"><?php echo $row['nationality']; ?></option selected>
									  		<option value="Malaysian">Malaysian</option>
									  		<option value="Others">Others</option>
									  	</select>
									 </div>
								</div>	
								
								<div class="form-group">
					  				<label class="col-sm-2 control-label">Category</label>
									  <div class="col-sm-8">
									  <select id="preference" name="preference" type="text" class="form-control input-sm" >
									  		 <option value="<?php echo $row['preference']; ?>"><?php echo $row['preference']; ?></option selected>
										  	 <option value="Engineer">Engineer</option>
								             <option value="Manager">Manager</option>
										   	 <option value="Operator">Operator</option>
											 <option value="Technical">Technical</option>
									  	</select>
									  </div>
								</div>		
								
								<div class="form-group">
					  				<label class="col-sm-2  control-label">Address</label>
									  <div class="col-sm-8">
									   <input id="address" name="address" type="text" class="form-control input-sm" value="<?php echo $row['address']; ?>">
									  </div>
								</div>

								<div class="form-group">
					  				<label class="col-sm-2 control-label">Phone Number</label>
									  <div class="col-sm-3">
									  <input id="notel" placeholder="Masukkan No.Telefon" name="phone" type="text" class="form-control input-sm" value="<?php echo $row['phone']; ?>">
									  </div>
								</div>
                             

								<div class="form-group">
					  				<label class="col-sm-2 control-label">Email</label>
									  <div class="col-sm-3">
									  <input id="email" name="email" type="text" class="form-control input-sm" value="<?php echo $row['email']; ?>">
									  </div>
                                        </div>
										

                <input type="hidden" name="id" id="id" value="<?php echo $rowProfile['id']; ?>">  
                <input type="hidden" name="no" id="no" value="<?php echo $row['no']; ?>">  
                                    
								
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button name="submit" type="submit" class="btn btn-warning pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
			</div> <!--box -->
      </div>    <!--col-md-12 -->
	  </div>      <!-- row -->
	  
    	<!------------------------------------------------------------------------------------------------------------------------------------->
       <!-- Info boxes -->
      <div class="row">
	   <div class="col-md-10 col-md-offset-1">
	   <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Job</h3>
            </div>
			<form id="fileupload" class="form-horizontal" action="add_experience.php" method="POST">
									<div class="form-group">
                                          <label class="col-sm-4 control-label" for="exampleInputFile"></label>
                                    </div>
							   <div class="form-group">
					  				<label class="col-sm-2  control-label">Position</label>
									  <div class="col-sm-8">
									   <input id="act_name" name="act_name" type="text" class="form-control input-sm" placeholder="Enter Job Position">
									  </div>
								</div>

								<div class="form-group">
					  				<label class="col-sm-2  control-label">Company Name</label>
									  <div class="col-sm-8">
									   <input id="venue" name="venue" type="text" class="form-control input-sm" placeholder="Enter Company Name">
									  </div>
								</div>

									
								<div class="form-group">
					  				<label class="col-sm-2  control-label">Start Date</label>
									 <div class="col-sm-8">
									  <div class="input-group date" data-provide="datetimepicker9" id='datetimepicker9'>
									  <input id="start_date"
										   name="start_date"
										   class="wizard-field form-control"
										   type="text" data-provide="datepicker" data-date-format="MM yyyy" data-date-start-view="year" data-date-min-view-mode="months" 
										   data-date-autoclose="true" placeholder="Enter Date Join"/>

									  	<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar">
													</span>
												</span>
										</div>
									 </div>
								</div>								
								
				<div class="form-group">
					  	<label class="col-sm-2 control-label"></label>  
							<div class="col-sm-3">
							<button type="submit" class="col-sm-6 btn btn-warning">Submit</button>
							</div>
                </div>				  
                <input type="hidden" name="no" id="no" value="<?php echo $row['no']; ?>">              
                <input class ='glyphicon glyphicon-trash' type="hidden" name="deletes" id="deletes" value="Delete">              
								
           
                <div class="box-footer">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Position</th>
                  <th>Company Name</th>
                  <th>Start Date</th>
				  <th>Change</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$sqlv= "SELECT * FROM experience WHERE no = '".$_SESSION['no']."' ";

				//$sqlv="select * from experience group by no having count(no) >1";
				$result3 = mysqli_query($db,$sqlv);
				$rowsView = mysqli_fetch_array($result3);
				$num = mysqli_num_rows($result3);
		        $pfilearray=array();
				if($result3 = mysqli_query($db,$sqlv)){
				 if(mysqli_num_rows($result3) > 0){
				//if($num > 0){
				while(($rs=mysqli_fetch_assoc($result3)))
				{
			
				echo "<tr><td>"; echo $rs['act_name']; echo"</td>";
                echo "<td>"; echo $rs['venue']; echo "</td>";
				echo "<td>"; echo $rs['start_date']; echo"</td>";
				echo "<td><a href='delete_experience.php?exp_id=".$rs['id']."'><i class='fa fa-trash'></i></a></td></tr>";     
				//echo "<td><a href=\"delete_experience.php?exp_id=".$rs['no']."\">"; echo $rs['deletes']; echo"</a></td></tr>";
				//	$pfilearray[]=$rs['pos_name'].$rs['emp_name'].$rs['start_date'];
				 }}}
				//print_r($pfilearray);
				//print_r($pfilearray1);
				//}
				?>
			</tbody>
		</table>
			</div>
			</form>
			</div> <!--box -->
      </div>    <!--col-md-12 -->
	  </div>      <!-- row --> 
    	<!------------------------------------------------------------------------------------------------------------------------------------->
       <!-- Info boxes -->
      <div class="row">
	   <div class="col-md-10 col-md-offset-1">
	   <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Education Backgorund</h3>
            </div>
			<form id="fileupload" class="form-horizontal" action="add_edu.php" method="POST">
									<div class="form-group">
                                          <label class="col-sm-4 control-label" for="exampleInputFile"></label>
                                    </div>
							   <div class="form-group">
					  				<label class="col-sm-2  control-label">Program</label>
									  <div class="col-sm-8">
									   <input id="course" name="course" type="text" class="form-control input-sm" placeholder="Enter Program">
									  </div>
								</div>

								<div class="form-group">
					  				<label class="col-sm-2  control-label">University/College</label>
									  <div class="col-sm-8">
									   <input id="university" name="university" type="text" class="form-control input-sm" placeholder="Enter University/College">
									  </div>
								</div>

									
								<div class="form-group">
					  				<label class="col-sm-2  control-label">Graduation Date</label>
									 <div class="col-sm-8">
									  <div class="input-group date" data-provide="datetimepicker1" id='datetimepicker1'>
									  <input id="grad"
										   name="grad"
										   class="wizard-field form-control"
										   type="text" data-provide="datepicker"  placeholder="Enter Graduation Date"/>
     
									  	<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar">
													</span>
												</span>
										</div>
									 </div>
								</div>								
								
				        <div class="form-group">
					  				<label class="col-sm-2 control-label"></label>  
									  <div class="col-sm-3">
										<button type="submit" class="col-sm-6 btn btn-warning">Submit</button>
									  </div>
                                        </div>				  
                <input type="hidden" name="no" id="no" value="<?php echo $row['no']; ?>">              
                <input class ='glyphicon glyphicon-trash' type="hidden" name="deletes" id="deletes" value="Delete">              
								
           
                <div class="box-footer">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>School</th>
                  <th>Date of Birth</th>
				  <th>Change</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$sqlv= "SELECT * FROM education WHERE no = '".$_SESSION['no']."' ";

				//$sqlv="select * from experience group by no having count(no) >1";
				$result3 = mysqli_query($db,$sqlv);
				$rowsView = mysqli_fetch_array($result3);
				$num = mysqli_num_rows($result3);
		        $pfilearray=array();
				if($result3 = mysqli_query($db,$sqlv)){
				 if(mysqli_num_rows($result3) > 0){
				//if($num > 0){
				while(($rs=mysqli_fetch_assoc($result3)))
				{
			
				echo "<tr><td>"; echo $rs['course']; echo"</td>";
                echo "<td>"; echo $rs['university']; echo "</td>";
				echo "<td>"; echo $rs['grad']; echo"</td>";
				echo "<td><a href='delete_edu.php?edu_id=".$rs['no']."'><i class='fa fa-trash'></i></a></td></tr>";     
				 }}}
				//print_r($pfilearray);
				//print_r($pfilearray1);
				//}
				?>
			</tbody>
		</table>
			</div>
			</form>
			</div> <!--box -->
      </div>    <!--col-md-12 -->
	  </div>      <!-- row --> 	 
	 
	 
	 
	 

    </section>
</div>
</div>
</body>
</html>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>

<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>


<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
   //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(300);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

