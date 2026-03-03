<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <!-- Top Section -->
            <section class="grid grid-cols-1 items-center mb-5">

                <div class="col-span-3 flex justify-left m-5">
                    <h1 class="text-3xl font-bold">
                        Partners
                    </h1>
                </div>

            </section>

            <!-- List Section -->
            <section class="m-5 flex flex-col justify-center">

                <!-- Search Bar -->
                <div class="mb-10">
                    <p class="ml-4">
                        Search with Partner Name or Partner Nationality
                    </p>
                    <form action="{{ url('/all-partners') }}">

                        @include('components._search')

                    </form>
                </div>

                <div class="flex justify-between mb-5">
                    <div class="flex justify-center">
                        <a href="{{ url('/all-partners') }}" class="transition duration-300 inline-block border-2 
            font-bold border-black text-black py-2 px-4 rounded-xl 
            hover:bg-black hover:text-white shadow-lg">
                            Refresh
                        </a>
                    </div>

                    <div class="flex justify-center">
                        <a href="{{ url('/register-new-partner') }}" class="transition duration-200 
        inline-block border-2 font-bold border-black text-black py-2 px-4 rounded-xl 
        hover:bg-black hover:text-white shadow-lg">
                            <i class="fa-solid fa-plus"></i> Add New
                        </a>
                    </div>
                </div>

                @include('components._message')

                <!-- PARTNER SECTION -->

                <div class="border-black border-4 rounded-2xl text-black pb-5">

                    <h1 class="text-center font-bold text-lg text-white bg-black border-b-black p-5">
                        Partner List
                    </h1>

                    <div class="h-full overflow-y-auto scrollbar">

                        <table class="w-full table-auto bg-white text-black">

                            <thead>

                                <tr>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        Partner Name
                                    </th>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        Email
                                    </th>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        Nationality
                                    </th>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        More
                                    </th>
                                </tr>

                            </thead>

                            @foreach($partners as $partner)

                            <tbody>

                                <tr>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        <a class="text-lg lg:text-2xl font-bold"
                                            href="{{ url('/all-partners?search='.$partner -> partner_name) }}">
                                            {{$partner -> partner_name}}
                                        </a>
                                    </td>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        <h3 class="text-lg lg:text-2xl font-bold">
                                            {{$partner -> email}}
                                        </h3>
                                    </td>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        <a class="text-lg m-2 lg:text-xl w-24 hover:text-blue-500"
                                            href="{{ url('/all-partners?search='.$partner -> partner_nationality) }}">
                                            {{$partner -> partner_nationality}}
                                        </a>
                                    </td>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        <a class="hover:text-blue-700"
                                            href="{{ url('/all-partners/'.$partner -> partner_id) }}">
                                            <i class="fa-solid fa-circle-info mr-1"></i> More Info
                                        </a>
                                    </td>

                                </tr>

                                @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>

            </section>

        </div>

    </div>

</x-layout-admin>
