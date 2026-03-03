<x-layout>

    <div class="flex justify-center mb-20">
        <div class="w-5/6">

            <a href="{{ url('/home') }}" class="mt-5 mb-10 ml-5 inline-block border-2 font-bold 
        border-black text-white bg-black py-1 px-2 rounded-xl uppercase hover:text-white 
        shadow-lg">
                <i class="fa-solid fa-arrow-left"></i> Return All CV
            </a>

            @include('components._view-cv')

            <div class="flex justify-center mt-10">

                <a href="{{ url('/partner-view-cv/'.$cv -> cv_code.'/edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg 
            shadow hover:bg-blue-700 transition">
                    <i class="fa-solid fa-pen-to-square"></i>Edit
                </a>

            </div>

        </div>
    </div>


</x-layout>
