<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <div class="flex justify-between mb-10">

                <a href="/all-cv" class="mt-5 ml-5 inline-block border-2 font-bold 
        border-black text-white bg-black py-1 px-2 rounded-xl uppercase hover:text-white 
        shadow-lg">
                    <i class="fa-solid fa-arrow-left"></i> Go to All CVs
                </a>

            </div>

            <!-- CV SECTION -->
            @include('components._view-cv')

        </div>

    </div>



</x-layout-admin>
