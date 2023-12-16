<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$myUrl = $protocol . '://' . $host;

if (isset($_GET['PXVER']) && isset($_GET['KBVER'])) {
    $PXVER = $_GET['PXVER'];
    $KBVER = $_GET['KBVER'];

    // Define a regular expression pattern for x.y.z format
    $pattern = '/^\d+\.\d+\.\d+$/';

    // Check if both inputs match the specified format
    if (preg_match($pattern, $PXVER) && preg_match($pattern, $KBVER)) {
        $PXVER = escapeshellarg($PXVER);
        $KBVER = escapeshellarg($KBVER);
    
        $output = shell_exec("bash /px-image-list.sh -p $PXVER -k $KBVER");
        echo "<pre>$output</pre>";
    } else {
        echo "Error: Both PXVER and KBVER must be in the format x.y.z where x, y, and z are integers.";
        echo "<br>";
        echo "Example: <a href=$myUrl?PXVER=3.0.4&KBVER=1.25.1>$myUrl?PXVER=3.0.4&KBVER=1.25.1</a>";
    }
} else {
    echo "Error: Both PXVER and KBVER must be set.";
    echo "<br>";
    echo "Example: <a href=$myUrl?PXVER=3.0.4&KBVER=1.25.1>$myUrl?PXVER=3.0.4&KBVER=1.25.1</a>";
}
?>
