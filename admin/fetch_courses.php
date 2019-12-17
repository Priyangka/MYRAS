<?php 
session_start();
include('../connection/config.php');
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
						
						$sqlv= "SELECT * FROM latest_information WHERE preference='$request'";}
						$pfilearray=array();
						$index=0;
						echo '<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th>#</th> 
						  <th>Title</th>
						  <th>Date</th>
						  <th>Venue</th>
						  <th>Category</th>
						  <th>Action</th>
						</tr>
						</thead>
						<tbody>';
						if($result3 = mysqli_query($db,$sqlv)){
						if(mysqli_num_rows($result3) > 0){
						while(($rs=mysqli_fetch_assoc($result3)))
						{
						$index++;
						$id = $rs['id'];
						echo "<tr><td>"; echo $index; echo"</td>";
						echo "<td><a href=\"info_details.php?info_id=".$rs['id']."\" class='product-title'>"; echo $rs['title']; echo"</td>";
						echo "<td>"; echo $rs['date']; echo"</td>";
						echo "<td>"; echo $rs['venue']; echo"</td>";
						if($rs['preference']=='Student'){
						echo "<td>";
                        echo "<span class='label label-danger'>";echo $rs['preference']; echo"</span>";echo"</td>";}
						elseif($rs['preference']=='Manager'){
						echo "<td>";
                        echo "<span class='label label-warning'>";echo $rs['preference']; echo"</span>";echo"</td>";}

						echo "<td><a id='adds' href=\"delete_infos.php?info_id=".$rs['id']."\"><i class='fa fa-trash'></i></a></td>";     
                    
						}}}
;						
?>
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