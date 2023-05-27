<!doctype html>
<html lang="pt-br" data-bs-theme="auto">
	
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Supliu Teste - Discografia Tião Carreiro e Pardinho">
        <meta name="author" content="Müller Nocciolli">

        <title>Discografia - Tião Carreiro e Pardinho</title>

		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">

    </head>

	<section class='head'>
		<header>
			<div class="container d-flex flex-wrap justify-content-center">
				<a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto">
					<span class="fs-4 logo"><img src="assets/img/logo.png"></span>
				</a>
				<form action="/" method="GET" class="col-auto col-lg-4 mb-lg-0 search">
					<input name="search" id="search" type="search" class="form-control" placeholder="Qual música deseja ouvir?" aria-label="Search">
				</form>
			</div>
		</header>
	</section>
    
	<section class='body'>
		@foreach ($albums as $album)
			@if (in_array($album->id,$album_auth, true) || $search == "")
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col" colspan="3"><b>Álbum:</b> {{$album->nome}}, {{$album->lancamento}}</th>
					</tr>
					<tr>
						<th scope="col" style="width:40px;">Nº</th>
						<th scope="col">Faixa</th>
						<th scope="col" style="width:60px;">Duração</th>
					</tr>
				</thead>
				@foreach ($musicas as $musica)
					@if ($album->id == $musica->album)
					<tbody>
						<tr>
							<td>{{$musica->faixa}}</td>
							<td>{{$musica->nome}}</td>
							<td>{{$musica->duracao}}</td>
						</tr>
					</tbody>
					@endif
				@endforeach
			</table>
			@endif
		@endforeach

		@if ($registros == 0)

		<table class="">
			<tr>
				<th colspan="4">Não encontramos nenhuma música, pesquisando por <b>"{{$search}}"</b>.</th>
			</tr>
		</table>

		@endif
	</section>

</html>

