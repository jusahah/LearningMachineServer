@extends('layouts/main')

@section('content')




<div class="jarviswidget">
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
				<header role="heading">
				
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Create New Category </h2>				
					
				
				</header>

				<!-- widget div-->
				<div role="content">
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form id="order-form" action="{{route('category.store')}}" method="POST"class="smart-form" novalidate="novalidate">
							{!! csrf_field() !!}
							<header>
								Fill Category Details
							</header>

							<fieldset>
								<div class="row">
									<section class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label class="label">Name</label>
										<label class="input"> <i class="icon-append fa fa-pencil"></i>
											<input type="text" name="name" placeholder="Name">
										</label>
									</section>
									<section class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label class="label">Parent Category</label>
										<label class="select">
											<select name="parentid">
												<option value="0" selected="">(None)</option>
												@foreach ($flattened as $arr)
													<option value="{{$arr['category']->id}}">{{$arr['category']->name}}</option>
												@endforeach
											
											</select> <i></i> </label>
									</section>
								</div>

							</fieldset>

							<footer>
								<button type="submit" class="btn btn-success">
									Create
								</button>
							</footer>
						</form>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>


@endsection			