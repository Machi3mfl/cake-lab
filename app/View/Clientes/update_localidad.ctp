<?php
    echo "<option value=''></option>";
    foreach($datos as $k=>$v){
        echo "<option value='$k'>".$v."</option>";
    }
?>
