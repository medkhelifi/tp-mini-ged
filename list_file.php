<a href="?act=add_file" class="btn btn-success btn-sm" role="button">Ajouter un document</a>

<table class="table">
    <thead>
    <th>#</th>
    <th>Nom du document</th>
    <th>Action</th>
    </thead>
    <tbody>
    <?php
    if(isset($_GET['cat_id'])){
        $cat_id     = $_GET['cat_id'];
        //on verifie en premier lieu que cette catégorie existe dans la BDD
        $categorie  = $bdd->prepare("SELECT * FROM tp_categorie WHERE id= :cat_id");
        $categorie->execute(array('cat_id'=>$cat_id));
        if($categorie->rowCount()>0){
            //On récupère tous les fichiers de cette catégorie
            $reponse    = $bdd->prepare('SELECT * FROM tp_document WHERE cat_id = :cat_id ORDER BY name ASC');
            $reponse->execute(array('cat_id' => $cat_id));

            foreach($reponse as $item){
                echo '<tr>';
                echo '<td>'.$item['id'].'</td>';
                echo '<td><a download href="uploads/'.$item['file_name'].'">'.$item['name'].'</a></td>';
                echo '<td><a class="btn btn-danger" href="?action=delete_file&id='.$item['id'].'"><i class="icon-trash icon-white"></i>X</a></td>';
                echo '</tr>';
            }
        }else{
            echo "Aucune catégorie n'a été retrouvé avec cet identifiant";
        }
    }
    ?>
    </tbody>
</table>

