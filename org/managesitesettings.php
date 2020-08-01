<?php
session_start();
if((!isset($_SESSION['tz_webteam'])) && (!isset($_SESSION['tz_organizer'])))
{
	header("location:index");
}
require_once("site-settings.php");
$getuserdata=mysql_fetch_array(mysql_query("SELECT * FROM organizers WHERE orgid='".mysql_real_escape_string($_SESSION['tz_organizer'])."'"));
?>
 <html lang="en">
   <?php include ("includes/files_include.php") ?>
     <link rel="stylesheet" href="node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css" />
     <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
<body>
  <div class="container-scroller">
   <?php include ("includes/topbar.php") ?>
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        
          </div>
        </div>
        <!-- partial -->
       <?php include ("includes/sidebar.php") ?>
        <div class="content-wrapper">
			<?php
			

	if($getuserdata['role']!="Webteam")
				{
					
?>
<center>
	  	<div class="alert alert-danger">
    				<strong>Sorry!!!  This Feature is Availble Only For Webteam.</strong>  
    				</div>
    				</center>  			
				<?php
}
else
{
	
	?>
	
	
			<div class="card">
            <div class="card-body">
              <h4 class="card-title"></h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">			
                       <table class="table table-striped table-bordered table-hover" id="example4">
    						<thead>
    							<tr>
    								<td>Sno</td>
    								<td>Function</td>
    								<td>Current Status</td>    								    							    																
    								<td>Actions</td>
    							</tr>
    						</thead>
    						<tbody>
		
	<?php
			
	  $settings=mysql_query("SELECT * FROM site_settings");
  while($s=mysql_fetch_array($settings)){	        
	  ?>
			<tr>
				<td><?php echo $s['sno'];?></td>
				<td><?php echo $s['function'];?></td>	
        <?php
        if($s['value']=='on'){
        ?>		
				 <td><div class='badge badge-success'><?php echo $s['value'];?></div></td>
         <?php
       }else{        
       ?>
       <td><div class='badge badge-warning'><?php echo $s['value'];?></div></td>
       <?php
        }
        ?>
				 <td></td>
		    </tr>
			 <?php
		   
		   }
  ?>
		</tbody>
		</table>
		</form>
		</div>
	</div>
</div>
</div>
</div>
<?php
}
?>
		
		<?php include ("includes/footer.php") ?>


        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="node_modules/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="node_modules/raphael/raphael.min.js"></script>
  <script src="node_modules/morris.js/morris.min.js"></script>
  <script src="node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="node_modules/datatables.net/js/jquery.dataTables.js"></script>
  <script src="node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
<script src="js/data-table.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>

    <script src="js/jquery.tabledit.js" type="text/javascript"></script>
    <script src="js/jquery.tabledit.min.js" type="text/javascript"></script>
<script type="text/javascript">
         $('#example4').dataTable( {
  "ordering": false
} )
   

$('#example4').Tabledit({
   url: 'managesitesettingstodb.php',
    deleteButton: false,
    saveButton: false,
    autoFocus: false,
    buttons: {
        edit: {
            class: 'btn btn-sm btn-primary',
            html: '<span class="icon-pencil menu-icon"></span> &nbsp EDIT',
            action: 'edit'
        }
    },
    columns: {
        identifier: [0, 'sno'],
        editable: [[3, 'action_o','{"01": "On","02":"Off"}']]
    }
});
    </script>
    </body>

</html>