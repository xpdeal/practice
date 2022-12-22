<?php
$sess = "GRA";
$pag = "sys_grafico_float.php";
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../model/recordset.php");
require_once("../controller/sys_data_grafico.php");
?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Donut Chart Flot</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Grafico</a></li>
							<li class="breadcrumb-item active">Donut Chart</li>	
						</ol>
					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">			
			<!-- Donut chart -->
			<div class="row">
				<div class="col-md-6">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">
							  <i class="far fa-chart-bar"></i>
							  Donut Chart
							</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div id="donut-chart" style="height: 300px;"></div>
						</div>
					  <!-- /.card-body-->
					</div>
				</div>
				<!-- /.card -->
				
				<div class="col-md-6">
					<!-- Bar chart -->
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">
							  <i class="far fa-chart-bar"></i>
							  Bar Chart
							</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div id="bar-chart" style="height: 300px;"></div>
						</div>
					  <!-- /.card-body-->
					</div>
				</div>
				<!-- /.card -->
			</div>
			<!-- /.row -->			
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

  <?php require_once("../config/footer.php");?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
<!-- FLOT CHARTS -->
<script src="<?=$hosted;?>/assets/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?=$hosted;?>/assets/plugins/flot/plugins/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?=$hosted;?>/assets/plugins/flot/plugins/jquery.flot.pie.js"></script>
<!-- Page specific script -->
<script>
$(function () {
	 /*
     * BAR CHART
     * ---------
     */
    var bar_data = {
      data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June']]
      }
    })
    /* END BAR CHART */
})
</script>

<script>
$(function () {
    /*
     * DONUT CHART
     * -----------
     */
    var donutData = [
      {
        label: 'Series2',
        data : 30,
        color: '#3c8dbc'
      },
      {
        label: 'Series3',
        data : 20,
        color: '#0073b7'
      },
      {
        label: 'Series4',
        data : 50,
        color: '#00c0ef'
      }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */

})
  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
 }
</script>
</body>
</html>