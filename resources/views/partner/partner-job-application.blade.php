<x-layout>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <a href="{{ url('/job-info/'.$job -> job_code) }}" class="mt-5 mb-10 ml-5 inline-block border-2 font-bold 
border-black text-white bg-black py-1 px-2 rounded-xl uppercase hover:text-white 
shadow-lg">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>

            <!-- Upper Section -->
            <div class="flex justify-center">

                <div class="max-w-4xl border-black border-4 rounded-2xl text-black m-10">

                    <ul class="flex items-center justify-center font-bold p-5">
                        <li>
                            Job Code: <span class="text-blue-700">{{$job -> job_code}}</span>
                        </li>
                        <li class="mx-2">
                            /
                        </li>
                        <li>
                            Company Name: <span class="text-blue-700">{{$job -> company_name}}</span>
                        </li>
                    </ul>

                </div>

            </div>

            <!-- Application Selection -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

                <!-- Select Section -->
                <div class="border-black border-4 rounded-2xl text-black pb-5">

                    <h1 class="text-center font-bold text-lg text-white bg-black border-b-black p-5">
                        Applicable Candidate List
                    </h1>

                    <div class="h-96 overflow-y-auto scrollbar">

                        <table class="w-full table-auto bg-white text-black">

                            @foreach($availableCvs as $cv)

                            <tbody>

                                <tr>
                                    <td class="border-t border-b border-gray-300 items-center">
                                        <img src="" alt="">
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        {{$cv->cv_name}}
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        <table class="w-full table-auto">

                                            <tr>
                                                <td>
                                                    {{$cv->cv_age}}
                                                </td>
                                                <td>
                                                    /
                                                </td>
                                                <td>
                                                    {{$cv->cv_gender}}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        <form
                                            action="{{ route('job.addCV', ['job_id' => $job->id, 'cv_id' => $cv->id]) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="cv_id" value="{{ $cv->id }}">
                                            <button type="submit" class="transition duration-300 border 
                                            rounded-2xl border-black py-1 px-2 
                                            hover:bg-green-700 hover:border-green-700 hover:text-white">
                                                <i class="fa fa-plus"></i> Add
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            </tbody>

                            @endforeach

                        </table>

                    </div>

                </div>

                <!-- Selected Section -->
                <div class="border-black border-4 rounded-2xl text-black">
                    <h1 class="text-center font-bold text-lg text-white bg-black border-b-black p-5">
                        Applied Candidates
                    </h1>
                    @include('components._message')
                    <div class="h-96 overflow-y-auto scrollbar">

                        <table class="w-full table-auto bg-white text-black">

                            @foreach($appliedCvs as $cv)

                            <tbody>

                                <tr>
                                    <td class="border-t border-b border-gray-300 items-center">
                                        <img src="" alt="">
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        {{$cv -> cv_name}}
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center">
                                        <table class="w-full table-auto">

                                            <tr>
                                                <td>
                                                    {{$cv -> cv_age}}
                                                </td>
                                                <td>
                                                    /
                                                </td>
                                                <td>
                                                    {{$cv -> cv_gender}}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-center font-bold">
                                        <form
                                            action="{{ route('job.removeCV', ['job_id' => $job->id, 'cv_id' => $cv->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="cv_id" value="{{ $cv->id }}">
                                            <button type="submit" class="transition duration-300 border rounded-lg 
                                            border-black 
                                            py-1 px-2 hover:border-red-700 hover:bg-red-700 hover:text-white">
                                                <i class="fa fa-trash"></i> Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            </tbody>

                            @endforeach

                        </table>

                    </div>

                </div>

            </div>

            <!-- Lower Section -->
            <div class="flex justify-center">

                <a href="{{ url('/partner-applied-list') }}" class="mt-10 inline-block border-2 font-bold 
    border-black text-white bg-black py-3 px-5 rounded-xl uppercase hover:text-white 
    shadow-lg">
                    Done
                </a>

            </div>

        </div>

    </div>
</x-layout>
