<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-4/5">

            <a href="{{ url('/all-listed-jobs') }}" class="inline-block border-2 font-bold 
    border-black text-white bg-black py-3 px-4 rounded-xl uppercase hover:text-white 
    shadow-lg">
                <i class="fa-solid fa-arrow-left"></i> Back to All Jobs
            </a>

            <main class="m-5">
                <div class="mx-4">
                    <div class="max-w-9/10 mx-auto mt-10">

                        <header class="text-center mb-5">

                            <h1 class="text-3xl mb-10 font-bold uppercase">
                                Job Information
                            </h1>

                        </header>


                        <!-- CV ADD FORM -->
                        <div class="flex justify-center">

                            <div class="lg:w-4/5 p-10 border-2 border-black">

                                <form method="post" action="{{ url('/all-listed-jobs') }}"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="mb-6">

                                        <label for="job_type" class="inline-block text-lg mb-2">
                                            Job Type
                                        </label>

                                        <select name="job_type" id="job_type"
                                            class="border border-gray-200 rounded p-2 w-full" required>
                                            <option value="">-- Select Job Type --</option>
                                            <option value="RESTAURANT" @selected(old('job_type')=='RESTAURANT' )>
                                                RESTAURANT
                                            </option>
                                            <option value="NURSING" @selected(old('job_type')=='NURSING' )>NURSING
                                            </option>
                                            <option value="HOTEL" @selected(old('job_type')=='HOTEL' )>HOTEL</option>
                                            <option value="CONSTRUCTION" @selected(old('job_type')=='CONSTRUCTION' )>
                                                CONSTRUCTION
                                            </option>
                                            <option value="MECHANICAL_PRODUCTION"
                                                @selected(old('job_type')=='MECHANICAL PRODUCTION' )>MECHANICAL
                                                PRODUCTION
                                            </option>
                                            <option value="FOOD PRODUCTION" @selected(old('job_type')=='FOOD PRODUCTION'
                                                )>
                                                FOOD
                                                PRODUCTION</option>
                                            <option value="DRIVING" @selected(old('job_type')=='DRIVING' )>DRIVING
                                            </option>
                                        </select>


                                    </div>

                                    <div class="mb-6">

                                        <label for="recruit_number" class="inline-block text-lg mb-2">
                                            Recruitment Number
                                        </label>

                                        <input type="number" class="border border-gray-200 rounded p-2 w-full"
                                            name="recruit_number" value="{{old('recruit_number')}}" />

                                        @error('recruit_number')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="application_deadline" class="inline-block text-lg mb-2">
                                            Application Deadline
                                        </label>

                                        <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                            name="application_deadline" value="{{old('application_deadline')}}" />

                                        @error('application_deadline')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="company_name" class="inline-block text-lg mb-2">
                                            Company Name
                                        </label>

                                        <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                            name="company_name" value="{{old('company_name')}}" />

                                        @error('company_name')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">
                                        <label for="company_website" class="inline-block text-lg mb-2">
                                            Company Website
                                        </label>

                                        <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                            name="company_website" value="{{old('company_website')}}" />

                                        @error('company_website')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="company_location" class="inline-block text-lg mb-2">
                                            Company Location
                                        </label>

                                        <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                            name="company_location" value="{{old('company_location')}}" />

                                        @error('company_location')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="job_title" class="inline-block text-lg mb-2">
                                            Job Title
                                        </label>

                                        <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                            name="job_title" value="{{old('job_title')}}" />

                                        @error('job_title')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="job_description" class="inline-block text-lg mb-2">
                                            Job Description
                                        </label>

                                        <input class="border border-gray-200 rounded p-2 w-full" name="job_description"
                                            rows="3" value="{{old('job_description')}}" />

                                        @error('job_description')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="work_time" class="inline-block text-lg mb-2">
                                            Work Time
                                        </label>

                                        <input class="border border-gray-200 rounded p-2 w-full" name="work_time"
                                            rows="3" value="{{old('work_time')}}" />

                                        @error('work_time')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="off_days" class="inline-block text-lg mb-2">
                                            Off Days
                                        </label>

                                        <input class="border border-gray-200 rounded p-2 w-full" name="off_days"
                                            rows="3" value="{{old('off_days')}}" />

                                        @error('off_days')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="salary_benefits" class="inline-block text-lg mb-2">
                                            A. Salary + Benefits
                                        </label>

                                        <input class="border border-gray-200 rounded p-2 w-full" name="salary_benefits"
                                            rows="3" value="{{old('salary_benefits')}}" />

                                        @error('salary_benefits')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="deductables" class="inline-block text-lg mb-2">
                                            B. Deductables
                                        </label>

                                        <input class="border border-gray-200 rounded p-2 w-full" name="deductables"
                                            rows="3" value="{{old('deductables')}}" />

                                        @error('deductables')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="after_deduction" class="inline-block text-lg mb-2">
                                            Salary After Deduction (A-B)
                                        </label>

                                        <input class="border border-gray-200 rounded p-2 w-full" name="after_deduction"
                                            rows="3" value="{{old('after_deduction')}}" />

                                        @error('after_deduction')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="airticket_exp" class="inline-block text-lg mb-2">
                                            Airplane Ticket Expense
                                        </label>

                                        <select name="airticket_exp" id="airticket_exp"
                                            class="border border-gray-200 rounded p-2 w-full" required>

                                            <option value="">-- Select One --</option>
                                            <option value="COMPANY_PAID" @selected(old('airticket_exp')=='COMPANY_PAID'
                                                )>
                                                COMPANY
                                                PAID</option>
                                            <option value="SELF_PAID" @selected(old('airticket_exp')=='SELF_PAID' )>SELF
                                                PAID
                                            </option>

                                        </select>

                                    </div>

                                    <div class="mb-6">

                                        <label for="required_jp_level" class="inline-block text-lg mb-2">
                                            Required Japanese Level
                                        </label>

                                        <select name="required_jp_level" id="required_jp_level"
                                            class="border border-gray-200 rounded p-2 w-full" required>

                                            <option value="">-- Select Japanese Level --</option>
                                            <option value="JLPT N4" @selected(old('required_jp_level')=='JLPT N4' )>JLPT
                                                N4
                                            </option>
                                            <option value="JLPT N3" @selected(old('required_jp_level')=='JLPT N3' )>JLPT
                                                N3
                                            </option>
                                            <option value="JLPT N2" @selected(old('required_jp_level')=='JLPT N2' )>JLPT
                                                N2
                                            </option>
                                            <option value="JLPT N1" @selected(old('required_jp_level')=='JLPT N1' )>JLPT
                                                N1
                                            </option>

                                        </select>

                                    </div>

                                    <div class="mb-6">

                                        <label for="age_range" class="inline-block text-lg mb-2">
                                            Age Range
                                        </label>

                                        <select name="age_range" id="age_range"
                                            class="border border-gray-200 rounded p-2 w-full" required>

                                            <option value="">-- Select Age Range --</option>
                                            <option value="18~25" @selected(old('age_rangel')=='18~25' )>18~25
                                            </option>
                                            <option value="Under 30" @selected(old('age_range')=='Under 30' )>Under 30
                                            </option>
                                            <option value="Not limited" @selected(old('age_range')=='Not limited' )>Not
                                                limited
                                            </option>

                                        </select>

                                        @error('age_range')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6">

                                        <label for="job_gender" class="inline-block text-lg mb-2">
                                            Gender
                                        </label>

                                        <select name="job_gender" id="job_gender"
                                            class="border border-gray-200 rounded p-2 w-full" required>

                                            <option value="">-- Select Gender --</option>
                                            <option value="Male" @selected(old('job_gender')=='Male' )>Male</option>
                                            <option value="Female" @selected(old('job_gender')=='Female' )>Female
                                            </option>
                                            <option value="Both" @selected(old('job_gender')=='Both' )>Both</option>

                                        </select>

                                    </div>

                                    <div class="mb-6">

                                        <label for="job_nationality" class="inline-block text-lg mb-2">
                                            Nationality
                                        </label>

                                        <select name="job_nationality" id="job_nationality"
                                            class="border border-gray-200 rounded p-2 w-full" required>

                                            <option value="">-- Select Nationality --</option>
                                            <option value="Myanmar" @selected(old('job_nationality')=='Myanmar' )>
                                                Myanmar
                                            </option>
                                            <option value="Philippines" @selected(old('job_nationality')=='Philippines'
                                                )>
                                                Philippines</option>
                                            <option value="Thailand" @selected(old('job_nationality')=='Thailand' )>
                                                Thailand
                                            </option>
                                            <option value="Vietnam" @selected(old('job_nationality')=='Vietnam' )>
                                                Vietnam
                                            </option>
                                            <option value="Indonesia" @selected(old('job_nationality')=='Indonesia' )>
                                                Indonesia
                                            </option>
                                            <option value="Cambodia" @selected(old('job_nationality')=='Cambodia' )>
                                                Cambodia
                                            </option>
                                            <option value="Laos" @selected(old('job_nationality')=='Laos' )>Laos
                                            </option>

                                        </select>

                                    </div>

                                    <div class="mb-6">

                                        <label for="other_requirements" class="inline-block text-lg mb-2">
                                            Other Requirements
                                        </label>

                                        <input class="border border-gray-200 rounded p-2 w-full"
                                            name="other_requirements" rows="3" value="{{old('other_requirements')}}" />

                                        @error('other_requirements')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </div>

                                    <div class="mb-6 flex justify-center">

                                        <button type="submit" class="transition duration-300 bg-green-700 text-white 
                                        rounded py-2 px-4 hover:bg-green-500">
                                            <i class="fa fa-pencil mr-2"></i>Add
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>
                </div>
            </main>

        </div>

    </div>

</x-layout-admin>
