<?php
session_start();
include('connection/config.php');
$no = $_SESSION['no'];
$sql = "SELECT * FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$image_src2 = $row['image'];
$name =$row['name'];

$sqlProfile = "SELECT personal_info.no FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$id=$_GET['info_id']; 
$sql_info= "SELECT * FROM vacancy WHERE  id='$id'";
$result_info1 = mysqli_query($db,$sql_info);
$rowsInfo1 = mysqli_fetch_array($result_info1);
$company_id = $rowsInfo1['company_id'];
$id1 = $rowsInfo1['id'];

$sql_info= "SELECT * FROM company WHERE  id='$company_id'";
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
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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
<body class="hold-transition skin-yellow layout-top-nav">
<div class="wrapper">

   <header class="main-header">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
      <li class="dropdown home-menu">
      <a href="main.php">
              <i class="fa fa-home fa-fw"></i>
            </a>
      </li>

       <li class="home-menu">
      <a href="course_main.php">
             <i class="fa fa-book fa-fw"> </i>Course
            </a>
      </li>
     <!--  <li class="dropdown network-menu">
      <a href="networks.html">
              <i class="fa fa-user-o fa-fw"></i>
            </a>
      </li>-->
  
          <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <?php if ($row['image'] == ''){
         echo "<img class='user-image' alt='User profile picture' id='blah' src='assets/img/user.png' width='125' height='125'/>";}
               else{
         echo "<img class='user-image' alt='User profile picture' id='blah' src='uploads/".$row['image']."' width='125' height='125'/>";}?>
              <span class="hidden-xs"><?php echo $row['name']; ?></span>
            </a>
      <ul class="dropdown-menu">
       <!-- User image -->
              <li class="user-header">
        <?php if ($row['image'] == ''){
         echo "<img class='img-circle' alt='User profile picture' id='blah' src='assets/img/user.png' width='125' height='125'/>";}
               else{
         echo "<img class='img-circle' alt='User profile picture' id='blah' src='uploads/".$row['image']."' width='125' height='125'/>";}?>
         
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
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>

    </nav>
  </header>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
       <!-- Info boxes -->
      <div class="row">
    
     <form class="form-horizontal" action="insert_vacancy_participant.php" method="POST" enctype="multipart/form-data">
    <div class="col-md-10 col-md-offset-1">
           <div class="card sticky-top" >
      <div class="col-md-7 ">
      <div class="card-body"><h5 class="card-title"> <?php  if ($rowsInfo['title']!=''){echo $rowsInfo['title'];} ?></h5>
      </div>

      <?php
        $str = $rowsInfo['description'];
        $strArray = explode('.', $str);
        if (!isset($strArray[0]))
        {
          $strArray[0]=null;
        }
        if (!isset($strArray[1]))
        {
          $strArray[1]=null;
        }
        if (!isset($strArray[2]))
        {
          $strArray[2]=null;
        }
       
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
        if($rowsInfo['company_banner']!=''){
              echo "<img class='img-thumbnail img-responsive center-block' alt='Program Banner' id='blah' src='manager/company/".$rowsInfo['company_banner']."' style='width:500px; height:300px;object-fit: cover;'/><p></p>";}
                if($rowsInfo['company_banner']==''){
              echo "<img class='img-thumbnail img-responsive center-block' alt='Program Banners' id='blah'  src='assets/img/company_2.png' style='width:500px; height:300px;object-fit: cover;'/><p></p>";}
        echo '<input type="hidden" name="name" id="name" class="form-control" value="'.$row['name'].'">';
        echo '<input type="hidden" name="phone" id="name" class="form-control" value="'.$row['phone'].'">';
        echo '<input type="hidden" name="email" id="email" class="form-control" value="'.$row['email'].'">';
        echo '<input type="hidden" name="no" id="no" class="form-control" value="'.$no.'">'; 
        echo '<input type="hidden" name="vacancy_id" id="vacancy_id" class="form-control" value="'.$rowsInfo1['id'].'">'; 
        echo '<input type="hidden" name="position" id="position" class="form-control" value="'.$rowsInfo1['position']. '">';

        $sql1="SELECT * FROM vacancy_participant WHERE name=$name";

//$tryrow = mysqli_fetch_array($try2);
     echo '<button type="submit" class="col-sm-8 col-md-offset-2 btn btn-warning">Apply Now</button>';

       
       

                
                    echo "
                    </li>
            </ul>"; 
             echo '</div>'; 
      ?>
      </div>
      </div>
      <br/>
      <div class="card sticky-top" >
      <div class="col-md-12 ">
      <div class="card-body"><h5 class="card-title"> <?php echo $rowsInfo1['position'].'&nbsp';?></h5>
      </div>

      <?php
          echo'</a><div class="card-body">';
        echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
          echo"<p class='card-text text-justify'>";
          echo $rowsInfo1['description'];
                    echo "</p>
                    </li>
            </ul>"; 
             echo '</div>'; 
           
      ?>
  
      <?php
              
        echo'<div class="card-body">';
        echo '<h6 class="card-title">Job Description</h6>';  
        echo'<ul class="products-list product-list-in-box"><li class="item">';
        echo'<div class="col-md-2 pull-left"><b>Salary</b></div>';
        echo'<div class="col-md-4">'.$rowsInfo1['salary'].'</div>';     
        echo'<div class="col-md-2 pull-left"><b>Experience</b></div>';
        echo'<div class="col-md-4">'.$rowsInfo1['experience'].'</div><br/><br/>';
        echo'<div class="col-md-2 pull-left"><b>Category</b></div>';
        echo'<div class="col-md-4">'.$rowsInfo1['category'].'</div>';
        echo'<div class="col-md-2 pull-left"><b>Closing Date</b></div>';
        echo'<div class="col-md-4">'.$rowsInfo1['date'].'</div><br/><br/><br/>';
          echo'<div class="col-md-2 pull-left"><b>Basic Skills</b></div>';
        echo'<div class="col-md-10">'.$rowsInfo1['skills'].' Employees</div><br/><br/><br/><br/>';
        echo'<div class="col-md-2 pull-left"><b>Additional Requirements</b></div>';
        echo'<div class="col-md-10">'.$rowsInfo1['description'].'</div><br/><br/>';
    
      
                    echo "
                    </li>
            </ul>"; 
          echo '</div><br/>';
        
      ?>
  
      </div>
      
      </div>
    </form>  
     
      <br/> 
      
       
          
      </div> <!--box -->
      </div>    <!--col-md-12 -->
            <!------------------------------------------------------------------------------------------------------------------------------------->

    <div class="row">
    <div class="col-md-10 col-md-offset-1">

      </div> <!--box -->
        <input type="hidden" name="no" id="no" value="<?php echo $no; ?>">
      </div> <!--box -->
      <div class="row" >
        <div class="col-md-10 col-md-offset-1">
       <div class="card sticky-top" >
      
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
      <br/>
        <!------------------------------------------------------------------------------------------------------------------------------------->
             <!-- Info boxes -->
     
        
              </div>
              <!-- /.box-footer -->
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
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src=".plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->

