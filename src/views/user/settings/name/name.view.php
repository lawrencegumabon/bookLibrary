<?php require 'src\views\partial\head.php' ?>

<div class="bg-[#00000090] w-full z-30 absolute flex justify-center items-center min-h-screen px-2">
    <div class="bg-white shadow-md rounded-md p-4 max-w-xl w-full">
        <h1 class="text-xl font-bold ">Change name:</h1>
        <hr class="my-2">
        <form action="/name-changed" method="POST" class="flex flex-col gap-4 my-4">
            <div class="">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="border bg-body border-outline p-1 px-2 rounded-md w-full outline-none" placeholder="Example: Juan Dela Cruz" required>
                <?php if (isset($errors['name'])) : ?>
                    <!-- <p class="text-xs text-danger mt-1"><?= $errors['email'] ?></p> -->
                <?php endif; ?>
            </div>
            <div class="flex justify-between w-full gap-2">
                <a href="/settings" class="flex justify-center w-full">
                    <p class="text-white bg-[#DC3545] py-1 font-bold rounded-md shadow-md tracking-widest w-full text-center hover:brightness-110 duration-300">CANCEL</p>
                </a>
                <div class="flex justify-center w-full"><button type="submit" class="text-white bg-[#28A745] py-1 font-bold rounded-md shadow-md tracking-widest w-full hover:brightness-110 duration-300">UPDATE</button></div>
            </div>
        </form>

    </div>
</div>


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