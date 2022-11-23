
Webcam.set({
	// live preview size
	width: 320,
	height: 240,

	// device capture size
	dest_width: 640,
	dest_height: 480,

	// final cropped size
	crop_width: 480,
	crop_height: 480,

	// format and quality
	image_format: 'png',
	jpeg_quality: 90,

	// flip horizontal (mirror mode)
flip_horiz: true
});
Webcam.attach( '#my_camera' );


// preload shutter audio clip
		var shutter = new Audio();
		shutter.autoplay = false;
		shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';
		
		function preview_snapshot() {
			// play sound effect
			try { shutter.currentTime = 0; } catch(e) {;} // fails in IE
			shutter.play();
			
			// freeze camera so user can preview current frame
			Webcam.freeze();
			
			// swap button sets
			document.getElementById('pre_take_buttons').style.display = 'none';
			document.getElementById('post_take_buttons').style.display = '';
		}
		
		function cancel_preview() {
			// cancel preview freeze and return to live camera view
			Webcam.unfreeze();
			
			// swap buttons back to first set
			document.getElementById('pre_take_buttons').style.display = '';
			document.getElementById('post_take_buttons').style.display = 'none';
		}
		
		function save_photo() {
			// actually snap photo (from preview freeze) and display it
			Webcam.snap( function(data_uri) {
				var ender = data_uri;
				cod = $("#perfil").val();
				nome = $("#nome").val();
				// display results in page
				document.getElementById('results').innerHTML = 
					// '<h2>Here is your large, cropped image:</h2>' + 
					'<img src="'+data_uri+'"/><br/></br>' + 
					'<div id="mens"></div> ' ; 
					//'<a href="'+data_uri+'" target="_blank">Open image in new window...</a>';
					$.post("../controller/salva_foto.php",
						{							
							purl: ender,
							perfil: cod,
							nome: nome
						},
						function(data){
							if(data.status=="OK"){
								$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mensfoto");							
								console.log('ok');
								// $("#confirma").modal("hide");
								// $("#aguarde").modal("show");
								//location.reload(); 
							} 
							else{
								alert(data.mensagem);	
							}
						},
						"json"
					);
				// shut down camera, stop capturing
				Webcam.reset();
				
				// show results, hide photo booth
				document.getElementById('results').style.display = '';
				document.getElementById('my_photo_booth').style.display = 'none';
			} );
		}