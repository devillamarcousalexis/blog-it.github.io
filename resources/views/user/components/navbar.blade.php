<nav class="nav bg-[#004AAD] border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl bg-[#004AAD] flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="bg-[#004AAD] flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/images/MyDiary.png" class="w-20 bg-[#004AAD]" alt="Flowbite Logo" />
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="md:hidden duration-500 bg-transparent inline-flex items-center p-2 w-10 h-10 justify-center text-sm focus:ring-0 focus:outline-none" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only ">Open main menu</span>
            <svg class="w-5 h-5 bg-[#004AAD] " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" class="viewBox=" 0 0 17 14">
                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="4 " d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden duration-500 bg-[#004AAD] w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4a md:p-0 mt-4 border border-gray-100 bg-[#004AAD] md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0   dark:border-gray-700">
                <li>
                    <a href="{{ route('blog.index') }}" class="block bg-[#004AAD] py-2 px-3 text-white md:p-0 dark:text-white  " aria-current="page"><span class="text-lg font-concert bg-[#004AAD] hover:border-b-4 hover:pb-1 hover:duration-200 hover:text-gray-100">Home</span></a>
                </li>
                <li>
                    <a href="{{ route('profile.index') }}" class="block bg-[#004AAD] py-2 px-3 text-white  md:border-0  md:p-0 dark:text-white "><span class="text-lg font-concert bg-[#004AAD] hover:border-b-4 hover:pb-1 hover:duration-200 hover:text-white">Profile</span></a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}" class="block bg-[#004AAD] py-2 px-3 text-white  md:border-0  md:p-0 dark:text-white "><span class="text-lg font-concert bg-[#004AAD] hover:border-b-4 hover:pb-1 hover:duration-200 hover:text-white">Settings</span></a>
                </li>
                <li>
                    <a href="/logout" class="block bg-[#004AAD] py-2 px-3 text-white  md:border-0  md:p-0 dark:text-white "><span class="text-lg font-concert bg-[#004AAD] hover:border-b-4 hover:pb-1 hover:duration-200 hover:text-white">Logout</span></a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<style>
    .nav {
        background-color: none;
    }
</style>