<div class="well">
	<h1>{{$item->name}}</h1>
	
	<div class="bg-color-darken well" style="color: white;">
		<strong>Summary: </strong> {{$item->printFullSummary()}}
	</div>
	<hr>
	<div class="row">
			
		
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="custom-scroll table-responsive">
				

				<table class="table table-bordered">
					
					<tbody>
						<tr>
							<td><strong>Nimi</strong></td>
							
							<td>{{$item->name}}</td>
						</tr>
						<tr>
							<td><strong>Kategoria</strong></td>
							
							<td>{{$item->category->name}}</td>
						</tr>
						<tr>
							<td><strong>Tagit</strong></td>
							
							<td>
							@foreach($item->tags as $tag)
								<a class="itemtaglink" href="{{route('tag.show', ['tag' => $tag->id])}}">{{$tag->name}}</a>

							@endforeach
								

							</td>
						</tr>
						<tr>
							<td><strong>Kysymyksiä</strong></td>
							
							<td>
							{{$item->questions->count()}} kpl <span style="font-size: 14px;">(<a href="{{route('item.questions.index', ['item' => $item->id])}}">Näytä kysymykset</a>)</span>
								

							</td>
						</tr>
						<tr>
							<td><strong>Slideshowt</strong></td>
							
							<td>
							{{$item->sequencesItemIsMemberOf()->count()}} kpl <span style="font-size: 14px;">(<a href="">Näytä slideshowt</a>)</span>
							</td>
						</tr>
					</tbody>
				</table>
			
			</div>
		
		</div>
		
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
	
		<div class="well" style="min-height: 180px;">
			<h1>Note</h1>
			{{$concreteItem->note}}
		</div>
		</div>

	</div>	

	
</div>							


				