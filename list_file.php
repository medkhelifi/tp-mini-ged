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
        $reponse    = $bdd->query('SELECT * FROM tp_document WHERE cat_id = '.$cat_id.' ORDER BY name ASC');
        foreach($reponse as $item){
            echo '<tr>';
            echo '<td>'.$item['id'].'</td>';
            echo '<td><a download href="uploads/'.$item['file_name'].'">'.$item['name'].'</a></td>';
            echo '<td><a class="btn btn-danger" href="?act=delete_file&id='.$item['id'].'"><i class="icon-trash icon-white"></i>X</a></td>';
            echo '</tr>';
        }
    }
    ?>
    </tbody>
</table>

