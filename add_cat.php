<!-- panel preview -->
<h4>Ajouter une catégorie:</h4>
<div class="panel panel-default">
    <form name="add_file" action="" method="post">
        <input type="hidden" name="action" id="action" value="add_cat">
        <div class="panel-body form-horizontal payment-form">
            <div class="form-group">
                <label for="concept" class="col-sm-3 control-label">Catégorie</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name">
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
