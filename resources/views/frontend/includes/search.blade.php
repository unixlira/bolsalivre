	<div id="search">
		<div class="container">
			<div class="wrapper" id="produtos_fixed">
				<div class="row">
					<div class="col">
						<p>Clique nos botões abaixo e inicie sua busca para começar a poupar agora mesmo</p>
					</div>
				</div>
				<div class="row">
					<div class="text-center" style="margin: 0 auto;" role="group" >
							@php
								$produtos = App\Product::all();
							@endphp
							
						{{-- @php dd($produtos) @endphp --}}
						@foreach($produtos->sortBy('id') as $produto)
							<a href="/busca?bairro=&valor=0%3B1000&segmento={{ $produto->id }}&serie=&instituicao=" class="btn btn-primary" style="margin-top: 5px; margin-bottom: 5px; font-size: 13px;">{{ $produto->name }}</a>
						@endforeach
					</div>
				</div>
				<div id="logo-fixed">
					<img src="/front/img/logotipo_bolsalivre.png" >
				</div>
			</div>
		</div>
	</div>