<?php

    if($_SESSION['allowLog'] != "logAlready"){
        echo "<script> window.location.replace('customer_login.php'); </script> ";
    }
?>