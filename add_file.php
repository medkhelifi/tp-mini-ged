<!-- panel preview -->
    <h4>Ajouter un fichier:</h4>
    <div class="panel panel-default">
        <form name="add_file" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" id="action" value="add_file">
            <div class="panel-body form-horizontal payment-form">
                <div class="form-group">
                    <label for="concept" class="col-sm-3 control-label">Nom du document</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount" class="col-sm-3 control-label">Fichier</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="file_name" name="file_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">Catégorie</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="cat_id" name="cat_id">
                            <?php
                            $reponse = $bdd->query('SELECT * FROM tp_categorie ORDER BY name ASC');
                            foreach($reponse as $item){
                                $active = "";
                                if(isset($_GET['cat_id']) && $_GET['cat_id']==$item['id']) $active = "active";
                                echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-default preview-add-button">
                            <span class="glyphicon glyphicon-plus"></span> Ajouter
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
