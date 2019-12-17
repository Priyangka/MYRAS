<?php
session_start();
include('../connection/config.php');
$username = $_SESSION['username'];
$no = $_SESSION['no'];
if(!isset($_SESSION['username']) || $_SESSION['username'] == " ")
{
       header("Location: ../index.php");
       die();
}

$sql = "SELECT * FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

$sqlProfile = "SELECT personal_info.id FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$sql_info= "SELECT * FROM vacancy WHERE  no='".$no."'";
$result_info = mysqli_query($db,$sql_info);
$rowsInfo = mysqli_fetch_array($result_info);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>GCP</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
<style>
.dl-horizontal dt { text-align: left; }
.pagination > li > a, .pagination > li > span { color: grey; // use your own color here }
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover { background-color: orange; border-color: orange; }
#adds {color: orange; }
</style>
	<body>						
<?php 

						if ($_POST['request']){
					
						$request = $_POST['request'];
				
						if ($_POST['request']=='Select Month'){
							
							echo '';
						}

											
						$sqlv = "SELECT * FROM vacancy WHERE no='$no'" ;
	
						$index=0;
						echo '	
						
						<button id="exportButton" type="button" class="btn btn-warning"><span class="fa fa-file-excel-o"></span> Export to Excel</button>	
						
						<div class="row">
						<div class="col-xs-12">						
						<div class="box-body">
						<table id="exportTable" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th>#</th> 
						  <th>Position</th>
						  <th>Category</th>
						  <th>Salary</th>
						  <th>Experience</th>
						  <th>Skills</th>
						  <th>Closing Date</th>
						  <th>Change</th>
						</tr>
						</thead>
						<tbody>';
						if($result3 = mysqli_query($db,$sqlv)){
						if(mysqli_num_rows($result3) > 0){
						while(($rs=mysqli_fetch_assoc($result3)))
						{
						$date = $rs['date'];
						$month = strtotime($date);
						$getMonth = date("m", $month);
						
						$date = $rs['date'];
						$year = strtotime($date);
						$getYear = date("Y", $year);
						
						if ($getMonth==$request || $getYear == $request){
						$index++;
						$id = $rs['id'];
						
						echo "<tr><td>"; echo $index; echo"</td>";
						echo "<td><a href='vacancy_details.php?vacancy_id=$id'>"; echo $rs['position']; echo"</td>";
						if($rs['category']=='Manager'){
                        echo "<td>";
                        echo "<span class='label label-danger'>";echo $rs['category']; echo"</span>";echo"</td>";}
						elseif($rs['category']=='Engineer'){
                        echo "<td>";
                        echo "<span class='label label-warning'>";echo $rs['category']; echo"</span>";echo"</td>";}
						elseif($rs['category']=='Technichian'){
                         echo "<td>";
                        echo "<span class='label label-success'>";echo $rs['category']; echo"</span>";echo"</td>";}
						elseif($rs['category']=='Supervisor'){
                        echo "<td>";
                        echo "<span class='label label-info'>";echo $rs['category']; echo"</span>";echo"</td>";}
						elseif($rs['category']=='Operator'){
                        echo "<td>";
                        echo "<span class='label label-danger'>";echo $rs['default']; echo"</span>";echo"</td>";}
						echo "<td>"; echo $rs['salary']; echo"</td>";
						echo "<td>"; echo $rs['experience']; echo"</td>";
						echo "<td>"; echo $rs['skills']; echo"</td>";
						echo "<td>"; echo $rs['date']; echo"</td>";
						echo "<td><a id='adds' href='delete_vacancy.php?info_id=".$rs['id']."'><i class='fa fa-trash'></i></a></td>";     
						echo'
						';}}}}
						echo'</tbody>
							</table></div></div></div>';
						
						
};						
?>
<script>
  $(function () {
    $('#exportTable').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });
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
                        Program: { type: String },
                        Code: { type: String },
                        Date: { type: String },
                        Venue: { type: String },
                        Time: { type: String },
                        Category: { type: String },
						
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
                                            value: "Program"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Code "
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Date"
                                        },
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Venue"
                                        },
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Time"
                                        },
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Category"
                                        },
										
                                    ]
                                }
                            ].concat($.map(data, function(item) {
                                return {
                                    cells: [
                                        { type: String, value: item.Program },
                                        { type: String, value: item.Code },
                                        { type: String, value: item.Date },
                                        { type: String, value: item.Venue },
                                        { type: String, value: item.Time },
                                        { type: String, value: item.Category },
										
                                    ]
                                };
                            }))
                        }
                    ]
                }).saveAs({
                    fileName: "Monthly Report MYRAS"
                });
            });
        });
    });
</script>

<style>
    #exportButton {
        border-radius: 1;
    }
</style>

<!-- Export a Table to Excel - END -->

<!-- Export a Table to Excel - START -->
<link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />
<!-- you need to include the shieldui css and js assets in order for the components to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>
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


</body>
</html>