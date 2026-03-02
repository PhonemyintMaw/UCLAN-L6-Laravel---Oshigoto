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

<body class="mb-48">

    <nav class="inline-flex w-full font-bold bg-white text-black justify-between items-center p-5 shadow-lg">
        <h1 class="text-2xl">
            Oshigoto <span class="text-red-700">JAPAN</span>
        </h1>

        <ul class="flex justify-center space-x-6 mr-6 text-lg">

            @auth('partner')

            <li>
                <span class="font-old-uppercase">
                    Welcome, {{ auth('partner')->user()->partner_name }} !
                </span>
            </li>

            <li>
                <p>/</p>
            </li>

            <li>

                <form method="POST" action="/partner/logout" class="inline">
                    @csrf
                    <button type="submit" class="transition duration-300 hover:underline">
                        <i class="fa-solid fa-door-closed col-span-1"></i>
                        <span class="col-span-4">Logout</span>
                    </button>
                </form>

            </li>

        </ul>
    </nav>

    <main>

        {{$slot}}

    </main>

    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold 
        bg-black text-white h-10 md:justify-center">
        <p class="ml-2">Copyright &copy; 2025, All Rights reserved</p>

    </footer>

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

</body>

</html>
