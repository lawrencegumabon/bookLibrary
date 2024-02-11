<?php require "src/views/partial/head.php" ?>

<main class="flex justify-center items-center min-h-screen bg-body px-2">
    <div class="bg-white shadow-md rounded-lg p-6  w-full max-w-xs md:max-w-md">
        <h1 class="text-xl font-bold pb-6">Sign in to your account</h1>
        <form action="/session" method="POST" class="flex flex-col gap-4">
            <div class="flex flex-col gap-1">
                <label for="email" class="text-sm">Your email</label>
                <input type="email" name="email" id="email" class="py-1 px-2 bg-body border border-outline rounded-md outline-none" placeholder="example@gmail.com" value="<?= $_SESSION['_flash']['old'] ?? '' ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label for="password" class="text-sm">Your password</label>
                <!-- <input type="password" id="password" name="password" class="py-1 px-2 bg-body border border-outline rounded-md outline-none" placeholder="********"> -->
                <div class="relative w-full bg-body border border-outline rounded-md">
                    <input type="password" id="password" name="password" class="py-1 px-2 bg-transparent outline-none" placeholder="********">
                    <i class="fa-solid fa-eye absolute right-0 top-1/2 -translate-y-1/2 -translate-x-1/2 text-[#7A7A7A] cursor-pointer" id="togglePass" onclick="togglePassword()"></i>
                </div>
            </div>
            <!-- <a href="" class="text-xs text-right text-primary">Forgot password?</a> -->
            <input type="submit" value="Sign in" name="" id="" class="bg-primary text-white py-1 rounded-md shadow-md cursor-pointer hover:brightness-110 duration-300">
            <?php if (isset($errors['email'])) : ?>
                <p class="text-center text-sm text-[#DC3545]"><?= $errors['email'] ?></p>
            <?php endif; ?>
            <p class="text-xs">Don't have an account yet?<a href="/sign-up" class="text-primary"> Sign up</a></p>
        </form>
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
</script>