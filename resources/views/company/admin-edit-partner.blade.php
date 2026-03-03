<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <a href="{{ url('/all-partners/'.$partner -> partner_id) }}" class="inline-block border-2 font-bold 
    border-black text-white bg-black py-3 px-4 rounded-xl uppercase hover:text-white 
    shadow-lg">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>

            <main class="m-5">

                <div class="mx-4">

                    <header class="max-w-9/10 mx-auto mt-10">

                        <h1 class="text-3xl font-bold uppercase text-center mb-10">
                            Edit Partner Information
                        </h1>

                    </header>

                    <!-- PARTNER EDIT SECTION -->
                    <div class="flex justify-center">
                        <div class="p-20 border-2 border-black w-3/4">

                            @include('components._message')

                            <form method="post" action="{{ url('/all-partners/'.$partner -> partner_id) }}"
                                enctype="multipart/form-data">

                                @csrf
                                @method('PUT')

                                <div>

                                    <ul class="border border-gray-200 mb-5 p-5">



                                        <li class="mb-5 p-3">
                                            <label for="PartnerID" class="inline-block text-lg mb-2 font-bold">
                                                Partner ID
                                            </label>

                                            <h2 class="font-bold text-blue-700">
                                                {{$partner -> partner_id}}
                                            </h2>

                                        </li>

                                        <li class="mb-5 p-3">
                                            <label for="partner_name" class="inline-block text-lg mb-2 font-bold">
                                                Partner Name
                                            </label>

                                            <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                                name="partner_name" value="{{$partner -> partner_name}}" />

                                            @error('partner_name')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
                                        </li>

                                        <li class="mb-5 p-3">
                                            <label for="partner_email" class="inline-block text-lg mb-2 font-bold">
                                                Partner Email
                                            </label>

                                            <input type="email" class="border border-gray-200 rounded p-2 w-full"
                                                name="email" value="{{$partner -> email}}" />

                                            @error('email')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
                                        </li>

                                        <li class="mb-5 p-3">
                                            <label for="partner_address" class="inline-block text-lg mb-2 font-bold">
                                                Partner Address
                                            </label>

                                            <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                                name="partner_address" value="{{$partner -> partner_address}}" />

                                            @error('partner_address')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
                                        </li>

                                        <li class="mb-5 p-3">
                                            <label for="password" class="inline-block text-lg mb-2 font-bold">
                                                Partner Password (Leave if No Update is Needed)
                                            </label>

                                            <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                                name="password" />
                                        </li>


                                    </ul>

                                </div>

                                <div class="mb-6 flex justify-center">

                                    <button type="submit" class="transition duration-300 bg-green-700 text-white rounded
                                     py-2 px-4 hover:bg-green-500">
                                        <i class="fa fa-pencil mr-2"></i>Edit
                                    </button>

                                </div>

                            </form>

                        </div>
                    </div>


                </div>
            </main>

        </div>

    </div>

</x-layout-admin>
