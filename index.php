<?php

include "OraConnect.php";

//$conn = oci_connect('parus', 'parusina', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=192.168.84.33)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=YAPO1)))');

$conn = OraConnect::getInstance();

//if (!$conn) {
//    $e = oci_error();
//    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
//}

$connect = oci_parse($conn, 'SELECT rn, acc_number FROM dicaccs');
oci_execute($connect);

echo "<table border='1'>\n";
while ($row = oci_fetch_array($connect, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";


?>