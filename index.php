<?php 
	require_once("vendor/autoload.php");
	require_once("connections/BancoDeDados.php");
    require_once("connections/Usuario.php");


	$app = new \Slim\Slim();
	
	$app->get('/', function(){

		require_once("site_component/login.php");

	});

	$app->post('/usuario', function () {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$type_user = $_POST['type_user'];

		$usuario = new Usuario();

		$usuario->setNomeusu($user);
		$usuario->setSenha($pass);
		$usuario->setTipoUsuario($type_user);

		$usuario->insert();


	});
	
	$app->get('/hellow/:name', function ($name) use($app) {
	    echo "Hello, " . $name;
	});

	$app->get('/user/:user', function ($user){
		echo "Olá, " . $user;
	});

	$app->run();


 ?>