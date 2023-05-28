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
				<a href="/dashboard/" class="d-flex" style="text-align:right;margin-top:25px;"> 
					Voltar para o Dashboard
				</a>
			</div>
		</header>
	</section>
    
	<section class='body'>
		<form action="/dashboard/excluir/album/{{ $albums->id }}" method="POST">
			<div style="text-align:left;margin-bottom:20px;font-size:25px;">
				<h4>Você deseja excluir o álbum <b>"{{ $albums->nome }}"</b>?</h4>
			</div>
			<div style="text-align:left;margin-bottom:20px;font-size:25px;">
				<h6 style="color:#B90000;"><b>OBS:</b> Também serão exclusas as faixas cadastradas para este álbum.</h6>
			</div>
			<div class="">
				@csrf
				@method('DELETE')
					<a href="/dashboard/" class="btn btn-secondary mt-2 mb-2" style="width:120px;">Cancelar</a> 
					<button type="submit" class="btn btn-danger mt-2 mb-2" style="width:120px;">Excluir</button>
			</div>
		</form>
	</section>

</html>

