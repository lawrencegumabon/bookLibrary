<aside class="fixed left-0 h-full w-52">
    <ul class="p-4 flex flex-col gap-2 w-full  ">
        <li><a href="/myBooks" class="flex items-center gap-4 p-2 px-4 bg-[#E8E8E8] rounded-md"><i class="fa-solid fa-book-open"></i>Books</a></li>
        <li><a class="flex items-center gap-4 p-2 px-4 rounded-md"><i class="fa-solid fa-gear"></i>Settings</a></li>
        <li>
            <form action="/logout" method="POST">
                <input type="hidden" name="_method" id="logout" value="DELETE">
                <button class="flex items-center gap-4 p-2 px-4 rounded-md"><i class="fa-solid fa-right-from-bracket rotate-180"></i>Logout</button>
            </form>
        </li>
    </ul>
</aside>