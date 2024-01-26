<?php require 'src\views\partial\head.php' ?>

<div class="bg-[#00000090] w-full z-30 absolute flex justify-center items-center min-h-screen px-2">
    <div class="bg-white shadow-md rounded-md p-4 max-w-xl w-full">
        <h1 class="text-xl font-bold ">Change password:</h1>
        <hr class="my-2">
        <form action="/password-changed" method="POST" class="flex flex-col gap-4 my-4">
            <div class="flex flex-col  justify-between gap-4">
                <div class="flex flex-col gap-1 w-full">
                    <label for="password" class="text-sm">Your password</label>
                    <div class="relative w-full bg-body border border-outline rounded-md">
                        <input type="password" id="password" name="password" class="py-1 px-2 bg-transparent outline-none" placeholder="********">
                        <i class="fa-solid fa-eye absolute right-0 top-1/2 -translate-y-1/2 -translate-x-1/2 text-[#7A7A7A] cursor-pointer" id="togglePass" onclick="togglePassword()"></i>
                    </div>
                </div>
                <div class="flex flex-col gap-1 w-full">
                    <label for="passwordConfirm" class="">Confirm password</label>
                    <div class="relative w-full bg-body border border-outline rounded-md">
                        <input type="password" id="passwordConfirm" name="passwordConfirm" class="py-1 px-2 bg-transparent outline-none" placeholder="********">
                        <i class="fa-solid fa-eye absolute right-0 top-1/2 -translate-y-1/2 -translate-x-1/2 text-[#7A7A7A] cursor-pointer" id="togglePassConfirm" onclick="togglePasswordConfirm()"></i>
                    </div>
                </div>
                <?php if (isset($errors['password'])) : ?>
                    <p class="text-center text-sm text-[#DC3545]"><?= $errors['password'] ?></p>
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

<script>
    const togglePass = document.getElementById("togglePass")
    const password = document.getElementById("password");

    const togglePassConfirm = document.getElementById("togglePassConfirm")
    const passwordConfirm = document.getElementById("passwordConfirm");

    function togglePassword() {
        if (password.type === "password") {
            password.type = "text";
            togglePass.cxlassList.remove("fa-eye");
            togglePass.classList.add("fa-eye-slash");
        } else {
            password.type = "password";
            togglePass.classList.remove("fa-eye-slash");
            togglePass.classList.add("fa-eye");
        }
    }

    function togglePasswordConfirm() {
        if (passwordConfirm.type === "password") {
            passwordConfirm.type = "text";
            togglePassConfirm.classList.remove("fa-eye");
            togglePassConfirm.classList.add("fa-eye-slash");
        } else {
            passwordConfirm.type = "password";
            togglePassConfirm.classList.remove("fa-eye-slash");
            togglePassConfirm.classList.add("fa-eye");
        }
    }
</script>