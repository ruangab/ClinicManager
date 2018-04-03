<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Hospitalar - Recepção</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link href="../assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body>
    <!-- menu -->
    <?php 
        require_once("menu.php");
        require("../connections/crud_Recep.php");

     ?>
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <div class="container">
              <div class="login-form">
               
                      <div class="card-header"><h3>Dados do paciente</h3></div>
                      <div class="card-body card-block">
                        <form action="recepcao.php" method="POST">
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Nome do paciente</label>
                            <input type="text" name="nome"  id="company" placeholder="Enter your company name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="vat" class=" form-control-label">Número do cartão do sus</label>
                            <input type="text" name="sus" id="vat" placeholder="DE1234567890" class="form-control">
                        </div>
                        <div class="row form-group">
                          <div class="col-8">
                            <div class="form-group">
                                <label for="city" class=" form-control-label">Idade</label>
                                <input type="text" name="idade" id="city" placeholder="Enter your city" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="city" class=" form-control-label">Sexo</label>
                                <input type="text" name="sexo" id="city" placeholder="Enter your city" class="form-control">
                            </div>
                          </div>
                          <div class="col-8">
                            <div class="form-group">
                                <label for="postal-code" class=" form-control-label">Peso</label>
                                <input type="text" name="peso" id="postal-code" placeholder="Postal Code" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="vat" class=" form-control-label">Naturalidade</label>
                            <input type="text" name="natu" id="vat" placeholder="DE1234567890" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="vat" class=" form-control-label">Profissão</label>
                            <input type="text" name="prof" id="vat" placeholder="DE1234567890" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="vat" class=" form-control-label">RG</label>
                            <input type="text" name="rg" id="vat" placeholder="DE1234567890" class="form-control">
                        </div>
                      <button type="submit" class="btn btn-danger">Salvar</button>
                    </form>
                    </div>
                  </div>
                </div>
                
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>


    <script src="../assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/widgets.js"></script>
    <script src="../assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="../assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="../assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
