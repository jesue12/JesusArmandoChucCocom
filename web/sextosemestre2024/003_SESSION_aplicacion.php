<?php
session_start();

if($_SESSION["usuario"]=="")
{
    header('Location: 003_SESSION_login.php?valor=error3');
}



?>

<table border="1">
    <tr>
        <td><?php include_once '004_SESSION_banner.php'; ?></td>
    </tr>
    <tr>
        <td><?php include_once '004_SESSION_menu.php'; ?></td>
    </tr>
    <tr>
        <td><?php include_once '004_SESSION_contenido.php'; ?></td>
    </tr>
    <tr>
        <td>PIE</td>
    </tr>
    
</table>
