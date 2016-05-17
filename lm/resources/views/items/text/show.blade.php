@extends('layouts/main')

@section('content')
	@include('items.text.single', [
		'item' => $item, 
		'concreteItem' => $concreteItem
	]);
@endsection