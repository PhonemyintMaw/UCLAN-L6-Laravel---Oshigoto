<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <title></title>

</head>

<body>

    <div x-data="{open: false}" class="flex bg-gray-100 relative">

        <button @click="open = !open" class="fixed w-[50px] top-4 left-4 z-50 p-3 bg-black 
        text-white rounded-lg hover:bg-gray-700 
            transition">
            <i class="fa-solid fa-bars"></i>
        </button>

        <aside :class="open ? 'translate-x-0 w-64' : '-translate-x-full w-64'" class="fixed top-0 left-0 h-screen 
            bg-gray-200 dark:bg-gray-300 p-4 transition-all 
            duration-300 ease-in-out shadow-lg z-40 overflow-y-auto">

            <div class="font-bold text-2xl text-center mb-5 mt-20">
                OSHIGOTO <span class="text-red-700">JAPAN</span>
            </div>

            @auth('web')

            <div class="font-bold text-lg text-center mb-5 text-blue-700">
                {{ auth('web')->user()->name }}
            </div>
            <ul class="text-lg font-bold p-5">

                <li class="mb-5 justify-right items-center">
                    <a href="/admin-home" class="transition duration-300 grid grid-cols-5 uppercase 
                    text-black bg-transparent 
                        hover:bg-gray-200 hover:text-gray-900 rounded-lg inline-flex items-center 
                        dark:hover:bg-gray-600 dark:hover:text-white py-2 px-3">
                        <i class="fa-solid fa-gear col-span-1"></i>
                        <span class="col-span-4">Dashboard</span>
                    </a>
                </li>

                <li class="mb-5 justify-right items-center">
                    <a href="/all-listed-jobs" class="transition duration-300 grid grid-cols-5 uppercase 
                    text-black bg-transparent 
                        hover:bg-gray-200 hover:text-gray-900 rounded-lg inline-flex items-center 
                        dark:hover:bg-gray-600 dark:hover:text-white py-2 px-3">
                        <i class="fa-solid fa-thumbtack col-span-1"></i>
                        <span class="col-span-4">Jobs</span>
                    </a>
                </li>

                <li class="mb-5 justify-right items-center">
                    <a href="/all-partners" class="transition duration-300 grid grid-cols-5 uppercase 
                    text-black bg-transparent 
                        hover:bg-gray-200 hover:text-gray-900 rounded-lg inline-flex items-center 
                        dark:hover:bg-gray-600 dark:hover:text-white py-2 px-3">
                        <i class="fa-solid fa-handshake col-span-1"></i>
                        <span class="col-span-4">Partners</span>
                    </a>
                </li>

                <li class="mb-5 justify-right items-center">
                    <a href="/admin-applications" class="transition duration-300 grid grid-cols-5 uppercase 
                    text-black bg-transparent 
                        hover:bg-gray-200 hover:text-gray-900 rounded-lg inline-flex items-center 
                        dark:hover:bg-gray-600 dark:hover:text-white py-2 px-3">
                        <i class="fa-solid fa-folder-open col-span-1"></i>
                        <span class="col-span-4">Applications</span>
                    </a>
                </li>

                <li class="mb-5 justify-right items-center">
                    <a href="/all-cv" class="transition duration-300 grid grid-cols-5 uppercase 
                    text-black bg-transparent 
                        hover:bg-gray-200 hover:text-gray-900 rounded-lg inline-flex items-center 
                        dark:hover:bg-gray-600 dark:hover:text-white py-2 px-3">
                        <i class="fa-solid fa-scroll col-span-1"></i>
                        <span class="col-span-4">All CVs</span>
                    </a>
                </li>

                <li class="mb-5 justify-right items-center">
                    <a href="/admin-completed" class="transition duration-300 grid grid-cols-5 uppercase 
                    text-black bg-transparent 
                        hover:bg-gray-200 hover:text-gray-900 rounded-lg inline-flex items-center 
                        dark:hover:bg-gray-600 dark:hover:text-white py-2 px-3">
                        <i class="fa-solid fa-crown col-span-1"></i>
                        <span class="col-span-4">Passed</span>
                    </a>
                </li>

                <li class="mb-5 flex justify-center items-center ">

                    <div x-data="{ showLogout: false }">

                        <button @click="showLogout = true" class="transition duration-300 grid grid-cols-5 uppercase 
                        text-black bg-transparent 
                            hover:bg-gray-200 hover:text-gray-900 rounded-lg inline-flex items-center 
                            dark:hover:bg-gray-600 dark:hover:text-white py-2 px-3">
                            <i class="fa-solid fa-door-closed col-span-1"></i>
                            <span class="col-span-4">Logout</span>
                        </button>

                        <div x-show="showLogout" x-transition class="mt-10">

                            <div class="bg-white rounded-xl p-6 shadow-lg text-center">

                                <h2 class="font-bold text-xl mb-4">Confirm Logout</h2>

                                <div class="grid grid-cols-1">
                                    <button @click="showLogout = false" class="transition duration-300 uppercase
                                    text-black flex justify-center py-2 px-3 inline-flex items-center
                                    bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg
                                    dark:hover:bg-gray-600 dark:hover:text-white">
                                        Cancel
                                    </button>

                                    <form method="POST" action="/admin/logout" class="inline">
                                        @csrf
                                        <button type="submit" class="transition duration-300 uppercase 
                                        text-black py-2 px-3 flex justify-center inline-flex items-center
                                        bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg 
                                        dark:hover:bg-gray-600 dark:hover:text-white 
                                        ">
                                            Logout
                                        </button>
                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </li>

            </ul>

        </aside>

    </div>

    <main class="mt-3">
        <div>

            {{$slot}}

        </div>
    </main>

    @else

    <div class="flex justify-end p-3 pr-10 font-bold text-2xl">
        <p>
            You are not Logged In
        </p>
    </div>

    <div class="flex justify-end p-3 pr-10 text-2xl">

        <a href="/" class="ml-5 inline-block border-2 font-bold 
            border-black text-white bg-black py-1 px-4 rounded-xl uppercase 
            hover:text-black hover:bg-white">
            Log In
        </a>
    </div>

    @endauth

    <footer class="fixed z-50 bottom-0 left-0 w-full flex items-center justify-start font-bold 
        bg-black text-white h-10 justify-center">
        <p class="ml-2">Copyright &copy; 2025, All Rights reserved</p>
    </footer>

</body>

</html>
