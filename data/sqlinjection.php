<?php
function cleanQuery($string)
{
    global $conn;
if (ini_get('magic_quotes_gpc')) {
        $string = stripslashes($string);
    }

return $string;
}
?>
