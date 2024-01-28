<nav class="w-full bg-white shadow-sm p-6 flex justify-between items-center">
    <div class="flex items-center gap-2">
        <img src="src\views\assets\image\books.PNG" alt="" class="w-8 h-8 ">
        <h1 class="text-lg md:text-xl">Book Library</h1>
    </div>
    <?php if (isset($_SESSION['user'])) : ?>
        <?php
        $userID = $_SESSION['user']['id'];

        $user = $db->query('SELECT * FROM users WHERE id = :id', [
            'id' => $userID
        ])->find();
        ?>
        <p class="hidden md:block">Hello, <span class="font-bold "><?= $user['fullName'] ?></span></p>
    <?php endif; ?>
    <div class="text-right z-50 md:hidden">
        <i class="fa-solid fa-bars text-xl cursor-pointer" id="menu"></i>
    </div>
</nav>

<!-- <div class="bg-body w-full h-full  z-40 hidden"> -->
<!-- <div class="text-left h-full w-full"> -->
<ul class="flex-col gap-2 w-full justify-center items-center min-h-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-body hidden" id="lists">
    <li><a href="/myBooks" class=" flex items-center gap-4 p-2 px-4  rounded-md "><i class="fa-solid fa-book-open"></i>Books</a></li>
    <li><a href="/settings" class="flex items-center gap-4 p-2 px-4 rounded-md  "><i class="fa-solid fa-gear"></i>Settings</a></li>
    <li class=" rounded-md ">
        <form action="/logout" method="POST">
            <input type="hidden" name="_method" id="logout" value="DELETE">
            <button class="flex items-center gap-4 p-2 px-4 rounded-md "><i class="fa-solid fa-right-from-bracket rotate-180"></i>Logout</button>
        </form>
    </li>
</ul>
<!-- </div> -->
<!-- </div> -->

<script>
    const menu = document.getElementById('menu');
    const lists = document.getElementById('lists');

    menu.addEventListener("click", () => {
        if (lists.classList.contains('hidden')) {
            lists.classList.remove('hidden');
            lists.classList.add('flex');
            menu.classList.remove('fa-bars');
            menu.classList.add('fa-x');
        } else {
            lists.classList.remove('flex');
            lists.classList.add('hidden');
            menu.classList.remove('fa-x');
            menu.classList.add('fa-bars');
        }
    });
</script>