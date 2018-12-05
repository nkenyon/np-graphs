<?php
// It reads a json formatted text file and outputs it.
$sensorID_1 = "001";
$sensorID_2 = "002";


echo' {
    "cols": [
    {"label":"Time","type":"string"},
    {"label":"Sensor ' . $sensorID_1 . '","type":"number"},
	{"label":"Sensor ' . $sensorID_2 . '","type":"number"}
    ],
    "rows": [
';
$filename = "Dual_001.csv";
$handle = fopen($filename, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        $columns = explode(",", $line);
        echo '{"c":[{"v":"' . $columns[0] . '"},{"v":' . $columns[1] . '},{"v":' . $columns[2] . '}]},';
    }
    
    fclose($handle);
} else {
    // error opening the file.
    echo "<tr><td align=\"center\">error reading log file.</td>";
}
echo ']}';
?>