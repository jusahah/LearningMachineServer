<div class="sequencetemplate" data-offset="{{$i}}" data-sequencetype="question" style="">
	
<div class="well bg-color-light">
	<h1 style="color: #333; font-size: 24px;">{{$item->name}}</h1>
	<hr>
	

	<div class="well" style="min-height: 180px; overflow-y: auto;">
		<img src="{{$concreteItem->imagepath}}" width="100%" height="100%">
	</div>
	<hr>
	<p style="color: #333;">{{$item->printFullSummary()}}</p>

</div>

</div>