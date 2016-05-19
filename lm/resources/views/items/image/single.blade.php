							

<div class="product-content product-wrap clearfix">
	<div class="row">
			<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
				<div class="product-image"> 
					<!--<img src="data:image/jpg;base64,{{$concreteItem->thumbnail}}" alt="194x228" class="img-responsive">--> 
					<img src="https://images4.alphacoders.com/600/600528.png" alt="194x228" class="img-responsive"> 
					
				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<div class="product-deatil">
					<h1 class="name">
						<a href="#">
							{{$item->name}} 
						</a>
						<span style="font-size: 18px;">(<a href="#">{{$item->printCategory()}}</a>)</span>
						<hr>
						<h1 style="font-size: 18px;">Created: {{$item->printCreatedAt()}}</h1>
						<hr>
						<h1 style="font-size: 18px;">
						Tags: 
						<ul>
						@foreach($item->tags as $tag)
							<li class="itemtag">
								<a class="itemtaglink" href="{{route('tag.show', ['tag' => $tag->id])}}">{{$tag->name}}</a>
							</li>
						@endforeach

						</ul>
						
						</h1>
						<hr>
						<h1 style="font-size: 18px;">
						Questions: {{$item->questions->count()}} kpl <span style="font-size: 14px;">(<a href="">Show questions</a>)</span>
							
						</h1>	
						<hr>
						<h1 style="font-size: 18px;">
						In sequences: {{$item->sequencesItemIsMemberOf()->count()}} kpl <span style="font-size: 14px;">(<a href="">Show sequences</a>)</span>
							
						</h1>	
					</h1>
					<span class="tag1"></span> 
			</div>
			<div class="description">
				
			</div>

		</div>
	</div>


</div>	
<div class="well">
	<header><h1>Summary</h1></header>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<p>{{$item->printFullSummary()}} </p>
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
