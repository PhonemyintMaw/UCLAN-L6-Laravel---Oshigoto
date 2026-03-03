<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <!-- UPPER SECTION -->
            <section class="flex justify-between mb-20">

                <a href="{{ url('/all-partners') }}" class="mt-5 ml-5 inline-block border-2 font-bold 
        border-black text-white bg-black py-1 px-2 rounded-xl uppercase hover:text-white 
        shadow-lg">
                    <i class="fa-solid fa-arrow-left"></i> Back to All Partner List
                </a>

                <a href="{{ url('/all-partners/'.$partner -> partner_id.'/edit') }}" class="transition 
                    duration-200 bg-green-700 mt-5 ml-5 inline-block border-2 
                    font-bold border-green-700 text-white bg-black py-1 px-2 rounded-xl uppercase 
                    hover:text-green-700 hover:bg-white">
                    <i class="fa-solid fa-pencil"></i> Edit Partner
                </a>

            </section>

            <!-- LOWER SECTION -->
            <section class="m-5 flex flex-col justify-center">


                <header class="text-center mb-5">

                    <h1 class="text-3xl font-bold uppercase">
                        Partner Information
                    </h1>

                </header>

                <div class="flex justify-center">

                    <div class="w-3/4">

                        <!-- PARTNER SECTION -->
                        <div class="border-black border-4 rounded-2xl text-black overflow-hidden flex flex-col mb-10">

                            <div class="text-2xl font-bold text-center bg-gray-300 max-h border-b-2 p-3 text-center">

                                General Information

                            </div>

                            <div class="p-3">
                                <ul>
                                    <li>
                                        Partner ID: <span class="font-bold">{{$partner -> partner_id}}</span>
                                    </li>

                                    <li>
                                        Partner Name: <span class="font-bold">{{$partner -> partner_name}}</span>
                                    </li>

                                    <li>
                                        Partner Email: <span class="font-bold">{{$partner -> email}}</span>
                                    </li>

                                    <li>
                                        Partner Address: <span class="font-bold">{{$partner -> partner_address}}</span>
                                    </li>

                                    <li>
                                        Partner Nation: <span
                                            class="font-bold">{{$partner -> partner_nationality}}</span>
                                    </li>
                                </ul>

                            </div>

                        </div>

                        <!-- PARTNER'S CV SECTION -->
                        <div class="border-black border-4 rounded-2xl text-black pb-5">

                            <h1 class="text-center font-bold text-lg text-white bg-black border-b-black p-5">
                                CV Created Candidate List
                            </h1>

                            <div class="h-96 overflow-y-auto scrollbar">

                                <table class="w-full table-auto bg-white text-black">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                                Photo
                                            </th>
                                            <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                                Name
                                            </th>
                                            <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                                Language Level
                                            </th>
                                            <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                                Job Type
                                            </th>
                                            <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                                More Info
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($cvs as $cv)

                                        <tr>
                                            <td class="border-t border-b border-gray-300 flex justify-center">
                                                @if($cv->cv_profile)

                                                <img src="{{ asset('storage/' . $cv->cv_profile) }}" alt="Profile Photo"
                                                    class="w-28 h-32 object-cover border border-gray-300 m-2">

                                                @endif
                                            </td>
                                            <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                                {{$cv -> cv_name}}
                                            </td>
                                            <td class="px-4 py-8 border-t border-b border-gray-300 text-center">

                                                @if($cv->cv_jp_certificate)

                                                <a href="{{ asset('storage/' . $cv->cv_jp_certificate) }}"
                                                    target="_blank" class="text-blue-700 hover:underline p-3">
                                                    <i class="fa fa-file-pdf mr-1"></i> {{$cv -> cv_jp_level}}
                                                </a>
                                                @else

                                                {{$cv -> cv_jp_level}}

                                                @endif

                                            </td>
                                            <td
                                                class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">

                                                @if($cv->cv_job_certificate)

                                                <a href="{{ asset('storage/' . $cv->cv_job_certificate) }}"
                                                    target="_blank" class="text-blue-700 hover:underline p-3">
                                                    <i class="fa fa-file-pdf mr-1"></i> {{$cv -> cv_job_type}}
                                                </a>

                                                @else

                                                {{$cv -> cv_job_type}}

                                                @endif

                                            </td>
                                            <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                                <a href="/all-cv/{{$cv -> cv_code}}"
                                                    class="text-blue-700 hover:underline">
                                                    <i class="fa fa-info-circle mr-2"></i>CV Info
                                                </a>
                                            </td>

                                        </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </div>

    </div>

</x-layout-admin>
