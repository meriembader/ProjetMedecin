modifieroccupation.php

<?php
  include_once "../../../controller/occupationController.php";
 include_once "../../../model/occupation.php";


  function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'projetmedecin';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
$msg = '';
$pdo = pdo_connect_mysql();
// Check if the reclamation id exists, for example update.php?id=1 will get the reclamation with the id of 1
if (isset($_GET['idoccupation'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
      //  $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $idpatient = isset($_POST['idpatient']) ? $_POST['idpatient'] : '';
        $idchambre = isset($_POST['idchambre']) ? $_POST['idchambre'] : '';
        $date1 = isset($_POST['date1']) ? $_POST['date1'] : '';
        
     
        // Update the record
        $stmt = $pdo->prepare('UPDATE reservation SET  idpatient = ?, idchambre = ?, date1 = ?  WHERE idoccupation = ?');
        $stmt->execute([ $idpatient, $idchambre, $date1,  $_GET['idoccupation']]);
        $msg = 'Updated Successfully!';
    }
    // Get the reclamation from the reclamations table
 $stmt = $pdo->prepare('SELECT * FROM reservation WHERE idoccupation = ?');
   $stmt->execute([$_GET['idoccupation']]);
  $occupation = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$occupation) {
       exit('occupation doesn\'t exist with that id!');
    }
} 
else {
    exit('No id specified!');
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-orange
 ">
    <!-- Page Loader -- >
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">recherche</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->

    <nav class="navbar">

        <div class="container-fluid">
            <div class="navbar-header">

                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                  <div class="logo2"><img src="logo2.png" height="50" width="50"alt="IMG"></div>
                <a href="javascript:void(0);" class="bars"></a>

                
            </div>

           
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                    
                    
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">5</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 nouveaux visiteurs</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                   
                                   
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b> Maria </b> a laissé un message </h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> il y'a deux minutes
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Med Taib </b> a laissé un message </h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> il y'a 4 minutes
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Asma</b> a laissé un message</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> il y'a 3 heures
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                     <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Sinda</b> a supprimé son commentaire</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> il y'a 4 heures
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">voir tous les notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    
                
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user3.jpg" width="52" height="52" alt="User" />
                </div>
                       <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><B><font size="3pt"> Lamis Hm
                    </font> </B></div>
                    <div class="email">lamishammemi65@gmail.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profil</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Abonnés</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Se déconnecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">NAVIGATION PRINCIPALE</li>
                    <li class="active">
                        <a href="index.html">
                            <i class="material-icons">home</i>
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/typography.html">
                            <i class="material-icons">text_fields</i>
                            <span>A propos</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Nos équipes médicales</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/tables/normal-tables.html">Les médecins</a>
                            </li>
                            <li>
                                <a href="pages/tables/jquery-datatable.html">Les infirmiers</a>

                            </li>
                           
                           
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">perm_media</i>
                            <span>Nos chambres</span>
                        </a>
                        <ul class="ml-menu">
                            
                            <li>
                                <a href="Views/chambre.php">Gestion Chambre</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Pour contacter</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/examples/sign-in.html">se connecter</a>
                            </li>
                           
                            <li>
                                <a href="pages/examples/forgot-password.html">mot de passe oublié</a>
                            </li>
                            <li>
                                <a href="pages/examples/404.html">404 - non trouvée</a>
                            </li>
                            <li>
                                <a href="pages/examples/500.html">500 - erreur</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">map</i>
                            <span>Nos événements</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/maps/google.html">Google Map</a>
                            </li>
                            <li>
                                <a href="pages/maps/yandex.html">YandexMap</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="pages/changelogs.html">
                            <i class="material-icons">update</i>
                            <span>Changelogs</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 - 2021 <a href="javascript:void(0);">AdminLH-SEIN SAIN centre</a>.
                </div>
            </div>
            <!-- #Footer -->
            
        </aside>
        
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <center><h1>Gestion des réservations</h1> </center>
                <br> <br>
               <form action="modifieroccupation.php?idoccupation=<?=$occupation['idoccupation']?>" method="post">
        <div class="table-responsive table--no-card m-b-30">
        <tr>
            <td>Id_Patient</td>
            <td><input type='text' name='idpatient' value ="<?php echo $occupation['idpatient'];?>" class='form-control' required/></td>
        </tr>
        <tr>
            <td>ID_Chambre</td>
            <td><input type='text' name='idchambre'  value ="<?php echo $occupation['idchambre'];?>" class='form-control' required /></td>
        </tr>

        <tr>
            <td>Date de réservation</td>
     
            <td><input type="datetime-local" name="date1"  value="<?=date('Y-m-d\TH:i')?>"  class="form-control" placeholder="Left Font Awesome Icon" required >
        </td>
        </tr>
        
        
     
       
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Enregistrer' class='btn btn-primary' />
                <a href='ajouteroccupation.php' class='btn btn-danger'>Retour</a>
            </td>
        </tr>
    </table>
</form>
<?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>

      <?php
  
  ?>




                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../plugins/flot-charts/jquery.flot.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>