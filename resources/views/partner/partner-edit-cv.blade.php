<x-layout>

    <div class="flex justify-center mb-20">
        <div class="w-3/4">

            <a href="{{ url('/partner-view-cv/'.$cv -> cv_code) }}" class="mt-5 ml-5 inline-block border-2 font-bold 
    border-black text-white bg-black py-1 px-2 rounded-xl uppercase hover:text-white 
    shadow-lg">
                <i class="fa-solid fa-arrow-left"></i> View CV
            </a>

            <div class="mx-4">

                @include('components._message')

                <div class="bg-gray-50 border border-gray-200 p-5 rounded mt-24">

                    <header class="text-center mb-10">

                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Edit NAME's CV
                        </h2>

                    </header>

                    <form method="post" action="{{ url('/partner-view-cv/'.$cv -> cv_code) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- General Infomration -->
                        <div class="">
                            <div class="text-xl font-bold mb-6 uppercase text-center">
                                <h1>
                                    General Infomration
                                </h1>
                            </div>
                            <div class="mb-6">

                                <label for="Photo" class="inline-block text-lg mb-2">
                                    Candidate Photo (JPG)
                                </label>
                                <input type="file" class="border border-gray-200 rounded p-2 w-full mb-2"
                                    name="cv_profile" />

                                @if($cv->cv_profile)

                                <a href="{{ asset('storage/' . $cv->cv_profile) }}" target="_blank"
                                    class="text-blue-700 hover:underline p-3">
                                    <i class="fa fa-image mr-1"></i>View Previously Uploaded Profile
                                </a>

                                @else

                                <p class="text-blue-700 p-3">Please Upload Profile Picture</p>

                                @endif

                            </div>

                            <div class="mb-6">

                                <label for="cv_name" class="inline-block text-lg mb-2">
                                    Candidate Name
                                </label>
                                <input type="text" class="border border-gray-20 rounded p-2 w-full" name="cv_name"
                                    value="{{$cv -> cv_name}}" />
                                @error('cv_name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror

                            </div>

                            <div class="mb-6">

                                <label for="cv_gender" class="inline-block text-lg mb-2">
                                    Gender
                                </label>

                                <select name="cv_gender" id="cv_gender"
                                    class="border border-gray-200 rounded p-2 w-full" required>

                                    <option value="{{$cv -> cv_gender}}">{{$cv -> cv_gender}}</option>

                                </select>
                            </div>

                            <div class="mb-6">

                                <label for="cv_age" class="inline-block text-lg mb-2">
                                    Candidate Age
                                </label>
                                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="cv_age"
                                    value="{{$cv -> cv_age}}" />
                                @error('cv_age')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror

                            </div>

                            <div class="mb-6">

                                <label for="cv_dob" class="inline-block text-lg mb-2">
                                    Candidate Date of Birth
                                </label>
                                <input type="date" class="border border-gray-200 rounded p-2 w-full" name="cv_dob"
                                    value="{{$cv -> cv_dob}}" />
                                @error('cv_dob')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror

                            </div>

                            <div class="mb-6">

                                <label for="cv_nationality" class="inline-block text-lg mb-2">
                                    Nationality
                                </label>
                                <select name="cv_nationality" id="cv_nationality"
                                    class="border border-gray-200 rounded p-2 w-full" required>

                                    <option value="{{$cv -> cv_nationality}}">{{$cv -> cv_nationality}}</option>

                                </select>
                                @error('cv_nationality')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror

                            </div>

                            <div class="mb-6">

                                <label for="cv_address" class="inline-block text-lg mb-2">
                                    Address
                                </label>
                                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="cv_address"
                                    value="{{$cv -> cv_address}}" />
                                @error('cv_address')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror

                            </div>

                            <div class="mb-6">

                                <label for="cv_religion" class="inline-block text-lg mb-2">
                                    Religion
                                </label>

                                <select name="cv_religion" id="cv_religion"
                                    class="border border-gray-200 rounded p-2 w-full" required>

                                    <option value="{{$cv -> cv_religion}}">{{$cv -> cv_religion}}</option>
                                    <option value="BUDDHIST" @selected(old('cv_religion')=='BUDDHIST' )>BUDDHIST
                                    </option>
                                    <option value="CHRISTIAN" @selected(old('cv_religion')=='CHRISTIAN' )>CHRISTIAN
                                    </option>
                                    <option value="ISLAM" @selected(old('cv_religion')=='ISLAM' )>ISLAM</option>
                                    <option value="HINDU" @selected(old('cv_religion')=='HINDU' )>HINDU</option>
                                    <option value="Other" @selected(old('cv_religion')=='Other' )>Other</option>

                                </select>

                            </div>

                            <div class="mb-6">

                                <label for="cv_marriage" class="inline-block text-lg mb-2">
                                    Marital Status
                                </label>

                                <select name="cv_marriage" id="cv_marriage"
                                    class="border border-gray-200 rounded p-2 w-full" required>

                                    <option value="{{$cv -> cv_marriage}}">{{$cv -> cv_marriage}}</option>
                                    <option value="SINGLE" @selected(old('cv_marriage')=='SINGLE' )>SINGLE</option>
                                    <option value="MARRIED" @selected(old('cv_marriage')=='MARRIED' )>MARRIED</option>
                                    <option value="MARRIED_WITH_CHILD"
                                        @selected(old('cv_marriage')=='MARRIED_WITH_CHILD' )>
                                        MARRIED WITH CHILD</option>

                                </select>

                            </div>

                            <div class="mb-6">

                                <label for="cv_job_type" class="inline-block text-lg mb-2">
                                    Job Type
                                </label>

                                <select name="cv_job_type" id="cv_job_type"
                                    class="border border-gray-200 rounded p-2 w-full" required>

                                    <option value="{{$cv -> cv_job_type}}">{{$cv -> cv_job_type}}</option>
                                    <option value="RESTAURANT" @selected(old('cv_job_type')=='RESTAURANT' )>RESTAURANT
                                    </option>
                                    <option value="NURSING" @selected(old('cv_job_type')=='NURSING' )>NURSING</option>
                                    <option value="HOTEL" @selected(old('cv_job_type')=='HOTEL' )>HOTEL</option>
                                    <option value="CONSTRUCTION" @selected(old('cv_job_type')=='CONSTRUCTION' )>
                                        CONSTRUCTION
                                    </option>
                                    <option value="MECHANICAL PRODUCTION"
                                        @selected(old('cv_job_type')=='MECHANICAL PRODUCTION' )>MECHANICAL PRODUCTION
                                    </option>
                                    <option value="FOOD PRODUCTION" @selected(old('cv_job_type')=='FOOD PRODUCTION' )>
                                        FOOD
                                        PRODUCTION</option>
                                    <option value="DRIVING" @selected(old('cv_job_type')=='DRIVING' )>DRIVING</option>

                                </select>

                            </div>

                            <div class="mb-6">

                                <label for="cv_job_certificate" class="inline-block text-lg mb-2">
                                    Job Type Certificate (PDF)
                                </label>
                                <input type="file" class="border border-gray-200 rounded p-2 mb-2 w-full"
                                    name="cv_job_certificate" />

                                @if($cv->cv_job_certificate)

                                <a href="{{ asset('storage/' . $cv->cv_job_certificate) }}" target="_blank"
                                    class="text-blue-700 hover:underline p-3">
                                    <i class="fa fa-file-pdf mr-1"></i> View Previously Uploaded Certificate
                                </a>

                                @else

                                <p class="text-blue-700 p-3">Please Upload File</p>

                                @endif


                            </div>

                            <div class="mb-6">

                                <label for="cv_jp_level" class="inline-block text-lg mb-2">
                                    Language Level
                                </label>

                                <select name="cv_jp_level" id="cv_jp_level"
                                    class="border border-gray-200 rounded p-2 w-full" required>

                                    <option value="{{$cv -> cv_jp_level}}">{{$cv -> cv_jp_level}}</option>
                                    <option value="JLPT N4" @selected(old('cv_jp_level')=='JLPT N4' )>JLPT N4</option>
                                    <option value="JLPT N3" @selected(old('cv_jp_level')=='JLPT N3' )>JLPT N3</option>
                                    <option value="JLPT N2" @selected(old('cv_jp_level')=='JLPT N2' )>JLPT N2</option>
                                    <option value="JLPT N1" @selected(old('cv_jp_level')=='JLPT N1' )>JLPT N1</option>

                                </select>

                            </div>

                            <div class="mb-6">

                                <label for="cv_jp_certificate" class="inline-block text-lg mb-2">
                                    Language Level Certificate
                                </label>
                                <input type="file" class="border border-gray-200 rounded p-2 w-full"
                                    value="{{$cv -> cv_jp_certificate}}" name="cv_jp_certificate" />

                                @if($cv->cv_jp_certificate)

                                <a href="{{ asset('storage/' . $cv->cv_jp_certificate) }}" target="_blank"
                                    class="text-blue-700 hover:underline p-3">
                                    <i class="fa fa-file-pdf mr-1"></i> View Previously Uploaded Certificate
                                </a>

                                @else

                                <p class="text-blue-700 p-3">Please Upload File</p>

                                @endif

                            </div>

                            <div class="mb-6 flex flex-col">

                                <label for="cv_jp_study" class="inline-block text-lg mb-2">
                                    Lenght of Studying Japanese
                                </label>
                                <div class="flex">
                                    <div class="mr-10">
                                        <input type="number" class="border border-gray-200 rounded p-2 mr-2 w-12"
                                            name="cv_jp_study_year" value="{{$cv -> cv_jp_study_year}}" />
                                        <span>Year(s)</span>
                                        @error('cv_jp_study_year')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="number" class="border border-gray-200 rounded p-2 mr-2 w-12"
                                            name="cv_jp_study_month" value="{{$cv -> cv_jp_study_month}}" />
                                        <span>Month(s)</span>
                                        @error('cv_jp_study_month')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="mb-6">

                                <label for="cv_desired_work_length" class="inline-block text-lg mb-2">
                                    Desired length of Working in Japan
                                </label>

                                <select name="cv_desired_work_length" id="cv_desired_work_length"
                                    class="border border-gray-200 rounded p-2 w-full" required>

                                    <option value="{{$cv -> cv_desired_work_length}}">{{$cv -> cv_desired_work_length}}
                                    </option>
                                    <option value="5 Years" @selected(old('cv_desired_work_length')=='5 Years' )>5 Years
                                    </option>
                                    <option value="10 Years" @selected(old('cv_desired_work_length')=='10 Years' )>10
                                        Years
                                    </option>
                                    <option value="Over 10_Years"
                                        @selected(old('cv_desired_work_length')=='Over 10 Years' )>Over 10 Years
                                    </option>

                                </select>

                            </div>
                        </div>

                        <!-- School History -->
                        <div class="mb-6 mt-10">

                            <div class="font-bold text-xl uppercase mb-6 text-center">
                                <h1>SCHOOL HISTORY</h1>
                            </div>

                            <div>
                                <h2 class="font-bold text-lg uppercase mb-4">School History 1</h2>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory1_name" class="inline-block text-lg mb-2">
                                        School Name
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory1_name" value="{{$cv -> cv_schoolhistory1_name}}" />
                                    @error('cv_schoolhistory1_name')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory1_subject" class="inline-block text-lg mb-2">
                                        Subject
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory1_subject" value="{{$cv -> cv_schoolhistory1_subject}}" />
                                    @error('cv_schoolhistory1_subject')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory1_start" class="inline-block text-lg mb-2">
                                        Start Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory1_start" value="{{$cv -> cv_schoolhistory1_start}}" />
                                    @error('cv_schoolhistory1_start')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory1_end" class="inline-block text-lg mb-2">
                                        End Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory1_end" value="{{$cv -> cv_schoolhistory1_end}}" />
                                    @error('cv_schoolhistory1_end')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory1_status" class="inline-block text-lg mb-2">
                                        Status
                                    </label>

                                    <select name="cv_schoolhistory1_status" id="cv_schoolhistory1_status"
                                        class="border border-gray-200 rounded p-2 w-full" required>

                                        <option value="{{$cv -> cv_schoolhistory1_status}}">
                                            {{$cv -> cv_schoolhistory1_status}}</option>
                                        <option value="Studying" @selected(old('cv_schoolhistory1_status')=='Studying'
                                            )>
                                            Studying</option>
                                        <option value="Graduated" @selected(old('cv_schoolhistory1_status')=='Graduated'
                                            )>
                                            Graduated</option>
                                        <option value="Left" @selected(old('cv_schoolhistory1_status')=='Left' )>Left
                                        </option>

                                    </select>
                                    @error('cv_schoolhistory1_status')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                            </div>

                            <div>
                                <h2 class="font-bold text-lg uppercase mb-4">School History 2</h2>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory2_name" class="inline-block text-lg mb-2">
                                        School Name
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory2_name" value="{{$cv -> cv_schoolhistory2_name}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory2_subject" class="inline-block text-lg mb-2">
                                        Subject
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory2_subject" value="{{$cv -> cv_schoolhistory2_subject}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory2_start" class="inline-block text-lg mb-2">
                                        Start Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory2_start" value="{{$cv -> cv_schoolhistory2_start}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory2_end" class="inline-block text-lg mb-2">
                                        End Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory2_end" value="{{$cv -> cv_schoolhistory2_end}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory2_status" class="inline-block text-lg mb-2">
                                        Status
                                    </label>
                                    <select name="cv_schoolhistory2_status" id="cv_schoolhistory2_status"
                                        class="border border-gray-200 rounded p-2 w-full">

                                        <option value="{{$cv -> cv_schoolhistory2_status}}">
                                            {{$cv -> cv_schoolhistory2_status}}</option>
                                        <option value="Studying" @selected(old('cv_schoolhistory2_status')=='Studying'
                                            )>
                                            Studying</option>
                                        <option value="Graduated" @selected(old('cv_schoolhistory2_status')=='Graduated'
                                            )>
                                            Graduated</option>
                                        <option value="Left" @selected(old('cv_schoolhistory2_status')=='Left' )>Left
                                        </option>

                                    </select>

                                </div>

                            </div>

                            <div>
                                <h2 class="font-bold text-lg uppercase mb-4">School History 3</h2>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory3_name" class="inline-block text-lg mb-2">
                                        School Name
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory3_name" value="{{$cv -> cv_schoolhistory3_name}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory3_subject" class="inline-block text-lg mb-2">
                                        Subject
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory3_subject" value="{{$cv -> cv_schoolhistory3_subject}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory3_start" class="inline-block text-lg mb-2">
                                        Start Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory3_start" value="{{$cv -> cv_schoolhistory3_start}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory3_end" class="inline-block text-lg mb-2">
                                        End Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_schoolhistory3_end" value="{{$cv -> cv_schoolhistory3_end}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_schoolhistory3_status" class="inline-block text-lg mb-2">
                                        Status
                                    </label>

                                    <select name="cv_schoolhistory3_status" id="cv_schoolhistory3_status"
                                        class="border border-gray-200 rounded p-2 w-full">

                                        <option value="{{$cv -> cv_schoolhistory3_status}}">
                                            {{$cv -> cv_schoolhistory3_status}}</option>
                                        <option value="Studying" @selected(old('cv_schoolhistory3_status')=='Studying'
                                            )>
                                            Studying</option>
                                        <option value="Graduated" @selected(old('cv_schoolhistory3_status')=='Graduated'
                                            )>
                                            Graduated</option>
                                        <option value="Left" @selected(old('cv_schoolhistory3_status')=='Left' )>Left
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- Work History -->
                        <div class="mb-6 mt-10">

                            <div class="font-bold text-xl uppercase mb-6 text-center">
                                <h1>Work HISTORY</h1>
                            </div>

                            <div class="mt-10">
                                <h2 class="font-bold text-lg uppercase mb-4">Work History 1</h2>

                                <div class="mb-6">

                                    <label for="cv_jobhistory1_name" class="inline-block text-lg mb-2">
                                        Company Name
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory1_name" value="{{$cv -> cv_jobhistory1_name}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory1_position" class="inline-block text-lg mb-2">
                                        Position
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory1_position" value="{{$cv -> cv_jobhistory1_position}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory1_start" class="inline-block text-lg mb-2">
                                        Start Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory1_start" value="{{$cv -> cv_jobhistory1_start}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory1_end" class="inline-block text-lg mb-2">
                                        End Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory1_end" value="{{$cv -> cv_jobhistory1_end}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory1_status" class="inline-block text-lg mb-2">
                                        Status
                                    </label>

                                    <select name="cv_jobhistory1_status" id="cv_jobhistory1_status"
                                        class="border border-gray-200 rounded p-2 w-full">

                                        <option value="{{$cv -> cv_jobhistory1_status}}">
                                            {{$cv -> cv_jobhistory1_status}}
                                        </option>
                                        <option value="Working" @selected(old('cv_jobhistory1_status')=='Working' )>
                                            Working
                                        </option>
                                        <option value="Left" @selected(old('cv_jobhistory1_status')=='Left' )>Left
                                        </option>

                                    </select>

                                </div>

                            </div>

                            <div class="mt-10">
                                <h2 class="font-bold text-lg uppercase mb-4">Work History 2</h2>

                                <div class="mb-6">

                                    <label for="cv_jobhistory2_name" class="inline-block text-lg mb-2">
                                        Company Name
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory2_name" value="{{$cv -> cv_jobhistory2_name}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory2_position" class="inline-block text-lg mb-2">
                                        Position
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory2_position" value="{{$cv -> cv_jobhistory2_position}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory2_start" class="inline-block text-lg mb-2">
                                        Start Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory2_start" value="{{$cv -> cv_jobhistory2_start}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory2_end" class="inline-block text-lg mb-2">
                                        End Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory2_end" value="{{$cv -> cv_jobhistory2_end}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory2_status" class="inline-block text-lg mb-2">
                                        Status
                                    </label>

                                    <select name="cv_jobhistory2_status" id="cv_jobhistory2_status"
                                        class="border border-gray-200 rounded p-2 w-full">

                                        <option value="{{$cv -> cv_jobhistory2_status}}">
                                            {{$cv -> cv_jobhistory2_status}}
                                        </option>
                                        <option value="Working" @selected(old('cv_jobhistory2_status')=='Working' )>
                                            Working
                                        </option>
                                        <option value="Left" @selected(old('cv_jobhistory2_status')=='Left' )>Left
                                        </option>

                                    </select>

                                </div>

                            </div>

                            <div class="mt-10">
                                <h2 class="font-bold text-lg uppercase mb-4">Work History 3</h2>

                                <div class="mb-6">

                                    <label for="cv_jobhistory3_name" class="inline-block text-lg mb-2">
                                        Company Name
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory3_name" value="{{$cv -> cv_jobhistory3_name}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory3_position" class="inline-block text-lg mb-2">
                                        Position
                                    </label>
                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory3_position" value="{{$cv -> cv_jobhistory3_position}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory3_start" class="inline-block text-lg mb-2">
                                        Start Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory3_start" value="{{$cv -> cv_jobhistory3_start}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory3_end" class="inline-block text-lg mb-2">
                                        End Date
                                    </label>
                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="cv_jobhistory3_end" value="{{$cv -> cv_jobhistory3_end}}" />

                                </div>

                                <div class="mb-6">

                                    <label for="cv_jobhistory3_status" class="inline-block text-lg mb-2">
                                        Status
                                    </label>

                                    <select name="cv_jobhistory3_status" id="cv_jobhistory3_status"
                                        class="border border-gray-200 rounded p-2 w-full">

                                        <option value="{{$cv -> cv_jobhistory3_status}}">
                                            {{$cv -> cv_jobhistory3_status}}
                                        </option>
                                        <option value="Working" @selected(old('cv_jobhistory3_status')=='Working' )>
                                            Working
                                        </option>
                                        <option value="Left" @selected(old('cv_jobhistory3_status')=='Left' )>Left
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- Others -->
                        <div class="mb-6 mt-10">

                            <div class="font-bold text-xl uppercase mb-6 text-center">
                                <h1>Others</h1>
                            </div>

                            <div class="mb-6">

                                <label for="cv_email" class="inline-block text-lg mb-2">
                                    Email Address
                                </label>
                                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="cv_email"
                                    value="{{$cv -> cv_email}}" />

                            </div>

                            <div class="mb-6">

                                <label for="cv_phone" class="inline-block text-lg mb-2">
                                    Phone Number
                                </label>
                                <input type="tel" class="border border-gray-200 rounded p-2 w-full" name="cv_phone"
                                    value="{{$cv -> cv_phone}}" />

                            </div>

                            <div class="font-bold text-lg uppercase mt-10 mb-4">
                                <h2>Passport</h2>
                            </div>

                            <div class="mb-6">

                                <label for="cv_passport_number" class="inline-block text-lg mb-2">
                                    Passport Number
                                </label>
                                <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                    name="cv_passport_number" value="{{$cv -> cv_passport_number}}" />

                            </div>

                            <div class="mb-6">

                                <label for="cv_passport_date" class="inline-block text-lg mb-2">
                                    Expiration Date
                                </label>
                                <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                    name="cv_passport_date" value="{{$cv -> cv_passport_date}}" />

                            </div>

                            <div class="mb-6">

                                <label for="cv_passport" class="inline-block text-lg mb-2">
                                    Passport File
                                </label>
                                <input type="file" class="border border-gray-200 rounded p-2 w-full"
                                    name="cv_passport" />

                                @if($cv->cv_passport)

                                <a href="{{ asset('storage/' . $cv->cv_passport) }}" target="_blank"
                                    class="text-blue-700 hover:underline p-3">
                                    <i class="fa fa-file-pdf mr-1"></i> View Previously Uploaded File
                                </a>

                                @else

                                <p class="text-blue-700 p-3">Please Upload File</p>

                                @endif

                            </div>

                            <div class="font-bold text-lg uppercase mt-10 mb-4">
                                <h2>Japan</h2>
                            </div>

                            <div class="mb-6">

                                <label for="cv_jp_visit_time" class="inline-block text-lg mb-2">
                                    Number of Times of Going Japan
                                </label>
                                <input type="number" class="border border-gray-200 rounded p-2 w-full"
                                    name="cv_jp_visit_time" value="{{$cv -> cv_jp_visit_time}}" />

                            </div>

                            <div class="mb-6">

                                <label for="cv_COE_Received" class="inline-block text-lg mb-2">
                                    Certificate of Eligibility (COE) Received
                                </label>
                                <input type="number" class="border border-gray-200 rounded p-2 w-full"
                                    name="cv_COE_Received" value="{{$cv -> cv_COE_Received}}" />

                            </div>

                            <div class="mb-6">

                                <label for="cv_COE_Rejected" class="inline-block text-lg mb-2">
                                    Certificate of Eligibility (COE) Rejected
                                </label>
                                <input type="number" class="border border-gray-200 rounded p-2 w-full"
                                    name="cv_COE_Rejected" value="{{$cv -> cv_COE_Rejected}}" />

                            </div>

                        </div>

                        <!-- Submit Button -->
                        <div class="m-10 text-center">
                            <button type="submit" class="transition duration-200 bg-black font-bold 
                            text-white border-black border-2 
                        px-4 py-3 rounded-xl hover:bg-white hover:text-black">
                                Update
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</x-layout>
