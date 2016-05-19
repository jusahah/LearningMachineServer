<div class="sequencetemplate" data-offset="{{$i}}" data-sequencetype="question"  style="">
	
<div class="well bg-color-darken">
	<h1 style="color: white; font-size: 24px;">{{$item->name}}</h1>
	<hr>
	<p style="color: white;">{{$item->printFullSummary()}}

	<div class="well" style="min-height: 180px; max-height: 480px; overflow-y: auto;">
		<h1>Note</h1>
		{{$concreteItem->note}}
	</div>

</div>

</div>