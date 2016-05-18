@extends('layouts/main')

@section('content')

<div class="well well-sm">
<h1>Items by Category (<a href="">{{$category->name}}</a>)</h1>
<hr>
							<!-- Timeline Content -->
							<div class="smart-timeline">
								<ul class="smart-timeline-list">

									@foreach($category->allItems() as $item)
										<!-- We reuse tag item template for now -->
										@include('tags/item_templates/' . $item->actualType())
									@endforeach
									
								</ul>
							</div>
							<!-- END Timeline Content -->
				
						</div>

@endsection						