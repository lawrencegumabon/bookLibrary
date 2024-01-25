<?php

if (isset($_SESSION['user'])) {
    redirect('/myBooks');
}

require "src\\views\user\login\login.view.php";
