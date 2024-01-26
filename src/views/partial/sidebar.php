<aside class="fixed left-0 h-full w-52 hidden md:block">
    <ul class="p-4 flex flex-col gap-2 w-full  ">
        <li><a href="/myBooks" class="flex items-center gap-4 p-2 px-4 hover:bg-[#E8E8E8] rounded-md <?= (in_array($_SERVER['REQUEST_URI'], ['/myBooks'])) ? 'bg-[#E8E8E8]' : ''; ?>"><i class="fa-solid fa-book-open"></i>Books</a></li>
        <li><a href="/settings" class="flex items-center gap-4 p-2 px-4 rounded-md hover:bg-[#E8E8E8] <?= (in_array($_SERVER['REQUEST_URI'], ['/settings'])) ? 'bg-[#E8E8E8]' : ''; ?>"><i class="fa-solid fa-gear"></i>Settings</a></li>
        <li class="hover:bg-[#E8E8E8] rounded-md ">
            <form action="/logout" method="POST">
                <input type="hidden" name="_method" id="logout" value="DELETE">
                <button class="flex items-center gap-4 p-2 px-4 rounded-md "><i class="fa-solid fa-right-from-bracket rotate-180"></i>Logout</button>
            </form>
        </li>
    </ul>
</aside>