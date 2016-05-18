@extends('layouts/main')

@section('content')

<div class="well well-sm">
<div class="row">
	<div class="col-md-5 col-sm-12 col-lg-5">
				
		<h1>Reorder your sequence</h1>

		<div class="dd" id="reorderlist">
			<ol class="dd-list">

				@foreach($sequenceables as $sequenceable)
					@include('sequences/sequenceabletemplates/' . $sequenceable->actualType())
				@endforeach
				
			</ol>
		</div>

		<button class="btn btn-primary" id="saveorder">Save new order</button>
				
	</div>
	<div class="col-md-7 col-sm-12 col-lg-7">

		<h1>Info about sequence</h1>

	</div>

</div>											
				
</div>

@endsection	

@section('js')
<script src="{{asset('js/plugin/jquery-nestable/jquery.nestable.min.js')}}"></script>


<script>

$(function() {

	$('#reorderlist').nestable({
		group : 1
	}).on('change', function() {
		console.log("Reordering");
		var jsonOrder = JSON.stringify($('#reorderlist').nestable('serialize'));
		console.log(jsonOrder);
	});
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': "{!! csrf_token() !!}"
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
		    alert( "Order has been changed");
		  });
	});

});


</script>	

@endsection				