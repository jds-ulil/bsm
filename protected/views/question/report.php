<?php
$this->breadcrumbs=array(
	'Rekap Quistionaire',
);
?>
<?php 
$i = 1;
foreach ($arrSoal as $key => $value) {  
    echo "<table>";
    echo "<tr>";
    echo "<td colspan='2'>".$i." "."$value</td>";
    echo "</tr>";
    foreach ($arrResult[$key] as $key_j => $value_j) {
        foreach ($value_j as $key_ja => $value_ja) {
            echo "<tr>";
            echo "<td>$key_j</td>";
            echo "<td>$value_ja</td>";
            echo "</tr>";
        }
//        echo "<tr>";
//        echo "<td>'$key_j'</td>";
//        echo "<td>'$value_j'</td>";
//        echo "</tr>";
    }
    $i++;   
    echo "</table>";
    echo "<br />";
    echo "<br />";
}

?>
