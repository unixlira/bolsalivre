@extends('frontend.layouts.main')

@section('head')
    @parent
@endsection

@section('id_body', 'page')
@section('class_body', 'single register')

@section('header')
    @parent
@endsection

@section('content')

<section id="banner">
		<div class="container">
				<div class="row">
						<div class="col my-auto">
								<h2 class="text-center">Pagamento</h2>
						</div>
				</div>
		</div>
</section> 

@include('frontend.includes.search')
<section id="content">
	
</section>
@endsection
