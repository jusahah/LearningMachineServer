@extends('layouts/main')

@section('content')

<div class="well well-sm">
<div class="row">
	<div class="col-md-7 col-sm-12 col-lg-7">
	
	
				
		<h1>Build your sequence</h1>
		<div>
		<div class="dd" id="reorderlist" style="float: none;">
			<ol class="dd-list">

				@foreach($sequenceables as $sequenceable)
					@include('sequences/sequenceabletemplates/' . $sequenceable->actualType())
				@endforeach
				
			</ol>
		</div>
		</div>
		<button class="btn btn-success" id="saveorder">Update Sequence</button>
		<p id="pendingchanges" style="margin-top: 4px; font-style: italic; font-size: 12px; color: #444;"></p>
		<br>



		


				
	</div>
	<div class="col-md-5 col-sm-12 col-lg-5">

		<h1>Add to Sequence (click)</h1>

		<div class="custom-scroll table-responsive" style="max-height:420px; margin-top: 15px; overflow-y: scroll;">
											

			<table class="table table-bordered table-hover">

				<tbody class="addtosequence">
				@foreach($allSequenceables as $sequenceable)
					<tr 
						data-sequenceableid="{{$sequenceable->id}}"
						data-sequenceabletype="{{$sequenceable->printType()}}"
						data-sequenceablename="{{$sequenceable->sequenceable->name}}"
					>
						<td>{{$sequenceable->printType()}}</td>
						<td>{{$sequenceable->sequenceable->name}}</td>
					</tr>
				@endforeach	
						
				</tbody>
			</table>
		
		</div>
		<br>
	</div>

</div>	

				
</div>

@endsection	

@section('js')
<script src="{{asset('js/plugin/jquery-nestable/jquery.nestable.min.js')}}"></script>


<script>




$(function() {

	var latestSave;

	function getIdsFromDOM() {
		var lis = $('#reorderlist').find('ol').find('li');
		var ids = [];

		lis.each(function(i, li) {
			ids.push($(li).attr('data-id'));
		});

		return ids;	
	}

	function stashCurrentStateAsLatestSave() {
		latestSave = getIdsFromDOM();
		updatePendingChangesText();
	}

	function checkIfIdenticalWithLatestSave() {
		if (!latestSave) {
			// No changes/saves yet
			return false;
		}

		return JSON.stringify(latestSave) === JSON.stringify(getIdsFromDOM());
	}

	function updatePendingChangesText() {
		if (checkIfIdenticalWithLatestSave()) {
			$('#pendingchanges').empty();
		} else {
			$('#pendingchanges').empty().append('There are unsaved changes!');
		}
	}

	$('#reorderlist').nestable({
		group : 1
	}).on('change', function() {
		console.log("Reordering");
		var jsonOrder = JSON.stringify($('#reorderlist').nestable('serialize'));
		console.log(jsonOrder);
		updatePendingChangesText();
	});
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': "{!! csrf_token() !!}"
	    }
	});	

	$('#reorderlist').on('click', function(e) {
		var clicked = $(e.target);

		if (clicked.hasClass('removesequenceable')) {
			clicked.closest('li').remove();
			updatePendingChangesText();
		}

	});

	$('#saveorder').on('click', function() {
		// Ajax call to server api
		var jsonOrder = JSON.stringify($('#reorderlist').nestable('serialize'));
		console.log("Starting ajax");
		$.ajax({
		  method: "POST",
		  url: "{{route('sequence.reorder', ['sequence' => $sequence->id])}}",
		  data: { order:  jsonOrder}
		})
		  .done(function( msg ) {
		  	stashCurrentStateAsLatestSave();
		    alert( "Sequence has been updated on the server!");
		  }).fail(function(msg) {
		  	alert('Saving failed!');
		  })
	});

	$('#bringitemin').on('click', function() {
		// Ajax call to server api
		$.SmartMessageBox({
			title : "Bring in Sequenceable into this Sequence",
				content : "Select Type first, then what you want to bring in!",
				buttons : '[Cancel][OK]',
				input : "select",
				options : "[Costa Rica][United States][Autralia][Spain]"

			}, function(ButtonPressed) {
				if (ButtonPressed === "OK") {
					window.location = deletepath;
				}
				if (ButtonPressed === "Cancel") {
					
				}
	
			});
			// Progressive enchancement
		e.preventDefault();
	});

	$('.addtosequence').on('click', function(e) {
		var clicked = $(e.target);
		if (clicked.prop('tagName').toUpperCase() === 'TD') {
			clicked = clicked.closest('tr');
		}

		var toBeAdded = {
			id: clicked.attr('data-sequenceableid'),
			type: clicked.attr('data-sequenceabletype'),
			name: clicked.attr('data-sequenceablename')
		}

		console.log(toBeAdded);

		if (!toBeAdded.id) return false; // User dragged mouse or something

		addToSequence(toBeAdded);
		updatePendingChangesText();


	});

	function addToSequence(sequenceableObj) {
		var html = getHTML(sequenceableObj);
		$('#reorderlist').find('ol').append(html);

	}

	function getHTML(sequenceableObj) {

		var html = '';
		html += '<li class="dd-item" data-id="' + sequenceableObj.id + '">';
		html += '<button class="removesequenceable" data-action="collapse" type="button">Remove</button>';
		html += '<div class="dd-handle">';
	    html += sequenceableObj.name + '<span style="float: right;">' + sequenceableObj.type + '</span>';
	    html += '</div></li>';
	    return html;

	}

	stashCurrentStateAsLatestSave();
});


</script>



@endsection				