<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 12/02/2020
 * Time: 21:13
 */
session_start();
if(isset($_POST['sess']))
{
    $_SESSION['sess_eval'] = $_POST['sess'];
}
else
{
    $_SESSION['sess_eval'] = 1;
}
print json_encode(array('message' => $_SESSION['sess_eval']));
die();


