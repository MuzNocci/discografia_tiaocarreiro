<!doctype html>
<html lang="pt-br" data-bs-theme="auto">
	
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Supliu Teste - Discografia Tião Carreiro e Pardinho">
        <meta name="author" content="Müller Nocciolli">

        <title>Discografia - Tião Carreiro e Pardinho</title>

		<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="/assets/css/fontawesome.min.css" rel="stylesheet">
        <link href="/assets/css/style.css" rel="stylesheet">

    </head>

	<section class='head'>
		<header>
			<div class="container d-flex flex-wrap justify-content-center">
				<a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto">
					<span class="fs-4 logo"><img src="/assets/img/logo.png"></span>
				</a>
				<form action="/" method="GET" class="col-auto col-lg-4 mb-lg-0 search">
					<input name="search" id="search" type="search" class="form-control" placeholder="Qual música deseja pesquisar?" aria-label="Search">
				</form>
			</div>
		</header>
	</section>
    
	<section class='body'>
		@foreach ($albums as $album)
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col" colspan="3"><b>Álbum:</b> {{$album->nome}}, {{$album->lancamento}}</th>
					<th scope="col" style="width:60px;"><a href="/admin/editar/musica"><i class="fa-solid fa-pen" alt="Editar"></i></a> | <a href="#" ><i class="fa-solid fa-trash" alt="Excluir"></i></a></th>
				</tr>
				<tr>
					<th scope="col" style="width:40px;">Nº</th>
					<th scope="col">Faixa</th>
					<th scope="col" style="width:60px;">Duração</th>
					<th scope="col" style="width:60px;">Ações</th>
				</tr>
			</thead>
			@foreach ($musicas as $musica)
			@if ($album->id == $musica->album)
			<tbody>
				<tr>
					<td>{{$musica->faixa}}</td>
					<td>{{$musica->nome}}</td>
					<td>{{$musica->duracao}}</td>
					<td><a href="/admin/editar/musica/{{ $musica->id }}"><i class="fa-solid fa-pen" alt="Editar"></i></a> | <a href="#" ><i class="fa-solid fa-trash" alt="Excluir"></i></a></td>
				</tr>
			</tbody>
			@endif
			@endforeach
		</table>
		@endforeach
	</section>

</html>

