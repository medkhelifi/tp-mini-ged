<a href="?act=add_cat" class="btn btn-success btn-sm" role="button">Ajouter une catégorie</a>

<table class="table">
    <thead>
    <th>#</th>
    <th>Catégorie</th>
    <th>Action</th>
    </thead>
    <tbody>
    <?php
    $reponse    = $bdd->query('SELECT * FROM tp_categorie ORDER BY id ASC');
    foreach($reponse as $item){
        echo '<tr>';
        echo '<td>'.$item['id'].'</td>';
        echo '<td>'.$item['name'].'</td>';
        echo '<td><a class="btn btn-danger" href="?action=delete_cat&id='.$item['id'].'"><i class="icon-trash icon-white"></i>X</a></td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>

