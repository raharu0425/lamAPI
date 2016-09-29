<?php
    foreach($rows as $row){
        echo "<tr class='" . $color . "'>";
        foreach($row as $val){
            foreach($fields as $colum => $field_name){
                echo '<td>';
                if(isset($val[$colum])) echo $val[$colum];
                echo '</td>';
            }
        }
        echo "</tr>";
    }
?>
