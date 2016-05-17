@extends('layouts/main')

@section('content')

<div class="well well-sm">
<h1>Items by Tag (<a href="">{{$tag->name}}</a>)</h1>
<hr>
							<!-- Timeline Content -->
							<div class="smart-timeline">
								<ul class="smart-timeline-list">

									@foreach($tag->items as $item)
										@include('tags/item_templates/' . $item->actualType())
									@endforeach
									
								</ul>
							</div>
							<!-- END Timeline Content -->
				
						</div>

@endsection						