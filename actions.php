<?php
/**
 * cette fonction a pour but de générrer une chaine de caractère aléatoire,
 * on utilise cette fonction pour renommer nos fichiers uploadés
 * @return string
 */
function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

if(isset($_POST['action'])){
    switch($_POST['action']){
        case "add_cat":
            if(isset($_POST['name']) && $_POST['name']!=""){
                $cat_name       = $_POST['name'];
                $reponse        = $bdd->prepare('INSERT INTO tp_categorie (name) VALUE (:cat_name)');
                $reponse->execute(array('cat_name' => $cat_name));
            }
            break;
        case "add_file":
            if(isset($_POST['name']) && $_POST['name']!="" && isset($_POST['cat_id']) && $_POST['cat_id']!=""){
                $name       = $_POST['name'];
                $cat_id     = $_POST['cat_id'];
                $reponseadd = false;
                if(isset($_FILES['file_name'])){
                    $info       = pathinfo($_FILES['file_name']['name']);
                    $ext        = $info['extension']; // get the extension of the file
                    $newname    = RandomString().'.'.$ext;
                    $target     = 'uploads/'.$newname;
                    $result_upload  = move_uploaded_file( $_FILES['file_name']['tmp_name'], $target);
                    if($result_upload){
                        $reponse        = $bdd->prepare('INSERT INTO tp_document (cat_id,file_name,name) VALUE (:cat_id,:file_name, :file_display_name)');
                        $reponseadd     = $reponse->execute(array(
                                                    'cat_id'                => $cat_id
                                                    ,'file_name'            => $newname
                                                    ,'file_display_name'    => $name
                                            ));

                    }

                    if($reponseadd){
                        echo '<div class="alert alert-success" role="alert">Le fichier à été ajouté avec succès</div>';
                    }else{
                        echo '<div class="alert alert-danger" role="alert">Erreur lors de l\'ajout du fichier!!!</div>';
                    }
                }
            }else{
                echo '<div class="alert alert-danger" role="alert">Vous devez remplir tous les champs!!!</div>';
            }
        break;
    }
}
if(isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "delete_cat":
            if (isset($_GET['id']) && $_GET['id'] != "") {
                $cat_id = $_GET['id'];
                $reponse    = $bdd->prepare('DELETE FROM tp_categorie WHERE id = :cat_id');
                $result     = $reponse->execute(array('cat_id' => $cat_id));
                if($result){
                    echo '<div class="alert alert-success" role="alert">La catégorie à été supprimé avec succès</div>';
                }else{
                    echo '<div class="alert alert-danger" role="alert">Erreur lors de la suppression da la catégorie!!!</div>';
                }

            }
        break;
        case "delete_file":
            if (isset($_GET['id']) && $_GET['id'] != "") {
                $file_id    = $_GET['id'];
                //on supprime le fichier du serveur
                $reponse    = $bdd->query('SELECT * FROM tp_document WHERE id = '.$file_id);
                foreach($reponse as $item){
                    $file_physique  = $item['file_name'];
                    unlink('uploads/'.$file_physique);
                }

                //on supprime la données de la BDD
                $reponse    = $bdd->prepare('DELETE FROM tp_document WHERE id = :file_id');
                $result     = $reponse->execute(array('file_id' => $file_id));
                if($result){
                    echo '<div class="alert alert-success" role="alert">Le fichier à été supprimé avec succès</div>';
                }else{
                    echo '<div class="alert alert-danger" role="alert">Erreur lors de la suppression du fichier!!!</div>';
                }
            }
        break;
    }
}
