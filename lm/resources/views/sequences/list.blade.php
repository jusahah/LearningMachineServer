@extends('layouts/main')

@section('content')	

							<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"

								-->
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>Your Sequences</h2>

								</header>

								<!-- widget div-->
								<div>

									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->

									</div>
									<!-- end widget edit box -->

									<!-- widget content -->
									<div class="widget-body">
										
										<div class="table-responsive">
										
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Name</th>
														<th>Length</th>
														<th>Created At</th>
														<th>Open</th>
														<th>Delete</th>
													</tr>
												</thead>
												<tbody>
													@foreach($sequences as $sequence)

													<tr>
														<td>{{$sequence->name}}</td>
														<td>{{$sequence->getLength()}}</td>
														<td>{{$sequence->printCreatedAt()}}</td>
														<td><a class="btn btn-xs btn-primary" href="{{route('sequence.show', ['sequence' => $sequence->id])}}">Open</a></td>
														<td><a class="btn btn-danger btn-xs deletesequence" href="{{route('sequence.customdelete', ['sequence' => $sequence->id])}}" data-deletepath="{{route('sequence.customdelete', ['sequence' => $sequence->id])}}">Poista</a></td>

													</tr>
													@endforeach

												</tbody>
											</table>
											
										</div>
									</div>
									<!-- end widget content -->

								</div>
								<!-- end widget div -->

							</div>
@endsection				


@section('js')

<script>

console.log("Js injected");
$(function() {

	$(".deletesequence").click(function(e) {
		var deletepath = $(e.target).attr('data-deletepath');
		console.log("Clicked that!: " + deletepath);
		
				$.SmartMessageBox({
					title : "Confirm Delete",
					content : "Deletion of sequence can not be reversed",
					buttons : '[Cancel][Delete]'
				}, function(ButtonPressed) {
					if (ButtonPressed === "Delete") {
						window.location = deletepath;
					}
					if (ButtonPressed === "Cancel") {
						
					}
		
				});
				// Progressive enchancement
				e.preventDefault();
			})

});

</script>


@endsection		