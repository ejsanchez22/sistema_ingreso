<?php
session_start();
session_destroy();
header("Location: ../formulario/index.html");
?>
