<?php require 'src/views/partial/head.php' ?>

<div class="bg-[#00000090] w-full z-30 absolute flex justify-center items-center min-h-screen px-2">
    <div class="bg-white shadow-md rounded-md p-4 max-w-xl w-full">
        <div action="/added-book" method="POST" class="flex flex-col gap-4 my-4">
            <div class="flex flex-col items-center gap-4 justify-center">
                <i class="fa-regular fa-circle-check text-7xl text-success"></i>
                <p class="text-xl font-bold">Name changed successfully!</p>
            </div>
            <div class="flex justify-center w-full gap-2">
                <a href="/settings" class="flex justify-center">
                    <p class="text-white bg-success py-1 font-bold rounded-md shadow-md tracking-widest w-full text-center hover:brightness-110 duration-300 px-10">OK</p>
                </a>
            </div>
        </div>
    </div>
</div>


<?php require 'src/views/partial/nav.php' ?>
<?php require 'src/views/partial/sidebar.php' ?>

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
                <a href="">Change</a>
            </div>
        </div>
        <!-- EMAIL -->
        <div>
            <p>Email:</p>
            <div class="flex justify-between items-center gap-4">
                <p class="py-1 px-2 bg-white rounded-md border border-outline w-full "><?= $user['email'] ?></p>
                <a href="">Change</a>
            </div>
        </div>
        <!-- PASSWORD -->
        <div>
            <p>Password:</p>
            <div class="flex justify-between items-center gap-4">
                <p class="py-1 px-2 bg-white rounded-md border border-outline w-full ">********</p>
                <a href="">Change</a>
            </div>
        </div>
    </div>

</main>