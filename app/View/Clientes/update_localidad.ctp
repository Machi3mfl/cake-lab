<?php
    echo "<option value=''></option>";
    foreach($datos as $v){
        echo "<option value=".$v['Localidad']['cod_loc'].">".$v['Localidad']['nom_loc']."</option>";
    }
?>
