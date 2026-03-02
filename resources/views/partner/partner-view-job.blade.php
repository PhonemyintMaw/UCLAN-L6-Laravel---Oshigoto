<x-layout>

    <div class="flex justify-center mb-20">
        <div class="5/6">

            <a href="/apply-jobs" class="mt-5 ml-5 mb-10 inline-block border-2 font-bold 
            border-black text-white bg-black py-1 px-2 rounded-xl uppercase hover:text-white 
            shadow-lg">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>

            @include('components._view-job')

            <div class="flex items-center justify-center ">
                <a href="/job-application/{{$job -> job_code}}" class="transition duration-300 m-5 border-2 
                    font-bold border-red-700 
                    text-white bg-red-700 py-2 px-4 rounded-3xl uppercase shadow-lg hover:bg-white hover:text-red-700">
                    Apply this Job
                </a>
            </div>

        </div>
    </div>

</x-layout>
