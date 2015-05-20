<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        <link rel="icon" type="image/png" href="{{ asset('/img/logo_tab.png') }}">


		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			img {
			    width: 33.3%;
			    margin: auto;
			}

			.title {
				font-size: 4rem;
				margin-bottom: 40px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
                <img src="{{ asset('img/logo.svg') }}" alt="Kinder -und Jugenförderungen"/>
				<div class="title">
				    <h4>{{ trans('app.404-line-1') }}</h4>
				    <p>{{ trans('app.404-line-2') }}</p>
				</div>
			</div>
		</div>
	</body>
</html>
