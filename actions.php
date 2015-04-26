<?php
    switch($_POST['action']){
        case "add_cat":
            if(isset($_POST['name']) && $_POST['name']!=""){
                $cat_name       = $_POST['name'];

            }
        break;
    }
