<template>
  <nav
    class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 border drop-shadow-md"
  >
    <div class="container flex flex-wrap justify-between items-center mx-auto">
      <a href="#" class="flex items-center">
        <img src="@/assets/logo.png" class="mr-3 h-10 sm:h-16" alt="Logo KSD" />
      </a>
      <button
        type="button"
        class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden focus:outline-none focus:ring-2 text-grey-400 hover:bg-purple-500 focus:ring-purple-600 focus:text-white focus:bg-purple-500 hover:text-white nav-toggler"
        data-target="#mobile-menu"
      >
        <span class="sr-only">Open main menu</span>
        <svg
          class="w-6 h-6"
          fill="currentColor"
          id="menu"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <div class="hidden w-full md:!block md:w-auto lg:w-auto sm:w-auto" id="mobile-menu">
        <ul
          class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-lg md:font-medium"
        >
          <li>
            <a
              href="#"
              class="block text-center py-2 pr-4 pl-3 text-gray-500 border-b border-gray-300 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-purple-600 md:p-0 dark:text-gray-400 md:dark:hover:text-purple-600 dark:hover:bg-gray-700 dark:hover:text-purple-600 md:dark:hover:bg-transparent dark:border-gray-700"
              >Home</a
            >
          </li>
          <li>
            <a
              href="#"
              class="block text-center py-2 pr-4 pl-3 text-gray-500 border-b border-gray-300 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-purple-600 md:p-0 dark:text-gray-400 md:dark:hover:text-purple-600 dark:hover:bg-gray-700 dark:hover:text-purple-600 md:dark:hover:bg-transparent dark:border-gray-700"
              >About</a
            >
          </li>
          <li>
            <a
              href="#"
              class="block text-center py-2 pr-4 pl-3 text-gray-500 border-b border-gray-300 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-purple-600 md:p-0 dark:text-gray-400 md:dark:hover:text-purple-600 dark:hover:bg-gray-700 dark:hover:text-purple-600 md:dark:hover:bg-transparent dark:border-gray-700"
              >Product</a
            >
          </li>
          <li>
            <a
              href="#"
              class="block text-center py-2 pr-4 pl-3 text-gray-500 border-b border-gray-300 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-purple-600 md:p-0 dark:text-gray-400 md:dark:hover:text-purple-600 dark:hover:bg-gray-700 dark:hover:text-purple-600 md:dark:hover:bg-transparent dark:border-gray-700"
              >Galeri</a
            >
          </li>
          <li>
            <a
              href="#"
              class="block text-center py-2 pr-4 pl-3 text-gray-500 border-b border-gray-300 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-purple-600 md:p-0 dark:text-gray-400 md:dark:hover:text-purple-600 dark:hover:bg-gray-700 dark:hover:text-purple-600 md:dark:hover:bg-transparent dark:border-gray-700"
              >FAQS</a
            >
          </li>
          <li>
            <a
              href="#"
              class="block text-center py-2 pr-4 pl-3 text-gray-500 border-b border-gray-300 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-purple-600 md:p-0 dark:text-gray-400 md:dark:hover:text-purple-600 dark:hover:bg-gray-700 dark:hover:text-purple-600 md:dark:hover:bg-transparent dark:border-gray-700"
              >Mitra</a
            >
          </li>
          <li>
            <a
              href="#"
              class="block text-center py-2 pr-4 pl-3 text-gray-500 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-purple-600 md:p-0 dark:text-gray-400 md:dark:hover:text-purple-600 dark:hover:bg-gray-700 dark:hover:text-purple-600 md:dark:hover:bg-transparent"
              >Contact</a
            >
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
  name: "Navbar",
};

// references
// $(document).ready(function () {
//   $(".nav-toggler").each(function (_, navToggler) {
//     var target = $(navToggler).data("target");
//     $(navToggler).on("click", function () {
//       $(target).animate({
//         height: "toggle",
//       });
//     });
//   });
// });

// sendiri
$(document).ready(function () {
  $(".nav-toggler").click(function() {
      $("#mobile-menu").animate({
          height: "toggle",
            display: "!block",
      });
    $("#mobile-menu").toggleClass("hidden");
  })
});
</script>