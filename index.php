<?php 
	require_once("vendor/autoload.php");
	require_once("connections/BancoDeDados.php");
    require_once("connections/Usuario.php");
    require_once("connections/Paciente.php");


	$app = new \Slim\Slim();

	use Rain\Tpl;
	
	$config = array(
    "tpl_dir"       => "site_component/",
    "cache_dir"     => "cache/",
    "debug"         => true, // set to false to improve the speed
	);

	Tpl::configure( $config );

// --------------------------------------Área de login da pagina------------------------------------------
	$app->get('/', function() use($app){
		
		$tpl = new Tpl();

		$tpl->draw('login');

	});
	$app->post('/', function() use($app){

		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$usuario = new Usuario();

		$login = $usuario->select($user, $pass);
		
		if($login == true){
		
			$tpl = new Tpl();

			$tpl->draw('inicio');

		}

	});
		
	$app->post('/registro', function () use($app){

		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$type_user = $_POST['type_user'];

		$usuario = new Usuario();

		$usuario->setUser($user);
		$usuario->setPass($pass);
		$usuario->setTypeUser($type_user);

		$usuario->insert();

		

	});



// --------------------------------------inicio da pagina-------------------------------------------------
	$app->post('/inicio', function(){

			$tpl = new Tpl();

			$tpl->draw('inicio');
			
	});
	
	$app->get('/recepcao', function() use($app){

		$tpl = new Tpl();

		$tpl->draw('recepcao');

	});
	$app->post('/recepcao', function() use($app){

		$idsus = $_POST['idsus'];
		$name_patient = $_POST['name_patient'];
		$peso = $_POST['peso'];
		$idade = $_POST['idade'];
		$altura = $_POST['altura'];
		$descricao = $_POST['descricao'];

		$paciente = new Paciente();

		$paciente->setIdsus($idsus);
		$paciente->setName_patient($name_patient);
		$paciente->setPeso($peso);
		$paciente->setIdade($idade);
		$paciente->setAltura($altura);
		$paciente->setDescricao($descricao);

		$paciente->insert();

	});

	$app->get('/inicio', function(){

		$tpl = new Tpl();

		$tpl->draw('inicio');

	});

	$app->post('/usuario/register', function () {

		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$type_user = $_POST['type_user'];

		$usuario = new Usuario();

		$usuario->setUser($user);
		$usuario->setPass($pass);
		$usuario->setTypeUser($type_user);

		$usuario->insert();

		

	});

	$app->post('/usuario/update', function () {

		$id = $_POST['id'];		
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$type_user = $_POST['type_user'];

		$usuario = new Usuario();

		$usuario->update($id, $user, $pass, $type_user);

		
	});

	$app->post('/usuario/delete', function () {

		$id = $_POST['id_user'];		

		$usuario = new Usuario();

		$usuario->delete($id);

	});


	$app->get('/usuario/select', function (){

		$usuario = new Usuario();

		var_dump($usuario->select(1));

	});

	$app->post('/add_paciente', function () {

		$idsus = $_POST['idsus'];
		$name_patient = $_POST['name_patient'];
		$peso = $_POST['peso'];
		$idade = $_POST['idade'];
		$altura = $_POST['altura'];
		$descricao = $_POST['descricao'];

		$paciente = new Paciente();

		$paciente->setIdsus($idsus);
		$paciente->setName_patient($name_patient);
		$paciente->setPeso($peso);
		$paciente->setIdade($idade);
		$paciente->setAtura($altura);
		$paciente->setDescricao($descricao);

		$paciente->insert();

	});

	$app->post('/update_paciente', function() { 

		$idsus = $_POST['idsus'];
		$name_patient = $_POST['name_patient'];
		$peso = $_POST['peso'];
		$idade = $_POST['idade'];
		$altura = $_POST['altura'];
		$descricao = $_POST['descricao'];

		$paciente = new Paciente();

		$paciente->update($idsus, $name_patient, $peso, $idade, $altura, $descricao );

	});

	$app->post('/delete_paciente', function () {

		$idsus = $_POST['idsus'];		

		$paciente = new Paciente();

		$paciente->delete($id);

	});

	$app->run();


 ?>