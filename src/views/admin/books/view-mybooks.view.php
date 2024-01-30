<div class="bg-[#00000090] w-full z-30 absolute flex justify-center items-center min-h-screen px-2 ">
    <div class="bg-white shadow-md rounded-md p-4 max-w-xl w-full">
        <h1 class="text-xl font-bold ">Your book:</h1>
        <hr class="my-2">
        <div class="flex flex-col gap-4 my-4">
            <div>
                <p>Book name:</p>
                <p class="border border-outline p-1 px-2 rounded-md"><?= $myBook['title'] ?></p>
            </div>
            <div>
                <p>Author name:</p>
                <p class="border border-outline p-1 px-2 rounded-md"><?= $myBook['author'] ?></p>
            </div>
            <div>
                <p>Category:</p>
                <p class="border border-outline p-1 px-2 rounded-md"><?= $myBook['category'] ?></p>
            </div>
            <div>
                <p>File:</p>
                <div class="border border-outline p-1 px-2 rounded-md w-full">
                    <a href="/pdf-myBooks?bookID=<?= $myBook['id'] ?>" target="_blank">View <span class="underline">FILE</span></a>
                </div>
            </div>
            <!-- <div>
                <p>Status:</p>
                <p class=" border border-outline p-1 px-2 rounded-md"><?= $myBook['status'] ?></p>
            </div> -->
        </div>
        <a href="/myBooks" class="flex justify-center"><button class="text-white bg-[#28A745] py-1 px-10 font-bold rounded-md shadow-md tracking-widest">DONE</button></a>
    </div>
</div>

<?php require 'src\views\partial\head.php' ?>
<?php require 'src\views\partial\nav.php' ?>
<?php require 'src\views\partial\sidebar.php' ?>


<main class="py-4 px-2 md:pl-56 md:pr-8 max-w-7xl m-auto pt-20">
    <!-- SEARCH -->
    <div class="flex flex-col gap-4">
        <!-- SEARCH TITLE, AUTHOR, KEYWORDS -->
        <div class="flex items-center gap-2 bg-body border p-2 border-outline rounded-md w-full">
            <i class="fa-solid fa-magnifying-glass text-outline"></i>
            <input type="text" id="search" class="w-full bg-transparent outline-none " placeholder='Search'>
        </div>
        <div class="flex justify-between gap-4">
            <div class="w-full">
                <select name="" id="categories" class="w-full p-2 rounded-md bg-body border border-outline text-outline outline-none">
                    <option value="All">Select Categories</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- <div class="w-full">
                <select name="" id="status" class="w-full p-2 rounded-md bg-body border border-outline text-outline outline-none">
                    <option value="All">Select Status</option>
                    <option value="Read">Read</option>
                    <option value="Unread">Unread</option>
                </select>
            </div> -->
        </div>
    </div>
    <!-- MY BOOKS -->
    <div class="w-full justify-between my-6 flex items-center">
        <h1 class="text-xl font-bold ">My Books</h1>
        <a href="/add-book" class="text-white bg-[#2563EB] py-1 px-4 rounded-md shadow-md">Add Book</a>
    </div>
    <div class="overflow-x-scroll md:overflow-auto">
        <table class="min-w-max w-full rounded-md overflow-clip shadow-md text-center mb-6">
            <!-- HEAD -->
            <thead class="bg-[#F2F1F1]  py-3 text-center">
                <tr>
                    <th class="py-3 px-2">Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <!-- <th>Status</th> -->
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($books as $book) : ?>
                    <tr class="border-b">
                        <td class="py-3 px-2 title"><?= $book['title'] ?></td>
                        <td class="author"><?= $book['author'] ?></td>
                        <td class="category"><?= $book['category'] ?></td>
                        <!-- <td class="underline">
                            <?php if ($book['status'] == 'Unread') : ?>
                                <a href="/read-book?bookID=<?= $book['id'] ?>" class="status">Unread</a>
                            <?php else : ?>
                                <a href="/unread-book?bookID=<?= $book['id'] ?>" class="status">Read</a>
                            <?php endif; ?>
                        </td> -->
                        <td class="py-3 px-2 flex flex-col md:flex-row md:items-center justify-center md:justify-evenly gap-2 md:gap-0">
                            <a href="/view-myBooks?bookID=<?= $book['id'] ?>" class="bg-[#28A745] text-white rounded-md py-1 px-2 shadow-md"><i class="fa-solid fa-eye "></i></a>
                            <a href="/edit-book?bookID=<?= $book['id'] ?>" class="bg-[#2563EB] text-white rounded-md py-1 px-2 shadow-md"><i class="fa-solid fa-pen-to-square "></i><span class="hidden"><?= $book['id'] ?></span></a>
                            <a href="/delete-book?bookID=<?= $book['id'] ?>" class="bg-[#DC3545] text-white rounded-md py-1 px-2 shadow-md"><i class="fa-solid fa-trash "></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="text-xs">
        <p class="font-bold">Status:</p>
        <ul class="">
            <li>If READ, it means you still haven't read it yet.</li>
            <li>If UNREAD it means you have already read it.</li>
        </ul>
    </div> -->
</main>

<script>
    addEventListener('input', () => {
        // INPUT
        const search = document.getElementById('search').value.toLowerCase();
        const categories = document.getElementById('categories').value;
        const status = document.getElementById('status').value;

        // DATA
        const titles = document.querySelectorAll('.title');
        const authors = document.querySelectorAll('.author');
        const categoriesElements = document.querySelectorAll('.category');
        const statusElements = document.querySelectorAll('.status');

        titles.forEach((title, index) => {
            const row = title.closest('tr');
            const bookTitle = title.textContent.toLowerCase();
            const bookAuthor = authors[index].textContent;
            const bookCategory = categoriesElements[index].textContent;
            const bookStatus = statusElements[index].textContent;

            const titleMatch = bookTitle.includes(search);
            const authorMatch = bookAuthor.toLowerCase().includes(search);
            const categoryMatch = categories === 'All' || bookCategory === categories;
            const statusMatch = status === 'All' || bookStatus === status;
            // Display row if any condition is true
            if ((titleMatch || authorMatch) && categoryMatch && statusMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>