@include('play/item_templates/' . $sequenceable->sequenceable->actualType(), [
	'item' => $sequenceable->sequenceable,
	'concreteItem' => $sequenceable->sequenceable->itenable
])
