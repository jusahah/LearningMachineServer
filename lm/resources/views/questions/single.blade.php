@extends('layouts/main')

@section('content')
<div class="well">
	<h1>Kysymys</h1>
	
	<div class="bg-color-darken well" style="color: white;">
		<strong>Kysymys: </strong> {{$question->name}}
	</div>
	<hr>
	<div class="row">
			
		
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="custom-scroll table-responsive">
				

				<table class="table table-bordered">
					
					<tbody>
						<tr>
							<td><strong>Nimi</strong></td>
							
							<td>{{$question->questionPreview()}}</td>
						</tr>
						<tr>
							<td><strong>Kuuluu muistiinpanoon</strong></td>
							
							<td>{{$question->item->name}}</td>
						</tr>

						<tr>
							<td><strong>Vastauksia annettu</strong></td>
							
							<td>
							{{$question->answers->count()}} kpl
								

							</td>
						</tr>
						<tr>
							<td><strong>Slideshowt</strong></td>
							
							<td>
							{{$question->sequencesQuestionIsMemberOf()->count()}} kpl <span style="font-size: 14px;">(<a href="">Näytä slideshowt</a>)</span>
							</td>
						</tr>
					</tbody>
				</table>
			
			</div>
		
		</div>
		
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
	
		<div class="well" style="min-height: 180px;">

				<div class="table-responsive">
				
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Vastaus</th>
								<th>Oikein/Väärin</th>
								<th>Vastaus annettu</th>
								<th>Lue koko vastaus</th>
							</tr>
						</thead>
						<tbody>
							@foreach($question->getAnswersByDate() as $answer)
							<tr>
								<td>{{$answer->answerPreview()}}</td>
								<th>{{$answer->isCorrect() ? 'Kyllä' : 'Ei'}}</th>
								<th>{{$answer->printCreatedAt()}}</th>
								<td><button class="btn btn-xs btn-primary" href="">Lue</button></td>
					
				
							</tr>
							@endforeach

						</tbody>
					</table>
					
				</div>			

		</div>
		</div>

	</div>	

	
</div>	
@endsection