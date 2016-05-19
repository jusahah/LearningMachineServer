<!DOCTYPE html>
<html lang="en-us" id="lock-page">
	<head>
		<meta charset="utf-8">
		<title> SmartAdmin</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- #CSS Links -->
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/font-awesome.min.css')}}">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-production-plugins.min.css')}}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-production.min.css')}}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-skins.min.css')}}">

		<!-- SmartAdmin RTL Support -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-rtl.min.css')}}"> 

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/demo.min.css')}}">

		<!-- page related CSS -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/lockscreen.min.css')}}">

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- #APP SCREEN / ICONS -->
		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

		<style>

		.sequencetemplate {
			display: none;
		}
		</style>

	</head>
	
	<body class="">
		<div id="main2" role="main" style="margin: 24px;">

			<!-- MAIN CONTENT -->

				<div class="well" style="text-align: center; border: 0px;">
				<h1 style="display: inline-block; color: #333;">Playing: {{$sequence->name}}</h1>
				<h1 id="moverhud" style="display: inline-block; color: #333; float: left;">--/--</h1>
				
				<button class="btn btn-primary" id="sequencemovenext" style="float: right; height: 48px; margin-left: 6px;">Seuraava</button>
				<button class="btn btn-danger" id="sequencemoveback" style="float: right; height: 48px; margin-left: 6px;">Edellinen</button>
				</div>


				<!-- Render here in a one big list of divs -->


				@foreach ($sequenceables as $i => $sequenceable)
					@include('play/item_templates/' . $sequenceable->actualType(), [
						'concreteItem' => $sequenceable->sequenceable,
						'i' => $i
					])
				@endforeach
			



		</div>

		<!-- Modal -->
		<div class="modal fade" id="selfevalmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Arvostele vastauksesi</h4>
		      </div>
		      <div class="modal-body">
		        <h3>Oikea vastaus:</h3>
		        <p id="correctanswer">--</p>
		        <hr>
		        <h3>Sinun syöttämäsi vastaus:</h3>
		        <p id="youranswer">--</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" onclick="selfEvalCorrect()" class="btn btn-success" data-dismiss="modal">Oikein</button>
		        <button type="button" onclick="selfEvalWrong()" class="btn btn-danger" data-dismiss="modal">Väärin</button>
		      </div>
		    </div>
		  </div>
		</div>


		<!--================================================== -->	

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script src="{{asset('js/plugin/pace/pace.min.js')}}"></script>

	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


	    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


		<!-- IMPORTANT: APP CONFIG -->
		<script src="{{asset('js/app.config.js')}}"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->		
		<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>

		<!-- JQUERY VALIDATE -->
		<script src="{{asset('js/plugin/jquery-validate/jquery.validate.min.js')}}"></script>
		
		<!-- JQUERY MASKED INPUT -->
		<script src="{{asset('js/plugin/masked-input/jquery.maskedinput.min.js')}}"></script>
		
		<!--[if IE 8]>
			
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
			
		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="{{asset('js/app.min.js')}}"></script>

		<script>

		function selfEvalCorrect() {
			if (selfEvalCb) selfEvalCb(true);

		}

		function selfEvalWrong() {
			if (selfEvalCb) selfEvalCb(false);
		}

		var selfEvalCb;
		var pendingForm;

		function StateMachine($sequenceables) {

			this.sequenceablesStateArray;

			this.currentSequenceable = null;
			this.currentOffset = 0;
			this.lastOffset;

			this.init = function() {
				var arr = [];
				$sequenceables.each(function(i, el) {
					var $el = $(el);
					arr.push({
						index: $el.attr('data-offset'),
						el: $el
					});
				});

				this.sequenceablesStateArray = arr.sort(function(sequenceView1, sequenceView2) {
					if (sequenceView1.index < sequenceView2.index) return -1;
					return 1;
				});
				this.lastOffset = parseInt(this.sequenceablesStateArray.length-1);
				console.log("Seq state arr")
				console.log(this.sequenceablesStateArray)				
			}

			this.moveFirst = function() {
				this.currentOffset = 0;
				this.render();

			}

			this.moveNext = function() {
				if (this.lastOffset === this.currentOffset) return;
				console.log("Move next");
				var currentSeq = this.sequenceablesStateArray[this.currentOffset];
				this.currentOffset++;
				this.render(currentSeq);
			}

			this.movePrevious = function() {
				if (this.currentOffset === 0) return;
				console.log("Move previous");
				var currentSeq = this.sequenceablesStateArray[this.currentOffset];
				this.currentOffset--;
				this.render(currentSeq);				
			}

			this.render = function(toBeHiddenView) {
				if (toBeHiddenView) {
					toBeHiddenView.el.hide();
				}

				this.sequenceablesStateArray[this.currentOffset].el.show();
				this.updateMoverHud();
			}

			this.updateMoverHud = function() {
				var nth = this.currentOffset + 1;

				$('#moverhud').empty().append(nth + "/" + (this.lastOffset+1));

			}


			this.init();
		}

		$(function() {
			// CSRF setup for Laravel
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': "{!! csrf_token() !!}"
			    }
			});	

			var $sequenceables = $('.sequencetemplate');
			var stateM = new StateMachine($sequenceables);
			stateM.moveFirst();

			$('#sequencemovenext').on('click', function() {
				stateM.moveNext();
			});
			$('#sequencemoveback').on('click', function() {
				stateM.movePrevious();
			});


			// Question listeners
			$('.questionform').on('submit', function(e) {
				e.preventDefault();
				console.log(e.target);

				var form = $(e.target);
				var button = form.find('.submitanswer');
				var vastausinput = form.find('.vastausinput');

				if (vastausinput.val().trim() === '') {
					return showNotification('warning', 'Vastaus ei voi olla tyhjä!');
				}

				
				var vastaus = vastausinput.val().trim();
				var questionID = form.attr('data-questionid');

				vastausinput.prop('disabled', true);
				button.prop('disabled', true);

				putQuestionFormIntoPending(form);
				var evalFunction = openSelfEval;

				if (form.attr('data-evaltype') === 'server') {
					evalFunction = sendAnswerToServer;
				}
				// Use the selected evalFunction to evaluate answer and route
				// Result to callback updating UI
				return evalFunction(form, questionID, vastaus, function(result) {
					selfEvalCb = false;
					pendingForm = null;
					sendResultToServer(questionID, vastaus, result);
					showResultInQuestionForm(form, result);
					
				});

			});


			$('#selfevalmodal').on('hidden.bs.modal', function() {
				if (selfEvalCb && pendingForm) {
					// Modal was closed without answer given
					// Enable submit button again
					pendingForm.find('.submitanswer').prop('disabled', false);
				}
			});
		});


		function showNotification(type, text) {
			alert(text);
		}

		function putQuestionFormIntoPending(form) {
			pendingForm = form;
			form.find('.submitanswer').empty().append('Tarkistetaan...');
		}

		function showResultInQuestionForm(form, result) {
			var button = form.find('.submitanswer');

			if (result) {
				button.empty().append('Oikein!');
				button.removeClass('btn-default').addClass('btn-success');
			} else {
				button.empty().append('Väärin!');
				button.removeClass('btn-default').addClass('btn-danger');
			}
		}


		// Evaluation funs
		function sendAnswerToServer(form, questionID, vastaus, cb) {
			setTimeout(function() {
				cb(Math.random() < 0.5);
			}, 1200);
		}

		function openSelfEval(form, questionID, vastaus, cb) {
			selfEvalCb = cb;
			var oikeaVastaus = form.find('#correctanswer').text();
			$('#selfevalmodal').find('#correctanswer').empty().append(oikeaVastaus);
			$('#selfevalmodal').find('#youranswer').empty().append(vastaus);
			$('#selfevalmodal').modal('show');

		}

		function sendResultToServer(questionID, vastaus, result) {

			$.ajax({
			  method: "POST",
			  url: "{{route('play.receiveanswerwithresult')}}",
			  data: { question: questionID, answer: vastaus, result: result ? 1 : 0 }
			})
			  .done(function( msg ) {

			  }).fail(function(msg) {
			  	alert("There may have been a problem with saving your answer to server!");
			  });

		}


		</script>



	</body>
</html>