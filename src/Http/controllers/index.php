<?php

if (isset($_SESSION['user'])) {
    redirect('/myBooks');
}

require "src\\views\admin\login\login.view.php";
