<?php require 'src\views\partial\head.php' ?>
<?php require 'src\views\partial\nav.php' ?>
<?php require 'src\views\partial\sidebar.php' ?>

<main class="py-4 px-2 md:pl-56 md:pr-8 max-w-7xl m-auto">
    <!-- SETTINGS-->
    <div class="w-full justify-between flex items-center ">
        <h1 class="text-xl font-bold ">Settings</h1>
    </div>
    <div class="my-4 flex flex-col gap-4">
        <!-- NAME -->
        <div>
            <p>Name:</p>
            <div class="flex justify-between items-center gap-4">
                <p class="py-1 px-2 bg-white rounded-md border border-outline w-full "><?= $user['fullName'] ?></p>
                <a href="/name">Change</a>
            </div>
        </div>
        <!-- EMAIL -->
        <div>
            <p>Email:</p>
            <div class="flex justify-between items-center gap-4">
                <p class="py-1 px-2 bg-white rounded-md border border-outline w-full "><?= $user['email'] ?></p>
                <a href="/email">Change</a>
            </div>
        </div>
        <!-- PASSWORD -->
        <div>
            <p>Password:</p>
            <div class="flex justify-between items-center gap-4">
                <p class="py-1 px-2 bg-white rounded-md border border-outline w-full ">********</p>
                <a href="/password">Change</a>
            </div>
        </div>
    </div>

</main>