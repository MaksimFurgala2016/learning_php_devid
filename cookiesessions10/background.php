<?php
/**
 * Created by PhpStorm.
 * User: furga
 * Date: 18.08.2018
 * Time: 22:54
 */
ini_set('session.gc_maxlifetime', 5);
ini_set('session.cookie_lifetime', 5);
session_set_cookie_params(0);

session_start();

?>
<div style="height: 40px; background-color: <?php echo $_SESSION['color'] ?? "silver"?>">

</div>

