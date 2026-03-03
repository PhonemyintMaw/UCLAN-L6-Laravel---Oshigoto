<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <h1 class="font-bold text-3xl text-center m-5">
                EVALUATION
            </h1>

            <main class="grid grid-cols-1">

                <!-- CV SECTION -->
                <div class="col-span-1">
                    @include('components._view-cv')
                </div>

                <div class="col-span-1 ">

                    <!-- EVALUATION SECTION -->
                    <div class="flex flex-col items-center">

                        <div class="p-10 border-2 border-black rounded-2xl">

                            @include('components._message')

                            <form method="post" action="{{ url('/admin-applications/'.$cv->cv_code.'/evaluate') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="font-bold text-xl text-blue-900 mb-10">
                                    {{$cv -> cv_name}}
                                </div>

                                <div class="mb-10">
                                    <label for="cv_status" class="inline-block text-lg mb-2 font-bold">
                                        Interview Result Status
                                    </label>

                                    <select name="cv_status" id="cv_status"
                                        class="border border-gray-200 rounded p-2 w-full">

                                        <option value="{{$cv -> cv_status}}">{{$cv -> cv_status}}</option>
                                        <option value="Not Applied" @selected(old('cv_status')=='Applied' )>Applied
                                        </option>
                                        <option value="Not Applied" @selected(old('cv_status')=='Not Applied' )>Not
                                            Applied
                                        </option>
                                        <option value="Pre-Interview Pass"
                                            @selected(old('cv_status')=='Pre-Interview Pass' )>
                                            Pre-Interview Pass</option>
                                        <option value="Final-Interview Pass"
                                            @selected(old('cv_status')=='Final-Interview Pass' )>
                                            Final-Interview Pass</option>
                                        <option value="Final Pass" @selected(old('cv_status')=='Left' )>Left</option>

                                    </select>
                                </div>

                                <div class="mb-10">

                                    <label for="cv_evaluation" class="inline-block text-lg mb-2">
                                        Interview Evaluation
                                    </label>

                                    <textarea type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_evaluation" rows="4" value="{{$cv -> cv_evaluation}}">
                                    </textarea>

                                </div>

                                <div class="flex justify-center">

                                    <button type="submit" class="border-black border-2 bg-black text-white 
                                        rounded py-2 px-4 hover:bg-white hover:text-black">
                                        Evaluate
                                    </button>

                                </div>

                            </form>

                        </div>

                        <div>
                            <a href="{{ url('/admin-applications') }}" class="transition duration-200 mt-5 
            inline-block font-bold text-white bg-black py-2 px-4 
            rounded-xl uppercase">
                                Back to Application Page
                            </a>
                        </div>

                    </div>

                </div>

            </main>

        </div>

    </div>

</x-layout-admin>
