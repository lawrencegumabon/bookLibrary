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

// EDIT BOOK
$router->get('/edit-book', 'src/Http/controllers/user/myBooks/editBook/edit-books.php')->only('auth');
$router->post('/edited-book', 'src/Http/controllers/user/myBooks/editBook/edited-books.php')->only('auth');

// DELETE BOOK
$router->get('/delete-book', 'src/Http/controllers/user/myBooks/deleteBook/delete-books.php')->only('auth');
$router->post('/deleted-book', 'src/Http/controllers/user/myBooks/deleteBook/deleted-books.php')->only('auth');

// READ BOOK / UNREAD BOOK
$router->get('/read-book', 'src/Http/controllers/user/myBooks/readBook.php')->only('auth');
$router->get('/unread-book', 'src/Http/controllers/user/myBooks/unreadBook.php')->only('auth');

// SETTINGS
$router->get('/settings', 'src/Http/controllers/user/settings/settings.php')->only('auth');

// EMAIL
$router->get('/email', 'src/Http/controllers/user/settings/email/email.php')->only('auth');
$router->post('/email-changed', 'src/Http/controllers/user/settings/email/changedEmail.php')->only('auth');

// NAME
$router->get('/name', 'src/Http/controllers/user/settings/name/name.php')->only('auth');
$router->post('/name-changed', 'src/Http/controllers/user/settings/name/changedName.php')->only('auth');

// PASSWORD
$router->get('/password', 'src/Http/controllers/user/settings/password/password.php')->only('auth');
$router->post('/password-changed', 'src/Http/controllers/user/settings/password/changedPassword.php')->only('auth');



// ! READER SIDE

// MY BOOKS
$router->get('/allBooks', 'src/Http/controllers/reader/books/mybooks.php')->only('auth');
