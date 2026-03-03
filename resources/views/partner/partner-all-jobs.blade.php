<x-layout>

    @include('components._partner-nav')

    <div class="flex justify-center mb-20">

        <div class="w-5/6">
            <div class="grid grid-cols-1 mb-10">
                <p class="ml-4">Search Jobs with Job Type, Language Level or Job Title</p>

                <div class="grid grid-cols-6 items-center">
                    <form class="col-span-5" action="{{ url('/apply-jobs') }}">

                        @include('components._search')

                    </form>
                    <a href="{{ url('/apply-jobs') }}" class="m-4 col-span-1 transition duration-300 inline-block border-2 
            font-bold border-black text-black rounded-xl py-2
            hover:bg-black hover:text-white shadow-lg flex justify-center">
                        Refresh
                    </a>
                </div>

            </div>

            <main>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 space-y-0 mx-4">

                    @foreach($jobs as $job)

                    <div class="bg-gray-50 border border-gray-200 rounded p-5">

                        <div class="m-3">
                            <div class="text-xl font-bold mb-3">
                                {{$job -> job_code}}
                            </div>

                            <h3 class="text-2xl">
                                {{$job -> job_title}}
                            </h3>

                            <div class="text-xl font-bold">
                                {{$job -> company_name}}
                            </div>
                        </div>

                        <div class="m-3">

                            <ul class="flex">

                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 m-2 text-xs max-w-24">
                                    <a href="{{ url('/apply-jobs?search='.$job->job_type) }}">{{$job -> job_type}}</a>
                                </li>

                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 m-2 text-xs max-w-24">
                                    <a
                                        href="{{ url('/apply-jobs?search='.$job->required_jp_level) }}">{{$job -> required_jp_level}}</a>
                                </li>

                            </ul>

                        </div>

                        <div class="m-3 grid lg:grid-cols-1 grid-cols-2">

                            <div class="col-span-1 text-lg">

                                <div class="flex items-center">
                                    <i class="fa-solid fa-location-dot mr-2"></i>{{$job -> company_location}}
                                </div>

                                <div class="flex items-center">
                                    <i class="fas fa-flag mr-2"></i> {{$job -> job_nationality}}
                                </div>

                                <div class="flex items-center">
                                    <span class="font-bold mr-2 text-red-700">Application Deadline :
                                    </span>{{$job -> application_deadline}}
                                </div>

                            </div>

                            <div class="col-span-1 flex justify-center m-5">
                                <a href="{{ url('/job-info/'.$job -> job_code) }}"
                                    class="border-black border-2 rounded-xl text-black bg-white py-1 px-2 hover:bg-black hover:text-white">
                                    See More
                                </a>
                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

                <div class="m-5">
                    {{ $jobs->links() }}
                </div>

            </main>
        </div>

    </div>

</x-layout>
