<!doctype html>
<html lang="pt-br" data-bs-theme="auto">
	
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Supliu Teste - ">
        <meta name="author" content="Müller Nocciolli">

        <title>Discografia - Tião Carreiro e Pardinho</title>

		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
		<script src="../assets/js/script.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </head>

	<section class='head'>
		<header>
			<div class="container d-flex flex-wrap justify-content-center">
				<a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto">
					<span class="fs-4 logo"><img src="../assets/img/logo.png"></span>
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
					<th scope="col" style="width:60px;"><a><i class="bi bi-pencil-square"></i></a> | <a><i class="bi bi-pencil-square"></i></a></th>
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
					<td><a><i class="bi bi-pencil-square"></i></a> | <a><i class="bi bi-pencil-square"></i></a></td>
				</tr>
			</tbody>
			@endif
			@endforeach
		</table>
		@endforeach
	</section>

</html>

