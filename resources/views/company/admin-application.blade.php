<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <section class="grid grid-cols-1 items-center mb-5">

                <div class="flex justify-left m-5">
                    <h1 class="text-3xl font-bold">
                        All Applications
                    </h1>
                </div>

            </section>

            <div class="grid grid-cols-1">
                <p class="ml-4">
                    Search with Jobe Code or Company Name
                </p>
                <div class="grid grid-cols-6 items-center">
                    <form class="col-span-5" action="/admin-applications">

                        @include('components._search')

                    </form>
                    <a href="/admin-applications" class="m-4 col-span-1 transition duration-300 inline-block border-2 
            font-bold border-black text-black rounded-xl py-2
            hover:bg-black hover:text-white shadow-lg flex justify-center">
                        Refresh
                    </a>
                </div>
            </div>

            <section class="m-5 flex flex-col justify-center">

                @if($jobs -> isEmpty())

                <div class="text-center text-gray-500 italic py-10">
                    No job applications have been submitted yet. Wait for Partner applications
                    to see application list.
                </div>

                @else

                @foreach($jobs as $job)
                <div class="h-[550px] overflow-x-scroll scrollbar border-2 border-t-2 border-black mb-20">

                    <table class="w-full table-auto rounded-xl py-2 px-4 mb-5">

                        <thead>
                            <tr class="border-black border-2">
                                <th class=" px-2 py-4">
                                    Code:
                                </th>
                                <th>
                                    <span class="text-blue-700">{{ $job->job_code }}</span>
                                </th>
                                <th class="px-2 py-4 border-t border-b border-gray-300 text-center">
                                    Company:
                                </th>
                                <th class="px-2 py-4 border-t border-b border-gray-300 text-center">
                                    <span class="text-blue-700">{{ $job->company_name }}</span>
                                </th>
                                <th class="px-2 py-4 border-t border-b border-gray-300 text-center">
                                    Status:
                                </th>
                                <th class="px-2 py-4 border-t border-b border-gray-300 text-center">
                                    <span class="text-blue-700">{{ $job->job_availability }}</span>
                                </th>
                                <th class="px-2 py-4 border-t border-b border-gray-300 text-center">
                                    <a href="/all-listed-jobs/{{$job -> job_code}}">
                                        <span class="text-blue-700">See Job Info</span></a>
                                </th>
                            </tr>
                        </thead>

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
                                    Status
                                </th>
                                <th>
                                    Evaluate
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($job->application as $app)

                            <tr>
                                <td class="border-t border-b border-gray-300 flex justify-center">
                                    @if($app->cv->cv_profile)

                                    <img src="{{ asset('storage/' . $app->cv->cv_profile) }}" alt="Profile Photo"
                                        class="w-28 h-32 object-cover border border-gray-300 m-2">

                                    @endif
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                    {{ $app->cv->cv_name }}
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                    <table class="w-full table-auto">
                                        <tr class="text-center">
                                            {{ $app->cv->cv_nationality }}
                                        </tr>
                                        <tr>
                                            <td>
                                                {{ $app->cv->cv_age }}
                                            </td>
                                            <td>
                                                /
                                            </td>
                                            <td>
                                                {{ $app->cv->cv_gender }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                    @if($app->cv->cv_job_certificate)

                                    <a href="{{ asset('storage/' . $app->cv->cv_job_certificate) }}" target="_blank"
                                        class="text-blue-700 hover:underline p-3">
                                        <i class="fa fa-file-pdf mr-1"></i> {{$app->cv -> cv_job_type}}
                                    </a>

                                    @else

                                    {{$app->cv -> cv_job_type}}

                                    @endif
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                    @if($app->cv->cv_jp_certificate)

                                    <a href="{{ asset('storage/' . $app->cv->cv_jp_certificate) }}" target="_blank"
                                        class="text-blue-700 hover:underline p-3">
                                        <i class="fa fa-file-pdf mr-1"></i> {{$app->cv -> cv_jp_level}}
                                    </a>
                                    @else

                                    {{$app->cv -> cv_jp_level}}

                                    @endif
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                    {{ $app->cv->cv_status }}
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                    <a href="/admin-applications/{{$app->cv->cv_code}}/evaluate"
                                        class="text-blue-700 hover:underline">
                                        <i class="fa fa-pencil-square mr-1"></i>Evaluate
                                    </a>
                                </td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>
                @endforeach

                <div class="m-5">
                    {{ $jobs->links() }}
                </div>

                @endif

            </section>

        </div>

    </div>

</x-layout-admin>
