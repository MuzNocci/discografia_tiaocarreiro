<!doctype html>
<html lang="pt-br" data-bs-theme="auto">
	
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Supliu Teste - ">
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
		<div style="text-align:left;margin-bottom:20px;font-size:25px;">
			<h4>Edite a faixa: "{{ $albums->nome }}"</h4>
		</div>
		<form action="/dashboard/editar/album/{{ $albums->id }}" method="POST">
			@csrf
			@method('PUT')
			<div class="row" style="margin-bottom:20px;">
				<div class="col-9">
					<label for="inputState">Nome</label>
					<input id="nome" name="nome" type="text" class="form-control" placeholder="Nome do Álbum" value="{{ $albums->nome }}">
				</div>
				<div class="col-3">
					<label for="inputState">Lançamento</label>
					<input id="lancamento" name="lancamento" type="text" class="form-control" placeholder="Lançamento" value="{{ $albums->lancamento }}">
				</div>
			</div>
			<div style="margin-bottom:30px;text-align:right;">
				<a href="/dashboard/" class="btn btn-secondary" style="width:120px;">Cancelar</a> <button type="submit" class="btn btn-primary" style="width:120px;">Salvar</button>
			</div>	
		</form>
	</section>

</html>

