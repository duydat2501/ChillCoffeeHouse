<?php
require "../../database.php";
$casebook = $_POST['casebook'];
$sql = "DELETE FROM cases WHERE casebook = '$casebook'";
if ($conn->query($sql))
    echo "1";
else
    echo "$sql";
