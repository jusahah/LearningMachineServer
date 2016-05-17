							

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
							<li class="itemtag"><a class="itemtaglink" href="#">Javascript</a></li>
							<li class="itemtag"><a class="itemtaglink" href="#">PHP</a></li>
							<li class="itemtag"><a class="itemtaglink" href="#">Clojurescript</a></li>
							<li class="itemtag"><a class="itemtaglink" href="#">Java</a></li>
							<li class="itemtag"><a class="itemtaglink" href="#">C++</a></li>
							<li class="itemtag"><a class="itemtaglink" href="#">Haskell</a></li>
							<li class="itemtag"><a class="itemtaglink" href="#">Architecture</a></li>
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