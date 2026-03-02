<x-layout>
    @include('components._partner-nav')

    <main class="flex justify-center mb-20">

        <div class="w-5/6">

            <div class="grid grid-cols-1">
                <p class="ml-4">Search Jobs with Job Code or Company Name</p>

                <div class="grid grid-cols-6 items-center">
                    <form class="col-span-5" action="/partner-applied-list">

                        @include('components._search')

                    </form>
                    <a href="/partner-applied-list" class="m-4 col-span-1 transition duration-300 inline-block border-2 
            font-bold border-black text-black rounded-xl py-2
            hover:bg-black hover:text-white shadow-lg flex justify-center">
                        Refresh
                    </a>
                </div>

            </div>

            @include('components._message')

            <div class="m-5 flex flex-col items-center justify-center mt-10">

                @if($jobs -> isEmpty())

                <div class="text-center text-gray-500 italic py-10">
                    No job applications have been submitted yet. Go to <span class="text-black font-bold">Apply New
                        Jobs</span> to apply Jobs
                </div>

                @else

                @foreach($jobs as $job)

                <div class="h-[600px] w-5/6 overflow-x-scroll scrollbar border-2 border-t-2 border-black mb-10">

                    <table class="w-full table-auto rounded-xl py-2 px-4 mb-5">

                        <thead>
                            <tr class="bg-gray-50 text-center">
                                <th class="px-2 py-4">Job Code:</th>
                                <th class="px-2 py-4 text-blue-700">{{ $job->job_code }}</th>
                                <th class="px-2 py-4">|</th>
                                <th class="px-2 py-4">Company Name:</th>
                                <th class="px-2 py-4 text-blue-700">{{ $job->company_name }}</th>
                                <th class="px-2 py-4 text-blue-700">{{ $job->job_availability }}</th>
                            </tr>
                        </thead>

                        <thead class="bg-black text-white">
                            <tr>
                                <th class="px-4 py-3 text-center">Photo</th>
                                <th class="px-4 py-3 text-center">Name</th>
                                <th class="px-4 py-3 text-center">Nationality / Age / Gender</th>
                                <th class="px-4 py-3 text-center">Job Type</th>
                                <th class="px-4 py-3 text-center">Language</th>
                                <th class="px-4 py-3 text-center">Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($job->application as $app)
                            <tr class="border-t border-b border-gray-300 hover:bg-gray-50 text-center">
                                <td class="py-3 flex justify-center">
                                    @if($app->cv->cv_profile)

                                    <img src="{{ asset('storage/' . $app->cv->cv_profile) }}" alt="Profile Photo"
                                        class="w-28 h-32 object-cover border border-gray-300 m-2">

                                    @endif
                                </td>
                                <td class="py-3">{{ $app->cv->cv_name }}</td>
                                <td class="py-3">
                                    {{ $app->cv->cv_nationality }} / {{ $app->cv->cv_age }} / {{ $app->cv->cv_gender }}
                                </td>
                                <td class="py-3">

                                    @if($app->cv->cv_job_certificate)

                                    <a href="{{ asset('storage/' . $app->cv->cv_job_certificate) }}" target="_blank"
                                        class="text-blue-700 hover:underline p-3">
                                        <i class="fa fa-file-pdf mr-1"></i> {{$app->cv -> cv_job_type}}
                                    </a>

                                    @else

                                    {{$app->cv -> cv_job_type}}

                                    @endif

                                </td>
                                <td class="py-3">

                                    @if($app->cv->cv_jp_certificate)

                                    <a href="{{ asset('storage/' . $app->cv->cv_jp_certificate) }}" target="_blank"
                                        class="text-blue-700 hover:underline p-3">
                                        <i class="fa fa-file-pdf mr-1"></i> {{$app->cv -> cv_jp_level}}
                                    </a>
                                    @else

                                    {{$app->cv -> cv_jp_level}}

                                    @endif

                                </td>
                                <td class="py-3">{{ $app->cv->cv_status }}</td>
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

            </div>

        </div>

    </main>
</x-layout>
