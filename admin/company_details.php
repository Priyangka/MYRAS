<?php
session_start();
include('../connection/config.php');
$no = $_SESSION['no'];
$sql = "SELECT * FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$image_src2 = $row['image'];
$idd = $row['level'];

$sqlProfile = "SELECT personal_info.no FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$id=$_GET['vacancy_id']; 

$sql_info= "SELECT * FROM company WHERE  id='".$id."'";
$result_info = mysqli_query($db,$sql_info);
$rowsInfo = mysqli_fetch_array($result_info);


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
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script type="text/javascript">
function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var dvtext = document.getElementById("dvtext");
        dvtext.style.display = chkYes.checked ? "block" : "none";
    }
$(document).ready(function(){
    $("#myNav").affix({
        offset: { 
            top: $(".header").outerHeight(true)
        }
    });
});
      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

		$(function () {
				$('#datetimepicker9').datetimepicker({
				
					todayBtn: true
						});
						});
						
</script>
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
  #adds {color:orange;}
  
.dl-horizontal dt { text-align: left; }
.pagination > li > a, .pagination > li > span { color: grey; // use your own color here }
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover { background-color: orange; border-color: orange; }
</style>
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
.dl-horizontal dt { text-align: left; }
.pagination > li > a, .pagination > li > span { color: grey; // use your own color here }
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover { background-color: orange; border-color: orange; }
</style>
<style>
.dl-horizontal dt { text-align: left; }
.navbar-brand {padding: 0px;}
.example2 .navbar-brand>img {padding: 7px 15px;}

.card {
	top:0;
    font-size: 1em;
    overflow: hidden;
    padding: 0;
    border: none;
    border-radius: .28571429rem;
    box-shadow: 0 1px 1px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
	background-color:white;
}

.card-block {
    font-size: 1em;
    position: relative;
    margin: 0;
    padding: 1em;
    border: none;
    border-top: 1px solid rgba(34, 36, 38, .1);
    box-shadow: none;
}

.card-img-top {
    display: block;
    width: 100%;
    height: auto;
	border:1px solid rgba(0, 0, 0, .05);
}

.card-title {
    font-size: 1.28571429em;
    font-weight: 700;
    line-height: 1.2857em;
	margin-left:0.6em;
	
}
.card-title1 {
    font-size: 1.28571429em;
    font-weight: 700;
    line-height: 1.2857em;
	
}

.card-text {
    clear: both;
    margin-top: .5em;
    color: rgba(0, 0, 0, .68);
	margin-left:1.0em;
	margin-right:1.0em;
	
}
.card-subtitle {
	margin-left:1.0em;
	margin-right:1.0em;
	
}
.card-link {
	margin-left:1.0em;
	margin-right:1.0em;
	
}

.card-footer {
    font-size: 1em;
    position: static;
    top: 0;
    left: 0;
    max-width: 100%;
    padding: .75em 1em;
    color: rgba(0, 0, 0, .4);
    border-top: 1px solid rgba(0, 0, 0, .05) !important;
    background: #fff;
}

.card-inverse .btn {
    border: 1px solid rgba(0, 0, 0, .05);
}
.div {
    width:300px;
    height:300px;    
    overflow:hidden;
}
.div img {
    min-width:100%;
}
</style>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">
 <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GCP</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>

  </header><aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <br/>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/img/user.png" class="img-circle" alt="User Image" height="50%" width="50%">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="../logout.php">
            <i class="fa fa-sign-out"></i> <span>Log Out</span>
          </a>
        </div>
      </div>
      <br/>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
		<li class="treeview">
          <a href="#">
              <i class="fa fa-list"></i> <span>Registered</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
		  <ul class="treeview-menu">
              <li><a href="user_list.php"><i class="fa fa-circle-o"></i>User</a></li>
              <li><a href="user_category.php"><i class="fa fa-circle-o"></i>User By Category</a></li>
              <li><a href="courses.php"><i class="fa fa-circle-o"></i>Courses</a></li>
            </ul> 
		</li>
		
          <li class="treeview">
            <a href="#">
              <i class="fa fa-line-chart"></i> <span>Report</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="info_list.php"><i class="fa fa-circle-o"></i>Catalog</a></li>
			  <li><a href="monthly_report.php"><i class="fa fa-circle-o"></i>Details</a></li>
            </ul>           
        </li>
		
		<li class="treeview">
          <a href="#">
              <i class="fa  fa-briefcase"></i> <span>Vacancy</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
		  <ul class="treeview-menu">
              <li><a href="vacancy_list.php"><i class="fa fa-circle-o"></i>Catalog</a></li>
			  <li><a href="company_list.php"><i class="fa fa-circle-o"></i>Company</a></li>
              <li><a href="registered_vacancy.php"><i class="fa fa-circle-o"></i>Registered</a></li>
              <li><a href="monthly_report_vacancy.php"><i class="fa fa-circle-o"></i>Details</a></li>
            </ul> 
		</li>
		
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <br/>
      <h1>
        Vacancy
      </h1>

    </section>

    <section class="content">
      <!-- Info boxes -->
      <div class="row">
	  <div class="col-xs-12">

           <div class="card sticky-top" >
		  <div class="col-md-7 ">
			<div class="card-body"><h5 class="card-title"> <?php  if ($rowsInfo['title']!=''){echo $rowsInfo['title'];} ?></h5>
			</div>
			<form class="form-horizontal" action="edit_company_info.php" method="POST" enctype="multipart/form-data">

			<?php
				$str = $rowsInfo['description'];
				$strArray = explode('.', $str);
				$str1 = $strArray[0] . '. ' . $strArray[1] . '.'. $strArray[2] . '.';
				$str2 = $strArray[2] . '.';
			    echo'</a><div class="card-body">';
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
					echo"<p class='card-text text-justify'>";
					echo $rowsInfo['description'];
                    echo "
                    </li>
				    </ul>"; 
			       echo '</div>';	
				
				  
			?>
		  </div>
		   <div class="col-md-5 ">
		   		<?php
			    echo'<div class="card-body">';
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
				//echo $row['level'];
				if($rowsInfo['company_banner']!=''){
	            echo "<img class='img-thumbnail img-responsive center-block' alt='Program Banner' id='blah' src='../manager/company/".$rowsInfo['company_banner']."' style='width:500px; height:300px;object-fit: cover;''/><p></p>";}
				/*if ($rowsInfo['manager']!= $row['name']) {
				echo "<a href=\"add_company_profile.php\"   class='col-xs-3 col-md-6 col-md-push-3 btn btn-warning card-link center'>Add Company Profile</a>";
				}
				elseif ($rowsInfo['manager']== $row['name']|| $row['level']=='admin') {
				echo "<a href=\"edit_company_profile.php?info_id=".$rowsInfo['id']."\"   class='col-xs-3 col-md-6 col-md-push-3 btn btn-warning card-link center'>Edit Company Profile</a>";
				}*/				
				//echo'<button type="submit" class="col-sm-8 col-md-offset-2 btn btn-warning center">Edit Information</button>';
                    echo "
                    </li>
				    </ul>"; 
			       echo '</div>';	
			?>
		  </div>
		  </div>
		  <br/>
			</div> <!--box -->
				<input type="hidden" name="no" id="no" value="<?php echo $no; ?>">
			</div> <!--box -->
			<div class="row" >
		    <div class="col-xs-12">
			 <div class="card sticky-top" >
			
			<form class="form-horizontal" action="edit_company_info.php" method="POST" enctype="multipart/form-data">
			<?php
			  			
				echo'<div class="card-body">';
				echo '<h6 class="card-title">Company Snapshot</h6>';  
				echo'<ul class="products-list product-list-in-box"><li class="item">';
				echo'<div class="col-md-2 pull-left"><b>Industry</b></div>';
				echo'<div class="col-md-4">'.$rowsInfo['ssm_no'].'</div>';			
				echo'<div class="col-md-2 pull-left"><b>SSM No</b></div>';
				echo'<div class="col-md-4">'.$rowsInfo['ssm_no'].'</div><br/><br/>';
				echo'<div class="col-md-2 pull-left"><b>Working Days</b></div>';
				echo'<div class="col-md-4">'.$rowsInfo['days'].'</div>';
				echo'<div class="col-md-2 pull-left"><b>Working Days</b></div>';
				echo'<div class="col-md-4">'.$rowsInfo['time_from'].' to '.$rowsInfo['time_to'].'</div><br/><br/>';
			    echo'<div class="col-md-2 pull-left"><b>Company Size</b></div>';
				echo'<div class="col-md-4">'.$rowsInfo['size'].' Employees</div>';
				echo'<div class="col-md-2 pull-left"><b>Benefits</b></div>';
				echo'<div class="col-md-4">'.$rowsInfo['benefits'].'</div><br/><br/>';
				echo'<div class="col-md-2 pull-left"><b>Address</b></div>';
				echo'<div class="col-md-4 text-justify">'.$rowsInfo['comp_address'].'</div>';
			
                    echo "
                    </li>
				    </ul>"; 
			    echo '</div>';
			
			?>
		 
		 
		  </div>
			</div>
			</div>

                 
			  
              </div>
              </div>
              <!-- /.box-footer -->
            </form>
			</div> <!--box -->
      </div>    <!--col-md-12 -->
	
	  </div>  
      </div>    <!--col-md-12 -->
	  </div> 
</form>	  <!-- row --> 
    </section>
</div>
</div>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">
jQuery(function ($) {
        $("#exportButton").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#exportTable",
                schema: {
                    type: "table",
                    fields: {
                                              
						Name: { type: String },
						Phone: { type: String },
                        Email: { type: String },
                       
						
                    }
                }
            });

            // when parsing is done, export the data to Excel
            dataSource.read().then(function (data) {
                new shield.exp.OOXMLWorkbook({
                    author: "PrepBootstrap",
                    worksheets: [
                        {
                            name: "PrepBootstrap Table",
                            rows: [
                                {
                                    cells: [
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Name"
                                        },
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Phone"
                                        },
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Email"
                                        },
										
										
		
										
                                    ]
                                }
                            ].concat($.map(data, function(item) {
                                return {
                                    cells: [
                                                                         
										{ type: String, value: item.Name },
										{ type: String, value: item.Phone },
                                        { type: String, value: item.Email },
                                      

                                    ]
                                };
                            }))
                        }
                    ]
                }).saveAs({
                    fileName: "List of Participants"
                });
            });
        });
    });
	</script>
</body>
</html>	
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->
<!-- you need to include the shieldui css and js assets in order for the components to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>
