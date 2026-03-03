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

    <nav class="flex font-bold bg-white text-black justify-between items-center p-5 border-b-4">
        <h1 class="text-2xl">
            Oshigoto <span class="text-red-700">JAPAN</span>
        </h1>
    </nav>

    @include('components._message')

    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1 mb-5">
                Welcome to Oshigoto Japan
            </h2>
            <p class="text-2xl">
                Who are you?
            </p>
        </header>

        <div class="flex justify-center">
            <div class="text-center">
                <a href="{{ url('/admin-login') }}" class="w-32 mt-5 mr-2 inline-block border-2 font-bold 
            border-black text-white bg-black p-3 rounded-xl uppercase hover:text-black hover:bg-white 
            shadow-lg transition duration-200">
                    Admin
                </a>
            </div>
            <div class="text-center">
                <a href="{{ url('/partner-login') }}" class="w-32 mt-5 ml-2 inline-block border-2 font-bold 
            border-black text-white bg-black p-3 rounded-xl uppercase hover:text-black hover:bg-white 
            shadow-lg transition duration-200">
                    Partner
                </a>
            </div>
        </div>
    </div>

    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-black 
        text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2025, All Rights reserved</p>

    </footer>
</body>

</html>
