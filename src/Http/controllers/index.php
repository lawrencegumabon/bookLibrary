<?php

if (isset($_SESSION['user'])) {
    redirect('/allBooks');
} elseif (isset($_SESSION['admin'])) {
    redirect('/myBooks');
}

require "src\\views\admin\login\login.view.php";
