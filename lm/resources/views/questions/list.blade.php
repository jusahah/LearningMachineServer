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
								<td><a href="{{route('item.show', ['item' => $question->item->id])}}">{{$question->item->name}}</a></td>
								<td><a href="{{route('category.show', ['category' => $question->item->category->id])}}">{{$question->item->category->name}}</a></td>
								<td>{{$question->questionPreview()}}</td>
								<td>{{$question->printCreatedAt()}}</td>
								<td>{{$question->lastAnswerTime()}}</td>
								<td>{{$question->answerCount()}}</td>
								<td>{{$question->correctPercent()}}</td>
								<td><a class="btn btn-xs btn-primary" href="{{route('question.show', ['question' => $question->id])}}">Open</a></td>
								<td><a class="btn btn-danger btn-xs deletequestion" href="{{route('question.customdelete', ['question' => $question->id])}}" data-deletepath="{{route('question.customdelete', ['question' => $question->id])}}">Poista</a></td>
					
				
							</tr>
							@endforeach

						</tbody>
						{!! $questions->render() !!}
					</table>
					
				</div>
			</div>
			<!-- end widget content -->

		</div>
		<!-- end widget div -->

	</div>

@endsection	