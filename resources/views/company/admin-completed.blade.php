<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <section class="grid grid-cols-1 lg:grid-cols-8 items-center mb-5">

                <div class="col-span-3 flex justify-left m-5">
                    <h1 class="text-3xl font-bold">
                        Final Passed CV List
                    </h1>
                </div>

                <!-- Search Bar -->
                <div class="col-span-5 flex justify-end m-5">
                    <h1 class="text-3xl font-bold">
                        Total Passed: <span class="text-blue-500">{{$totalPassed}}</span>
                    </h1>
                </div>

            </section>

            <section class="m-5 flex flex-col justify-center">

                <div class="border-black border-4 rounded-2xl text-black pb-5">

                    <h1 class="text-center font-bold text-lg text-white bg-black border-b-black p-5">
                        Interview Passed CV List
                    </h1>

                    <div class="h-screen overflow-y-auto scrollbar">

                        <table class="w-full table-auto bg-white text-black">

                            <thead>
                                <tr>

                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        Passed Job
                                    </th>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        Photo
                                    </th>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        Name
                                    </th>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        Job Type
                                    </th>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        School
                                    </th>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        Nationality
                                    </th>
                                    <th class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        CV Info
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach($jobs as $job)

                                @foreach($job->application as $app)

                                <tr>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        {{$app -> job -> job_code}}
                                    </td>
                                    <td class="border-t border-b border-gray-300 flex justify-center">
                                        @if($app->cv->cv_profile)

                                        <img src="{{ asset('storage/' . $app->cv->cv_profile) }}" alt="Profile Photo"
                                            class="w-28 h-32 object-cover border border-gray-300 m-2">

                                        @endif
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        {{$app -> cv -> cv_name}}
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        @if($app->cv->cv_job_certificate)

                                        <a href="{{ asset('storage/' . $app->cv->cv_job_certificate) }}" target="_blank"
                                            class="text-blue-700 hover:underline p-3">
                                            <i class="fa fa-file-pdf mr-1"></i> {{$app->cv -> cv_job_type}}
                                        </a>

                                        @else

                                        {{$app-> cv -> cv_job_type}}

                                        @endif
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        {{$app -> cv -> partner -> partner_name}}
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        {{$app -> cv -> cv_nationality}}
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        <a href="/all-cv/{{$app -> cv -> cv_code}}"
                                            class="text-blue-700 hover:underline">
                                            <i class="fa fa-info-circle mr-2"></i>CV Info</a>
                                    </td>

                                </tr>

                                @endforeach

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </section>

        </div>

    </div>
</x-layout-admin>
