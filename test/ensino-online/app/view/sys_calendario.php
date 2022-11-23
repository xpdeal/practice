<?php
$sess = "CAL";
$pag = "sys_calendario.php";
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
require_once("../model/recordset.php");
$fn = new functions();
?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Calend&aacute;rio</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
						  <li class="breadcrumb-item"><a href="#">Sistema</a></li>
						  <li class="breadcrumb-item active">Calend&aacute;rio</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<div class="sticky-top mb-3">						  
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Eventos</h4>
								</div>
								<div class="card-body">
									<!-- the events -->
									<div id="external-events">
										<?php
										// cookie vcal zera, para tirar o lembrete da quantidade
										setcookie("vcal",1);
										$rs_ev = new recordset();
										$sql = "SELECT * FROM sys_evento WHERE eve_dep IN('[".$_SESSION['usu_cod']."]','10','11') ORDER BY eve_tema ASC";
										$rs_ev->FreeSql($sql);
										while($rs_ev->GeraDados()){?>
											<div data-evento="<?=$rs_ev->fld("eve_id");?>" data-titulo="<?=$rs_ev->fld("eve_desc");?>" class="external-event <?=$rs_ev->fld("eve_tema");?>"><?=$rs_ev->fld("eve_desc");?></div>
										<?php 
										}
										?>
										<div class="checkbox">
											<label for="drop-remove">
												<input type="checkbox" id="drop-visivel">
												 vis&iacute;vel para todos
											</label>
										</div>
									</div>
								</div>
								<!-- /.card-body -->
								
								<div class="card-body">	
									<div class="card-header">
										<h4 class="card-title">Escolher quem pode ver</h4>
									</div>
									
									<div id="form-group">
										<div class="form-group">
											<select id="funcs" class="form-control select2bs4" multiple="multiple" style="width: 100%;">
											<?php
											$rs_fc = new recordset();
											// Seleciona todos os departamentos cadastrados
											$rs->Seleciona("dp_id, dp_nome","sys_departamento","dp_id<>0");
											while($rs->GeraDados()){?>
											<option disabled="disabled"><?=$rs_ev->fld("dp_nome");?></option>
											<?php
											// Entre cada Option de Departamentos, colocamos o funcionário dele
											$rs_fc->Seleciona("usu_cod, usu_nome","sys_usuario","usu_dpId=".$rs->fld("dp_id"));
											while($rs_fc->GeraDados()){?>
											<option value="<?=$rs_fc->fld("usu_cod");?>"><?=$rs_fc->fld("usu_nome");?></option>
											<?php
											}
											}
											?>
											</select>
										</div>
										<!-- /.form-group -->									
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->		
							
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Criar Eventos</h3>
								</div>
								<div class="card-body">
									<div class="btn-group" style="width: 100%; margin-bottom: 10px;">
										<!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
										<ul class="fc-color-picker" id="color-chooser">
											<li><a data-theme="bg-blue" class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
											<li><a data-theme="bg-yellow" class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
											<li><a data-theme="bg-green"class="text-success" href="#"><i class="fas fa-square"></i></a></li>
											<li><a data-theme="bg-red" class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
											<li><a data-theme="bg-secondary" class="text-secondary" href="#"><i class="fas fa-square"></i></a></li>
										</ul>
									</div>
									 <!-- /btn-group -->
									
									<div class="input-group">
										<input id="new-event" type="text" class="form-control"  maxlength="20" placeholder="titulo do Evento">

										<div class="input-group-append">
										  <button id="add-new-event" type="button" class="btn btn-primary">Adicionar</button>
										</div>
										<!-- /btn-group -->
									</div>
									
									<div id="lblChar"></div>
								
								</div>
							</div>
						</div>
					</div>
					<!-- /.col -->
					
					<div class="col-md-9">
						<div class="card card-primary">
							<div class="card-body p-0">
								<!-- THE CALENDAR -->
								<div id="calendar"></div>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	
	<?php
		//pesquisa de eventos para esse usuario
		$rs_cal = new recordset();
		$fn = new functions();
		$nc = $rs_cal->autocod("cal_id","sys_calendario");
		$evts = "";
		$sq_cal = "SELECT * FROM sys_calendario a
					JOIN sys_evento b ON a.cal_eveid = b.eve_id
				   WHERE (cal_eveusu like '%[".$_SESSION['usu_cod']."]%'
						  OR cal_eveusu like '%[9999]%')";
		$rs_cal->FreeSql($sq_cal);
		while($rs_cal->GeraDados()){
		  //Tratar datas
		  $sdi = explode("-",$rs_cal->fld("cal_dataini"));
		  $mi = $sdi[1]-date("m");
		  $ai = $sdi[0]-date("Y");
		  $sdf = explode("-",$rs_cal->fld("cal_datafim"));
		  $mf = $sdf[1]-date("m");
		  $af = $sdf[0]-date("Y");
		  echo "<!--".$fn->data_br($rs_cal->fld("cal_dataini"))."-->";
		  $ehi = ($rs_cal->fld("cal_horaini") <> NULL ? explode(":", $rs_cal->fld("cal_horaini")):explode(":","00:00:00"));
		  $ehf = ($rs_cal->fld("cal_horafim") <> NULL ? explode(":", $rs_cal->fld("cal_horafim")):explode(":","00:00:00"));
		  $evts.= "{
			  id:".$rs_cal->fld("cal_id").",
			  title: '".$rs_cal->fld("eve_desc")."',
			  start: new Date(y+".$ai.", m+".$mi.", ".$sdi[2]." , ".$ehi[0].", ".$ehi[1]."),
			  end: new Date(y+".$af.", m+".$mf.", ".$sdf[2]." , ".$ehf[0].", ".$ehf[1]."),
			  url: '".$rs_cal->fld("cal_url")."&token=".$_SESSION['token']."',
			  allDay: false,
			  backgroundColor: '".$rs_cal->fld("eve_cor")."', //Success (green)
			  borderColor: '".$rs_cal->fld("eve_cor")."' //Success (green)
			},";
		}
	$evts = substr($evts,0,-1);        
	?>
	<input type="hidden" id="nc" value="<?=$nc;?>"/>
 


   <?php require_once("../config/footer.php");?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
   
<!-- jQuery -->
<script src="<?=$hosted;?>/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
<!-- Bootstrap -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Select2 -->
<script src="<?=$hosted;?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- jQuery UI -->
<script src="<?=$hosted;?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?=$hosted;?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?=$hosted;?>/assets/dist/js/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Validation -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- Page specific script -->
<script>
      $(document.body).on("keyup","#new-event",function(){
        var n = 20 - $("#new-event").val().length;
       $("#lblChar").html("Restam "+n+" caracteres...");
      });

      $(function () {
        $(".select2").select2()
		//Initialize Select2 Elements
		$('.select2bs4').select2({
		  theme: 'bootstrap4'
		})
        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
          monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
          dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
          dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'hoje',
            month: 'mes',
            week: 'semana',
            day: 'dia'
          },
          //Random default events
          events: [
            
           /* {
              title: 'All Day Event',
              start: new Date(y, m, 29),
              backgroundColor: "#f56954", //red
              borderColor: "#f56954" //red
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d - 5),
              end: new Date(y, m, d - 2),
              backgroundColor: "#f39c12", //yellow
              borderColor: "#f39c12" //yellow
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 14, 30),
              allDay: false,
              backgroundColor: "#0073b7", //Blue
              borderColor: "#0073b7" //Blue
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false,
              backgroundColor: "#00c0ef", //Info (aqua)
              borderColor: "#00c0ef" //Info (aqua)
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d + 1, 19, 0),
              end: new Date(y, m, d + 1, 22, 30),
              allDay: false,
              backgroundColor: "#00a65a", //Success (green)
              borderColor: "#00a65a" //Success (green)
            },
            {
              title: 'Click for Google',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://google.com/',
              backgroundColor: "#3c8dbc", //Primary (light-blue)
              borderColor: "#3c8dbc" //Primary (light-blue)
            }*/
            <?=$evts;?>
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");
            
            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)

            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
            var nd = copiedEventObject.start.toString();
            var todos = 0;
            
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }
            if ($('#drop-visivel').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              todos = 1;
            }
              /*Guardando evento no calendário (banco de dados) */
            var _evt = $(this).data("evento");
            var _tit = $(this).data("titulo");
            $.post("../controller/sys_record_data.php",{acao:"Cadastrar_calendario",evento: _evt, dt: nd, vpt: todos, nc:$("#nc").val(), users:$("#funcs").val()},function(data){
                obj = jQuery.parseJSON(data);
                var msg = "Novo evento: "+_tit + " em "+obj.mensagem;
                $.cookie("vcal",0); //nao visto
                $.cookie("ncal",0); // não notificado
                $.cookie("vmsg", msg);
                notify(msg,"#","CALENDARIO");
                location.reload();
            },"html");           
          }
        });

        function rgb2hex(rgb) {
            if (/^#[0-9A-F]{6}$/i.test(rgb)) return rgb;

            rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            function hex(x) {
                return ("0" + parseInt(x).toString(16)).slice(-2);
            }
            return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
        }

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var tema = "";
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          tema = $(this).data("theme");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
		
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);
          //add on database
          var cor_hex = rgb2hex(currColor);
         
          $.post("../controller/sys_record_data.php",{acao:"Cadastrar_evento",desc: val, cor:cor_hex, tema: tema, dep:11},function(){location.reload();});

          //Remove event from text input
          $("#new-event").val("");
        });
        
    });
</script>
</body>
</html>
