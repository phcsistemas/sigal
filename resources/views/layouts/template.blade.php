<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIGAL</title>

	@yield('link')

	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/js/bootstrap.min.js') }}" rel="script">

	<link href="{{ asset('/js/jquery.mask.min.js') }}" rel="script">
	<link href="{{ asset('/js/sigal.js') }}" rel="script">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    @yield('script')

    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script>
		//Dialog show event handler
		$('#confirmDelete').on('show.bs.modal', function (e) {
			$message = $(e.relatedTarget).attr('data-message');
			$(this).find('.modal-body p').text($message);
			$title = $(e.relatedTarget).attr('data-title');
			$(this).find('.modal-title').text($title);
			// Pass form reference to modal for submission on yes/ok
			var form = $(e.relatedTarget).closest('form');
			$(this).find('.modal-footer #confirm').data('form', form);
		});
		//Form confirm (yes/ok) handler, submits form
		$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
			$(this).data('form').submit();
		});
	</script>
</head>

<body>

<div class="tudo">
	<div class="topo">
		<nav  class="navbar navbar-inverse " style="width: 100%; border-bottom-width: 0px; border-radius: 0px ">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Navegacao</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div  id="rolling-nav"   class="nav navbar-nav navbar-left">
					<ul>
						<li ><a href="{{ url('home') }}"  data-clone="Inicio">Início</a></li>
						<li><a href="{{ url('salas') }}" data-clone="Salas">Salas</a></li>
						<li><a href="{{ url('professores') }}"data-clone="Professores">Professores</a></li>
						<li><a href="{{ url('cursos') }}"data-clone="Cursos">Cursos</a></li>
						<li><a href="{{ url('agendamentos') }}"data-clone="agendamentos">Agendamentos</a></li>
					</ul>
				</div>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></span> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Sair</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</nav>
	</div>
	<div class="conteudo">

		@yield('content')

	</div>
	<div class="rodape">

		<div class="container" >
			<p class ="navbar-text navbar-right">Sistema de Gerenciamento Auditórios e Laboratórios - CEULJI/ULBRA </p>

			<div  class ="navbar-text navbar-left"</div><span class="glyphicon glyphicon-copyright-mark"></span> &nbspCopyright 2015 -<a href="{{ url('/desenvolvedores') }}"> <span style="color: #a7abab" >Desenvolvedores</a></span>

	</div>
</div>

@yield('script')

<!-- Scripts -->
<!--gerando conflito com o jQuery do Agendamento -->
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>