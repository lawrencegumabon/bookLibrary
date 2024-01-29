<?php

//SIGN UP
$router->get('/', 'src/Http/controllers/index.php');

//SIGN IN
$router->get('/sign-in', 'src/Http/controllers/admin/login/login.php')->only('guest');
$router->post('/session', 'src/Http/controllers/admin/login/store.php')->only('guest');
$router->delete('/admin-logout', 'src/Http/controllers/admin/login/logout.php')->only('admin');

//SIGN UP
$router->get('/sign-up', 'src/Http/controllers/admin/register/register.php')->only('guest');
$router->post('/sessions', 'src/Http/controllers/admin/register/store.php')->only('guest');
// $router->delete('/logout', 'src/Http/controllers/admin/register/logout.php')->only('admin');

// MY BOOKS
$router->get('/myBooks', 'src/Http/controllers/admin/myBooks/mybooks.php')->only('admin');
$router->get('/view-myBooks', 'src/Http/controllers/admin/myBooks/view-mybooks.php')->only('admin');

// ADD BOOK
$router->get('/add-book', 'src/Http/controllers/admin/myBooks/addBook/add-books.php')->only('admin');
$router->post('/added-book', 'src/Http/controllers/admin/myBooks/addBook/added-books.php')->only('admin');

// EDIT BOOK
$router->get('/edit-book', 'src/Http/controllers/admin/myBooks/editBook/edit-books.php')->only('admin');
$router->post('/edited-book', 'src/Http/controllers/admin/myBooks/editBook/edited-books.php')->only('admin');

// DELETE BOOK
$router->get('/delete-book', 'src/Http/controllers/admin/myBooks/deleteBook/delete-books.php')->only('admin');
$router->post('/deleted-book', 'src/Http/controllers/admin/myBooks/deleteBook/deleted-books.php')->only('admin');

// // READ BOOK / UNREAD BOOK
// $router->get('/read-book', 'src/Http/controllers/admin/myBooks/readBook.php')->only('admin');
// $router->get('/unread-book', 'src/Http/controllers/admin/myBooks/unreadBook.php')->only('admin');

// SETTINGS
// $router->get('/settings', 'src/Http/controllers/admin/settings/settings.php')->only('admin');

// // EMAIL
// $router->get('/email', 'src/Http/controllers/admin/settings/email/email.php')->only('admin');
// $router->post('/email-changed', 'src/Http/controllers/admin/settings/email/changedEmail.php')->only('admin');

// // NAME
// $router->get('/name', 'src/Http/controllers/admin/settings/name/name.php')->only('admin');
// $router->post('/name-changed', 'src/Http/controllers/admin/settings/name/changedName.php')->only('admin');

// // PASSWORD
// $router->get('/password', 'src/Http/controllers/admin/settings/password/password.php')->only('admin');
// $router->post('/password-changed', 'src/Http/controllers/admin/settings/password/changedPassword.php')->only('admin');



// ! READER SIDE

$router->delete('/logout', 'src/Http/controllers/reader/login/logout.php')->only('auth');

// MY BOOKS
$router->get('/allBooks', 'src/Http/controllers/reader/books/mybooks.php')->only('auth');
$router->get('/view-allBooks', 'src/Http/controllers/reader/books/view-mybooks.php')->only('auth');

// READ BOOK / UNREAD BOOK
$router->get('/read-book', 'src/Http/controllers/reader/books/readBook.php')->only('auth');
$router->get('/unread-book', 'src/Http/controllers/reader/books/unreadBook.php')->only('auth');

// SETTINGS
$router->get('/settings', 'src/Http/controllers/reader/settings/settings.php')->only('auth');

// EMAIL
$router->get('/email', 'src/Http/controllers/reader/settings/email/email.php')->only('auth');
$router->post('/email-changed', 'src/Http/controllers/reader/settings/email/changedEmail.php')->only('auth');

// NAME
$router->get('/name', 'src/Http/controllers/reader/settings/name/name.php')->only('auth');
$router->post('/name-changed', 'src/Http/controllers/reader/settings/name/changedName.php')->only('auth');

// PASSWORD
$router->get('/password', 'src/Http/controllers/reader/settings/password/password.php')->only('auth');
$router->post('/password-changed', 'src/Http/controllers/reader/settings/password/changedPassword.php')->only('auth');
