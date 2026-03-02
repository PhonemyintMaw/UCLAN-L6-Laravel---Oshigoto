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

    <a href="/" class="mt-5 ml-5 inline-block border-2 font-bold 
    border-black text-white bg-black py-1 px-2 rounded-xl uppercase hover:text-white 
    shadow-lg">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Welcome to Oshigoto Japan
            </h2>
            <p class="mb-4">Partner Log In</p>
        </header>

        @if ($errors->any())
        <div class="text-red-700">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="/partner/authenticate">
            @csrf
            <div class="mb-6">

                <label for="partner_email" class="inline-block text-lg mb-2" value>
                    Email
                </label>

                <input type="email" class="border border-gray-200 rounded p-2 w-full" value="{{ old('email') }}"
                    required name="email" />

            </div>

            <div class="mb-6">
                <label for="partner_password" class="inline-block text-lg mb-2">
                    Password
                </label>

                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
            </div>

            <div class="mb-6 text-center">
                <button type="submit" class="transition duration-200 inline-block border-2 font-bold border-black 
            text-black py-2 px-4 rounded-xl uppercase hover:bg-black hover:text-white shadow-lg">
                    Log In
                </button>
            </div>

        </form>
    </div>

    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-black 
text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2025, All Rights reserved</p>

    </footer>
</body>

</html>
