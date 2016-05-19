<div class="sequencetemplate" data-offset="{{$i}}" data-sequencetype="question" data-questionid="{{$concreteItem->id}}" style="">
	
<div class="well bg-color-teal">
	<h1 style="color: white; font-size: 24px;">{{$concreteItem->question}}</h1>
	<hr>

	<form class="smart-form sequenceform questionform" data-questionid="{{$concreteItem->id}}" data-evaltype="self">

		<fieldset>
			
			<section>
				<label class="label">Kirjoita vastaus</label>
				<label class="input state-disabled">
					<input type="text" class="input-sm vastausinput">
				</label>
			</section>



		<footer>
			<button type="submit" class="btn submitanswer btn-default">
				Arvostele
			</button>

		</footer>
		<p id="correctanswer" style="display: none;">{{$concreteItem->answer}}</p>
	</form>



</div>

</div>