@extends('layouts/main')

@section('content')	

	<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">

		<header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>Your Study Items</h2>

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
								<th>Muistiinpano</th>
								<th>Kategoria (muistiinpano)</th>								
								<th>Kysymys</th>
								<th>Kysymystyyppi</th>
								<th>Vastaus</th>
								<th>Luotu</th>
								<th>Viimeksi kysytty</th>
								<th>Vastauksia</th>
								<th>Oikein %</th>
								<th>Avaa</th>
								<th>Poista</th>
							</tr>
						</thead>
						<tbody>
							@foreach($questions as $question)
							<tr>
								<td>{{$question->item->name}}</td>
								<td>{{$question->item->category->name}}</td>
								<td>{{$question->question}}</td>
								<td>{{$question->type}}</td>
								<td>{{$question->answer}}</td>
								<td>{{$question->printCreatedAt()}}</td>
								<td>{{$question->lastAnswerTime()}}</td>
								<td>{{$question->answerCount()}}</td>
								<td>{{$question->correctPercent()}}</td>
								<td><a class="btn btn-xs btn-primary" href="{{route('question.show', ['question' => $question->id])}}">Open</a></td>
								<td><a class="btn btn-danger btn-xs deletequestion" href="{{route('question.customdelete', ['question' => $question->id])}}" data-deletepath="{{route('question.customdelete', ['question' => $question->id])}}">Poista</a></td>
					
				</button></td>
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