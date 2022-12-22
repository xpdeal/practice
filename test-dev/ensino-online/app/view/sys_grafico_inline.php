<?php
$sess = "GRA";
$pag = "sys_grafico_inline.php";
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
						<h1>Inline</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Grafico</a></li>
							<li class="breadcrumb-item active">Inline</li>	
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header border-0">
								<div class="d-flex justify-content-between">
								  <h3 class="card-title">Viagens</h3>
								  <a href="javascript:void(0);">View Report</a>
								</div>
							</div>
							<div class="card-body">
								<div class="d-flex">
								  <p class="d-flex flex-column">
									<span class="text-bold text-lg">$18,230.00</span>
									<span>Viagens Totais</span>
								  </p>
								  <p class="ml-auto d-flex flex-column text-right">
									<span class="text-success">
									  <i class="fas fa-arrow-up"></i> 33.1%
									</span>
									<span class="text-muted">Ano <?=date("Y");?></span>
								  </p>
								</div>
								<!-- /.d-flex -->

								<div class="position-relative mb-4">
								  <canvas id="sales-chart" height="200"></canvas>
								</div>

								<div class="d-flex flex-row justify-content-end">
								  <span class="mr-2">
									<i class="fas fa-square text-primary"></i> Qtde Viagem
								  </span>

								  <span>
									<i class="fas fa-square text-gray"></i> KMs Rodados
								  </span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card bg-gradient-info">
							<div class="card-header border-0">
								<h3 class="card-title">
								  <i class="fas fa-th mr-1"></i>
								  Sales Graph
								</h3>

								<div class="card-tools">
									<button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
										<i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
										<i class="fas fa-times"></i>
									</button>
								</div>
							</div>
							<div class="card-body">
								<canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
							<!-- /.card-body -->
							<div class="card-footer bg-transparent">
								<div class="row">
									<div class="col-4 text-center">
										<input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
											   data-fgColor="#39CCCC">

										<div class="text-white">Mail-Orders</div>
									</div>
									<!-- ./col -->
									<div class="col-4 text-center">
										<input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
										   data-fgColor="#39CCCC">

										<div class="text-white">Online</div>
									</div>
									<!-- ./col -->
								  
									<div class="col-4 text-center">
										<input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
										   data-fgColor="#39CCCC">

										<div class="text-white">In-Store</div>
									</div>
									<!-- ./col -->
								</div>
								<!-- /.row -->
							</div>
						  <!-- /.card-footer -->
						</div>
						<!-- /.card -->				
					</div>
					<!-- /.card -->	
				</div>
				<!-- /.row -->				
			</div>
			<!-- /.container-fluid -->
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
<!-- jQuery UI 1.11.4 -->
<script src="<?=$hosted;?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=$hosted;?>/assets/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=$hosted;?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=$hosted;?>/assets/dist/js/pages/dashboard.js"></script>
<!-- page script -->
<script>
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [1000, 2000, 3000, 2500, 2700, 2500, 3000]
        },
        {
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
          data           : [700, 1700, 2700, 2000, 1800, 1500, 2000]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              return '$' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})

</script>
<script>
/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(function () {

  'use strict'

  /* jQueryKnob */
  $('.knob').knob()  

  
  // Sales graph chart
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d');
  //$('#revenue-chart').get(0).getContext('2d');

    var salesGraphChartData = {
    labels  : ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2', '2012 Q3', '2012 Q4', '2013 Q1', '2013 Q2'],
    datasets: [
      {
        label               : 'Digital Goods',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#efefef',
        pointRadius         : 3,
        pointHoverRadius    : 7,
        pointColor          : '#efefef',
        pointBackgroundColor: '#efefef',
        data                : [2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432]
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        ticks : {
          fontColor: '#efefef',
        },
        gridLines : {
          display : false,
          color: '#efefef',
          drawBorder: false,
        }
      }],
      yAxes: [{
        ticks : {
          stepSize: 5000,
          fontColor: '#efefef',
        },
        gridLines : {
          display : true,
          color: '#efefef',
          drawBorder: false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesGraphChart = new Chart(salesGraphChartCanvas, { 
      type: 'line', 
      data: salesGraphChartData, 
      options: salesGraphChartOptions
    }
  )

})

</script>

</body>
</html>


