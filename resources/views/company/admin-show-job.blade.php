<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <div class="flex justify-between mb-20">

                <a href="/all-listed-jobs" class="mt-5 ml-5 inline-block border-2 font-bold 
        border-black text-white bg-black py-1 px-2 rounded-xl uppercase hover:text-white 
        shadow-lg">
                    <i class="fa-solid fa-arrow-left"></i> All Job List
                </a>

                <a href="/all-listed-jobs/{{$job -> job_code}}/edit" class="transition duration-200 mt-5 ml-5 
        inline-block font-bold text-white bg-blue-700 py-1 px-2 
        rounded-xl uppercase hover:bg-blue-400">
                    <i class="fa fa-pencil mr-2"></i>Edit
                </a>

            </div>

            <!-- JOB SECTION -->
            @include('components._view-job')

        </div>

    </div>

</x-layout-admin>
