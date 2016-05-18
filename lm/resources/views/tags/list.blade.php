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
									<h2>Your Tags</h2>

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
										
										<ul>
										@foreach($tags as $tag)
											<li class="itemtag">
												<a class="itemtaglink" href="{{route('tag.show', ['tag' => $tag->id])}}">{{$tag->name}}</a>
											</li>
										@endforeach

										</ul>
									</div>
									<!-- end widget content -->

								</div>
								<!-- end widget div -->

							</div>

@endsection	