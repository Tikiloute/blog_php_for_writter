<?php
session_start();
session_destroy();
header('location:index.php?action=admin');
//exit; pour quelle raison ?