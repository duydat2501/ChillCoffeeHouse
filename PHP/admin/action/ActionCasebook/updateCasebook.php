<?php
require "../../../database.php";
require "../../../code.php";
// echo $_POST['casebook'];
// echo $_POST['name'];
if (updateCasebook($_POST['casebook'], $_POST['name'], $_POST['old_casebook']))
    echo "1";
else echo "0";
