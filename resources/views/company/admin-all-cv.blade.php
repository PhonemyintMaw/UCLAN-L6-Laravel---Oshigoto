<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <!-- UPPER SECTION -->
            <section class="grid grid-cols-1 items-center mb-5">

                <div class="flex justify-left m-5">
                    <h1 class="text-3xl font-bold">
                        All Registered CVs
                    </h1>
                </div>

            </section>

            <!-- Search Bar -->
            <div class="mb-10">
                <p class="ml-4">
                    Search CV with Name, Japanese Language Level, Job Type or Nationality
                </p>
                <form action="{{ url('/all-cv') }}">

                    @include('components._search')

                </form>
            </div>

            <!-- LOWER SECTION -->
            <section class="m-5 flex flex-col justify-center">

                <div class="flex justify-between mb-5">
                    <div class="flex justify-center">
                        <a href="{{ url('/all-cv') }}" class="transition duration-300 inline-block border-2 
            font-bold border-black text-black py-2 px-4 rounded-xl 
            hover:bg-black hover:text-white shadow-lg">
                            Refresh
                        </a>
                    </div>

                    <div class="flex justify-center">
                        <a href="{{ url('/all-partners') }}" class="transition duration-300 inline-block border-2 
            font-bold border-black text-black py-2 px-4 rounded-xl 
            hover:bg-black hover:text-white shadow-lg">
                            Check CV by Partner
                        </a>
                    </div>
                </div>

                @include('components._message')

                <!-- CV LIST -->
                <div class="border-black border-4 rounded-2xl text-black pb-5">

                    <h1 class="text-center font-bold text-lg text-white bg-black border-b-black p-5">
                        Registered CV List
                    </h1>

                    <div class="h-screen overflow-y-auto scrollbar">

                        <table class="w-full table-auto bg-white text-black">

                            <thead>
                                <tr>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        School
                                    </th>
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
                                        Nationality
                                    </th>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        Status
                                    </th>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        More Info
                                    </th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach($cvs as $cv)

                                <tr>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        {{$cv -> partner -> partner_name}}
                                    </td>
                                    <td class="border-t border-b border-gray-300 flex justify-center">
                                        @if($cv->cv_profile)

                                        <img src="{{ asset('storage/' . $cv->cv_profile) }}" alt="Profile Photo"
                                            class="w-28 h-32 object-cover border border-gray-300 m-2">

                                        @endif
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        {{$cv -> cv_name}}
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        <a href="{{ url('/all-cv?search='.$cv -> cv_jp_level) }}">
                                            {{$cv -> cv_jp_level}}
                                        </a>
                                        @if($cv -> cv_jp_certificate)

                                        <a href="{{ asset('storage/' . $cv -> cv_jp_certificate) }}" target="_blank"
                                            class="text-blue-700 hover:underline p-3">
                                            <i class="fa fa-file-pdf mr-1"></i>
                                        </a>

                                        @endif
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        <a href="{{ url('/all-cv?search='.$cv -> cv_job_type) }}">
                                            {{$cv -> cv_job_type}}
                                        </a>
                                        @if($cv -> cv_job_certificate)

                                        <a href="{{ asset('storage/' . $cv -> cv_job_certificate) }}" target="_blank"
                                            class="text-blue-700 hover:underline p-3">
                                            <i class="fa fa-file-pdf mr-1"></i>
                                        </a>

                                        @endif
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        <a href="/all-cv?search={{$cv -> cv_nationality}}">
                                            {{$cv -> cv_nationality}}
                                        </a>
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        <a href="/all-cv?search={{$cv -> cv_status}}">
                                            {{$cv -> cv_status}}
                                        </a>
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        <a href="{{ url('/all-cv/'.$cv -> cv_code) }}"
                                            class="text-blue-700 hover:underline"><i
                                                class="fa fa-info-circle mr-2"></i>More Info</a>
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

    </x-ut-admin>
