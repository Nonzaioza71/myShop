<?php

if (isset($_SESSION['user'])) href("?app=profile&id=" . $_SESSION['user']['memberid']);
require_once("modules/auth/view.inc.php");
