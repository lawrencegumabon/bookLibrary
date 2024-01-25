<nav class="w-full bg-white shadow-sm p-6 flex justify-between items-center">
    <h1 class="text-xl">BookingInaNgMers</h1>
    <?php if (isset($_SESSION['user'])) : ?>
        <p>Hello, <span class="font-bold"><?= $_SESSION['user']['fullName'] ?></span></p>
    <?php endif; ?>
</nav>