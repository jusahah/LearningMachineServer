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
							<td><strong>Luo kysymys</strong></td>
							
							<td>
							<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#questionAddModal">Uusi kysymys</button>
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


<!-- Modal -->
<div class="modal fade" id="questionAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Kysymyksen luonti</h4>
      </div>
      <div class="modal-body">
     
		<form class="smart-form" method="POST" action="{{route('question.store')}}">
			{!! csrf_field() !!}
		<fieldset>
			<input type="hidden" name="item_id" value="{{$item->id}}">
			
			<section>
				<label class="label">Syötä nimi</label>
				<label class="input ">
					<input type="text" class="input" name="name">
				</label>
			</section>
			<section>
				<label class="label">Syötä kysymysteksti</label>
				<label class="input ">
					<textarea type="text" class="form-control" rows="4" name="question"></textarea>
				</label>
			</section>		
			<section>
				<label class="label">Syötä vastausteksti</label>
				<label class="input ">
					<textarea type="text" class="input form-control" rows="4" name="answer"></textarea>
				</label>
			</section>								
		</fieldset>

		<footer>
			<button type="submit" class="btn btn-primary">
				Luo
			</button>
		</footer>
		</form>
	
      </div>

    </div>
  </div>
</div>

				