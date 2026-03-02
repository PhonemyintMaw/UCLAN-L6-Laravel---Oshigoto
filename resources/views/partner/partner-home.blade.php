<x-layout>

    @include('components._partner-nav')

    <main class="flex justify-center mb-20">

        <div class="w-5/6">

            @include('components._message')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mx-4 mb-5">

                <div class="col-span-1 flex items-center justify-between bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex items-center">
                        <i class="fa-solid fa-address-card fa-2xl ml-5 mr-5"></i>

                        <h3 class="text-2xl">
                            Registered Candidate
                        </h3>
                    </div>

                    <div class="items-center text-xl font-bold text-blue-700">
                        {{$total}}
                    </div>
                </div>

                <div class="col-span-1 flex items-center justify-between bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex items-center">
                        <i class="fa-solid fa-certificate fa-2xl ml-5 mr-5 text-red-700"></i>

                        <h3 class="text-2xl">
                            Passed Candidate
                        </h3>
                    </div>

                    <div class="items-center text-xl font-bold text-blue-700">
                        {{$passed}}
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1">
                <p class="ml-4">Search Names Here</p>

                <div class="grid grid-cols-6 items-center">
                    <form class="col-span-5" action="/home">

                        @include('components._search')

                    </form>
                    <a href="/home" class="m-4 col-span-1 transition duration-300 inline-block border-2 
            font-bold border-black text-black rounded-xl py-2
            hover:bg-black hover:text-white shadow-lg flex justify-center">
                        Refresh
                    </a>
                </div>

            </div>

            <div class="flex justify-center mt-10">

                @if($cvs -> isEmpty())

                <div class="text-center text-gray-500 italic py-10">
                    No CVs have been submitted yet. Click <span class="text-black font-bold">Make New CV Forms</span> to
                    create CV
                </div>

                @else

                <div class="h-screen overflow-y-auto scrollbar border-2 border-t-2 border-black">

                    <table class="w-full table-auto rounded-xl py-2 px-4">

                        <thead class="bg-black text-white">
                            <tr>
                                <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                    Photo
                                </th>
                                <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                    Name
                                </th>
                                <th>
                                    <table class="w-full table-auto">
                                        <tr class=" text-center">
                                            Natioanlity
                                        </tr>
                                        <tr>
                                            <td>
                                                Age
                                            </td>
                                            <td>
                                                /
                                            </td>
                                            <td>
                                                Gender
                                            </td>
                                        </tr>
                                    </table>
                                </th>
                                <th>
                                    Job Type
                                </th>
                                <th>
                                    Language Profficiency
                                </th>
                                <th>
                                    Religion
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Edit / View
                                </th>
                            </tr>
                        </thead>

                        @foreach($cvs as $cv)

                        <tbody>
                            <tr class="p-5">
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
                                    <table class="w-full table-auto">
                                        <tr class="text-center">
                                            {{$cv -> cv_nationality}}
                                        </tr>
                                        <tr>
                                            <td>
                                                {{$cv -> cv_age}}
                                            </td>
                                            <td>
                                                /
                                            </td>
                                            <td>
                                                {{$cv -> cv_gender}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-center">

                                    @if($cv->cv_job_certificate)

                                    <a href="{{ asset('storage/' . $cv->cv_job_certificate) }}" target="_blank"
                                        class="text-blue-700 hover:underline p-3">
                                        <i class="fa fa-file-pdf mr-1"></i> {{$cv -> cv_job_type}}
                                    </a>

                                    @else

                                    {{$cv -> cv_job_type}}

                                    @endif

                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-center">

                                    @if($cv->cv_jp_certificate)

                                    <a href="{{ asset('storage/' . $cv->cv_jp_certificate) }}" target="_blank"
                                        class="text-blue-700 hover:underline p-3">
                                        <i class="fa fa-file-pdf mr-1"></i> {{$cv -> cv_jp_level}}
                                    </a>

                                    @else

                                    {{$cv -> cv_jp_level}}

                                    @endif
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                    {{$cv -> cv_religion}}
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                    {{$cv -> cv_status}}
                                </td>
                                <td class="border-t border-b border-gray-300 text-center">
                                    <a href="/partner-view-cv/{{$cv -> cv_code}}/edit"
                                        class="text-blue-400 px-6 py-2 rounded-xl hover:underline hover:text-blue-700">
                                        <i class="fa-solid fa-pen-to-square"></i>Edit
                                    </a>
                                    <a href="/partner-view-cv/{{$cv -> cv_code}}"
                                        class="text-blue-400 px-6 py-2 rounded-xl hover:underline hover:text-blue-700">
                                        View
                                    </a>
                                </td>

                            </tr>

                        </tbody>

                        @endforeach

                    </table>

                </div>

                @endif

            </div>

        </div>

    </main>

</x-layout>
