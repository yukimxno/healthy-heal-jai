<header class="bg-white w-full border-b border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="./" class="block py-2 pl-3 pr-4 text-xl text-[#151636] font-bold rounded md:bg-transparent md:p-0" aria-current="page">สั่งซื้อสินค้าอาหาร</a>
  <div class="flex md:order-2">
        <div class="flex gap-2 md:block hidden">
          <?php if (isset($_SESSION['email'])) { ?>
            <a href="/backend/logout.php" class="text-white bg-red-500 transition duration-200 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center md:mr-0">ออกจากระบบ</a>
          <?php } else { ?>
            <a href="../login.php" class="text-white bg-emerald-500 transition duration-200 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center md:mr-0">เข้าสู่ระบบ</a>
            <a href="../register.php" class="text-white bg-emerald-500 transition duration-200 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center md:mr-0">สมัครสมาชิก</a>
          <?php } ?>
        </div>
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
      <li>
        <a href="../" class="not-underline block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent hover:font-bold md:hover:text-[#ba1374] md:p-0 ">Home</a>
      </li>
      <li>
        <a href="../interest.php" class="not-underline block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent hover:font-bold md:hover:text-[#ba1374] md:p-0">สินค้าแนะนำ</a>
      </li>
      <li>
        <a href="../category.php" class="not-underline block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent hover:font-bold md:hover:text-[#ba1374] md:p-0">รายการประเภทสินค้าอาหาร</a>
      </li>
      <li>
        <a href="../onhold.php" class="not-underline block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent hover:font-bold md:hover:text-[#ba1374] md:p-0 ">รายการสินค้าโปรด</a>
      </li>
      <li class="md:hidden block">
        <div class="flex gap-1">
          <?php if (isset($_SESSION['firstname'])) { ?>
            <a href="../backend/logout.php" class="text-white bg-red-500 transition duration-200 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center md:mr-0">ออกจากระบบ</a>
          <?php } else { ?>
            <a href="../login.php" class="text-white bg-emerald-500 transition duration-200 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center md:mr-0">เข้าสู่ระบบ</a>
            <a href="../register.php" class="text-white bg-emerald-500 transition duration-200 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center md:mr-0">สมัครสมาชิก</a>
          <?php } ?>
        </div>
      </li>
    </ul>
  </div>
  </div>
</header>


<script>
    const button = document.querySelector('[data-collapse-toggle]');
    const target = document.querySelector(`#${button.getAttribute('aria-controls')}`);

    button.addEventListener('click', () => {
        target.classList.toggle('hidden');
    });
</script>