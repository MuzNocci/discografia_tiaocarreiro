<!doctype html>
<html lang="pt-br" data-bs-theme="auto">
	
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Supliu Teste - Discografia Tião Carreiro e Pardinho">
        <meta name="author" content="Müller Nocciolli">

        <title>Discografia - Tião Carreiro e Pardinho</title>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href="/assets/css/style.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    </head>

	<section class='head'>
		<header>
			<div class="container" style="text-align:right;margin-bottom:10px;">
				<form action="/logout" method="POST">@csrf Olá, {{ Auth::user()->name }}! Deseja <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>?</form>
			</div>
			<div class="container d-flex flex-wrap justify-content-center">
				<a href="/dashboard/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto">
					<span class="fs-4 logo"><img src="/assets/img/logo.png"></span>
				</a>
				<form action="/dashboard/" method="GET" class="col-auto col-lg-4 mb-lg-0 search">
					<input name="search" id="search" type="search" class="form-control" placeholder="Pesquisar faixa?" aria-label="Search">
				</form>
			</div>
		</header>
	</section>
    
	<section class='body'>
		<div class="">
			<a href="/dashboard/adicionar/album/" class="btn btn-primary mt-2 mb-2">Adicionar Álbum</a> <a href="/dashboard/adicionar/musica/" class="btn btn-primary mt-2 mb-2">Adicionar Música</a>
		</div>
		@foreach ($albums as $album)
			@if (in_array($album->id,$album_auth, true) || $search == "")
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col" colspan="3"><b>Álbum:</b> {{$album->nome}}, {{$album->lancamento}}</th>
						<th scope="col" style="width:60px;"><a href="/dashboard/editar/album/{{$album->id}}"><button type="button" title="Editar" alt="Editar" class="btn btn-primary btn-sm" style="height:30px;">E</button></a> | <a href="/dashboard/excluir/album/{{$album->id}}"><button type="button" title="Excluir" alt="Excluir" class="btn btn-danger btn-sm" style="height:30px;">X</button></a></th>
					</tr>
					<tr>
						<th scope="col" style="width:40px;">Nº</th>
						<th scope="col">Faixa</th>
						<th scope="col" style="width:60px;">Duração</th>
						<th scope="col" style="width:90px;">Ações</th>
					</tr>
				</thead>
				@foreach ($musicas as $musica)
					@if ($album->id == $musica->album)
					<tbody>
						<tr>
							<td>{{$musica->faixa}}</td>
							<td>{{$musica->nome}}</td>
							<td>{{$musica->duracao}}</td>
							<td><a href="/dashboard/editar/musica/{{$musica->id}}"><button type="button" title="Editar" alt="Editar" class="btn btn-primary btn-sm" style="height:30px;">E</button></a> | <a href="/dashboard/excluir/musica/{{$musica->id}}"><button type="button" title="Excluir" alt="Excluir" class="btn btn-danger btn-sm" style="height:30px;">X</button></a></td>
						</tr>
					</tbody>
					@endif
				@endforeach
			</table>
			@endif
		@endforeach

		@if ($registros == 0)

		<table style="margin-top:30px;margin-bottom:30px;">
			<tr>
				<th colspan="4">Não encontramos nenhuma música, pesquisando por <b>"{{$search}}"</b>.</th>
			</tr>
		</table>

		@endif
	</section>

</html>