@extends('layouts/main')

@section('content')
	@include('items.image.single', [
		'item' => $item, 
		'concreteItem' => $concreteItem
	]);
@endsection