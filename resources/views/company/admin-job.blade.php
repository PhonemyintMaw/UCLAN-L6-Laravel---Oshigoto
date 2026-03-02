<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <!-- Top Section -->
            <section class="grid grid-cols-1 items-center mb-5">

                <div class="flex justify-left m-5">
                    <h1 class="text-3xl font-bold">
                        Jobs
                    </h1>
                </div>

            </section>

            <!-- Job List -->
            <section>

                <!-- Search Bar -->
                <div class="mb-10">
                    <p class="ml-4">
                        Search with Company Name, Job Type, Job Title, Japanese Language Level, or
                        Applicable Nationality
                    </p>
                    <form action="/all-listed-jobs">

                        @include('components._search')

                    </form>
                </div>
                <div class="m-5 flex flex-col justify-center">

                    <div class="flex justify-between mb-5">

                        <div class="col-span-1">
                            <a href="/all-listed-jobs" class="transition duration-300 inline-block border-2 
                            font-bold border-black text-black py-2 px-4 rounded-xl 
                            hover:bg-black hover:text-white shadow-lg">
                                Refresh
                            </a>
                        </div>

                        <div class="col-span-1">
                            <a href="/add-new-job" class="transition duration-300 inline-block border-2 
                            font-bold border-black text-black py-2 px-4 rounded-xl 
                            hover:bg-green-700 hover:text-white hover:border-green-700 shadow-lg">
                                <i class="fa-solid fa-paper-plane"></i> Add New Job
                            </a>
                        </div>

                    </div>

                    @include('components._message')

                    <!-- JOB SECTION -->
                    <div class="border-black border-4 rounded-2xl text-black pb-5">

                        <h1 class="text-center font-bold text-lg text-white bg-black border-b-black p-5">
                            Job List
                        </h1>

                        <div class="h-screen overflow-y-auto scrollbar">

                            <table class="w-full table-auto bg-white text-black">

                                <thead>

                                    <tr>
                                        <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                            Job Code
                                        </th>
                                        <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                            Company Name
                                        </th>
                                        <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                            Job Type
                                        </th>
                                        <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                            Japanese Language Level
                                        </th>
                                        <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                            Job Nationality
                                        </th>
                                        <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                            More
                                        </th>
                                    </tr>

                                </thead>

                                @foreach($jobs as $job)

                                <tbody>
                                    <tr>
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                            <div class="text-sm font-bold lg:text-lg">
                                                {{$job -> job_code}}
                                            </div>
                                        </td>
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                            <div class="text-sm font-bold lg:text-lg">
                                                {{$job -> company_name}}
                                            </div>

                                        </td>
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">

                                            <a class="text-sm font-bold lg:text-lg"
                                                href="/all-listed-jobs?search={{$job -> job_type}}">{{$job -> job_type}}</a>

                                        </td>
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">

                                            <a class="text-sm font-bold lg:text-lg"
                                                href="/all-listed-jobs?search={{$job -> required_jp_level}}">{{$job -> required_jp_level}}</a>

                                        </td>
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">

                                            <a class="text-sm font-bold lg:text-lga"
                                                href="/all-listed-jobs?search={{$job -> job_nationality}}">{{$job -> job_nationality}}</a>

                                        </td>
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                            <ul>

                                                <li class="flex justify-center mb-1">
                                                    <a href="/all-listed-jobs/{{$job -> job_code}}"
                                                        class="items-center text-blue-700 hover:underline">

                                                        More Info

                                                    </a>
                                                </li>

                                                <li class="flex justify-center mb-1">
                                                    <a href="/all-listed-jobs/{{$job -> job_code}}/edit"
                                                        class="items-center text-blue-700 hover:underline">

                                                        Edit

                                                    </a>
                                                </li>

                                            </ul>
                                        </td>

                                    </tr>
                                </tbody>

                                @endforeach

                            </table>

                        </div>

                    </div>

                </div>

            </section>

        </div>

    </div>

</x-layout-admin>
