<?php
/**
 * tp mini GED
 * created by: Mohamed KHELIFI <mohamedchrif.khelifi@gmail.com>
 */

session_start();
include_once('db.php');

?>
<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <title>TP MINI GED</title>
</head>
<body>
<div class="container">
<?php
    if(isset($_POST['email']) && isset($_POST['password'])){
        $post_email   = $_POST['email'];
        $post_password   = $_POST['password'];

        $monfichier = fopen('secret.txt', 'r');
        $first_name = trim(fgets($monfichier));
        $last_name  = trim(fgets($monfichier));
        $email      = trim(fgets($monfichier));
        $password   = trim(fgets($monfichier));
        fclose($monfichier);
        if($password == $post_password && $post_email == $email){
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name']  = $last_name;
            $_SESSION['email']      = $email;
            $_SESSION['password']   = $password;

        }else{
            echo '<div class="alert alert-danger" role="alert">Email ou Mot de passe erroné</div>';
        }

    }
    if(isset($_SESSION['email'])){
    ?>
        <div class="bs-example">
            <nav role="navigation" class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header ">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand">Bonjour <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'];?></span>
                    <ul class="nav navbar-nav">
                        <li><a href="?act=add_cat">Ajouter une catégorie</a></li>
                        <li><a href="?act=add_file">Ajouter un fichier</a></li>
                    </ul>
                </div>
                <!-- Collection of nav links and other content for toggling -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="?logout">Déconnexion</a></li>
                    </ul>
                </div>
            </nav>
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Liste des Catégories</h3>
                        </div>
                        <ul class="list-group">
                            <?php
                            $reponse = $bdd->query('SELECT * FROM tp_categorie');
                            foreach($reponse as $item){
                                $active = "";
                                if(isset($_GET['cat_id']) && $_GET['cat_id']==$item['id']) $active = "active";
                                echo '<a href="?act=list_file&cat_id='.$item['id'].'" class="list-group-item '.$active.'">'.$item['name'].'</a>';
                            }

                            ?>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-8">.col-sm-4</div>
            </div>
        </div>
    <?php
    }else{
        include_once('login.php');
    }

?>
</div>
</body>
</html>