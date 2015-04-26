<?php
if(isset($_POST['action'])){
    switch($_POST['action']){
        case "add_cat":
            if(isset($_POST['name']) && $_POST['name']!=""){
                $cat_name       = $_POST['name'];
                $reponse    = $bdd->prepare('INSERT INTO tp_categorie (name) VALUE (:cat_name)');
                $reponse->execute(array('cat_name' => $cat_name));
            }
            break;
        case "add_file":
            if(isset($_POST['name']) && $_POST['name']!="" && isset($_POST['cat_id']) && $_POST['cat_id']!=""){
                $name       = $_POST['name'];
                $cat_id     = $_POST['cat_id'];
                if(isset($_FILES['file_name'])){
                    $info       = pathinfo($_FILES['file_name']['name']);
                    $ext        = $info['extension']; // get the extension of the file
                    $newname    = "newname.".$ext;
                    echo $newname;

                    $target     = 'uploads/'.$newname;
                    move_uploaded_file( $_FILES['file_name']['tmp_name'], $target);
                }
            }
        break;
    }
}
if(isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "delete_cat":
            if (isset($_GET['id']) && $_GET['id'] != "") {
                $cat_id = $_GET['id'];
                $reponse = $bdd->prepare('DELETE FROM tp_categorie WHERE id = :cat_id');
                $reponse->execute(array('cat_id' => $cat_id));
            }
        break;
    }
}
