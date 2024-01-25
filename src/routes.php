<?php

//SIGN UP
$router->get('/', 'src/Http/controllers/index.php');

//SIGN IN
$router->get('/sign-in', 'src/Http/controllers/user/login/login.php')->only('guest');
$router->post('/session', 'src/Http/controllers/user/login/store.php')->only('guest');
$router->delete('/logout', 'src/Http/controllers/user/login/logout.php')->only('auth');

//SIGN UP
$router->get('/sign-up', 'src/Http/controllers/user/register/register.php')->only('guest');
$router->post('/sessions', 'src/Http/controllers/user/register/store.php')->only('guest');
$router->delete('/logout', 'src/Http/controllers/user/register/logout.php')->only('auth');

// MY BOOKS
$router->get('/myBooks', 'src/Http/controllers/user/myBooks/mybooks.php')->only('auth');
$router->get('/view-myBooks', 'src/Http/controllers/user/myBooks/view-mybooks.php')->only('auth');

// ADD BOOK
$router->get('/add-book', 'src/Http/controllers/user/myBooks/addBook/add-books.php')->only('auth');
$router->post('/added-book', 'src/Http/controllers/user/myBooks/addBook/added-books.php')->only('auth');
