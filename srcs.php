<?
$lines = file('http://php720.com/');
foreach ($lines as $line_num => $line) {     
    echo "<br>Line #{$line_num} : ".htmlspecialchars($line)."
";
}

?>