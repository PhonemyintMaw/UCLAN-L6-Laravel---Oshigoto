<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <a href="/all-listed-jobs/{{$job -> job_code}}" class="inline-block border-2 font-bold 
    border-black text-white bg-black py-3 px-4 rounded-xl uppercase hover:text-white 
    shadow-lg">
                <i class="fa-solid fa-arrow-left"></i> View Job
            </a>

            <main class="m-5">
                <div class="mx-4">

                    <header class="max-w-9/10 mx-auto mt-10">

                        <h1 class="text-3xl font-bold uppercase text-center mb-10">
                            Edit Job Information
                        </h1>

                    </header>

                    <div class="flex justify-center">

                        <div class="p-20 border-2 border-black w-3/4">
                            <form method="post" action="/all-listed-jobs/{{$job -> job_code}}"
                                enctype="multipart/form-data">

                                @csrf
                                @method('PUT')

                                <div class="mb-6">

                                    @include('components._message')

                                    <label for="job_code" class="inline-block text-lg mb-2">
                                        Job Code
                                    </label>

                                    <h2 class="font-bold text-blue-700">
                                        {{$job -> job_code}}
                                    </h2>

                                </div>

                                <div class="mb-6">

                                    <label for="job_type" class="inline-block text-lg mb-2">
                                        Job Type
                                    </label>

                                    <h2 class="font-bold text-blue-700">
                                        {{$job -> job_type}}
                                    </h2>

                                </div>

                                <div class="mb-6">

                                    <label for="recruit_number" class="inline-block text-lg mb-2">
                                        Recruitment Number
                                    </label>

                                    <input type="number" class="border border-gray-200 rounded p-2 w-full"
                                        name="recruit_number" value="{{$job -> recruit_number}}" />

                                    @error('recruit_number')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="application_deadline" class="inline-block text-lg mb-2">
                                        Application Deadline
                                    </label>

                                    <input type="date" class="border border-gray-200 rounded p-2 w-full"
                                        name="application_deadline" value="{{$job -> application_deadline}}" />

                                    @error('application_deadline')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="company_name" class="inline-block text-lg mb-2">
                                        Company Name
                                    </label>

                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="company_name" value="{{$job -> company_name}}" />

                                    @error('company_name')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">
                                    <label for="company_website" class="inline-block text-lg mb-2">
                                        Company Website
                                    </label>

                                    <input type="website" class="border border-gray-200 rounded p-2 w-full"
                                        name="company_website" value="{{$job -> company_website}}" />

                                    @error('company_website')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="company_location" class="inline-block text-lg mb-2">
                                        Company Location
                                    </label>

                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="company_location" value="{{$job -> company_location}}" />

                                    @error('company_location')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="job_title" class="inline-block text-lg mb-2">
                                        Job Title
                                    </label>

                                    <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                        name="job_title" value="{{$job -> job_title}}" />

                                    @error('job_title')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="job_description" class="inline-block text-lg mb-2">
                                        Job Description
                                    </label>

                                    <input class="border border-gray-200 rounded p-2 w-full" name="job_description"
                                        rows="3" value="{{$job -> job_description}}" />

                                    @error('job_description')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="work_time" class="inline-block text-lg mb-2">
                                        Work Time
                                    </label>

                                    <input class="border border-gray-200 rounded p-2 w-full" name="work_time" rows="3"
                                        value="{{$job -> work_time}}" />

                                    @error('work_time')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="off_days" class="inline-block text-lg mb-2">
                                        Off Days
                                    </label>

                                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="off_days"
                                        value="{{$job -> off_days}}" />

                                    @error('off_days')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="salary_benefits" class="inline-block text-lg mb-2">
                                        A. Salary + Benefits
                                    </label>

                                    <input class="border border-gray-200 rounded p-2 w-full" name="salary_benefits"
                                        value="{{$job -> salary_benefits}}" placeholder="Write Salary and Benefits" />

                                    @error('salary_benefits')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="deductables" class="inline-block text-lg mb-2">
                                        B. Deductables
                                    </label>

                                    <input class="border border-gray-200 rounded p-2 w-full" name="deductables" rows="3"
                                        value="{{$job -> deductables}}" placeholder="Write Salary and Benefits" />

                                    @error('deductables')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="after_deduction" class="inline-block text-lg mb-2">
                                        Salary After Deduction (A-B)
                                    </label>

                                    <input class="border border-gray-200 rounded p-2 w-full" name="after_deduction"
                                        rows="3" value="{{$job -> after_deduction}}"
                                        placeholder="(Salary + Benefits) - Deductables" />

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

                                        <option value="{{$job -> airticket_exp}}">{{$job -> airticket_exp}}</option>
                                        <option value="COMPANY_PAID" @selected(old('airticket_exp')=='COMPANY_PAID' )>
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

                                        <option value="{{$job -> required_jp_level}}">{{$job -> required_jp_level}}
                                        </option>
                                        <option value="JLPT N4" @selected(old('required_jp_level')=='JLPT N4' )>JLPT N4
                                        </option>
                                        <option value="JLPT N3" @selected(old('required_jp_level')=='JLPT N3' )>JLPT N3
                                        </option>
                                        <option value="JLPT N2" @selected(old('required_jp_level')=='JLPT N2' )>JLPT N2
                                        </option>
                                        <option value="JLPT N1" @selected(old('required_jp_level')=='JLPT N1' )>JLPT N1
                                        </option>

                                    </select>

                                </div>

                                <div class="mb-6">

                                    <label for="age_range" class="inline-block text-lg mb-2">
                                        Age
                                    </label>

                                    <select name="age_range" id="age_range"
                                        class="border border-gray-200 rounded p-2 w-full" required>

                                        <option value="{{$job -> age_range}}">{{$job -> age_range}}</option>
                                        <option value="18~25" @selected(old('age_range')=='18~25' )>18~25</option>
                                        <option value="Under 30" @selected(old('age_range')=='Under 30' )>Under 30
                                        </option>
                                        <option value="Not limited" @selected(old('age_range')=='Not limited' )>Not
                                            limited
                                        </option>

                                    </select>

                                </div>

                                <div class="mb-6">

                                    <label for="job_gender" class="inline-block text-lg mb-2">
                                        Gender
                                    </label>

                                    <select name="job_gender" id="job_gender"
                                        class="border border-gray-200 rounded p-2 w-full" required>

                                        <option value="{{$job -> job_gender}}">{{$job -> job_gender}}</option>
                                        <option value="Male" @selected(old('job_gender')=='Male' )>Male</option>
                                        <option value="Female" @selected(old('job_gender')=='Female' )>Female</option>
                                        <option value="Both" @selected(old('job_gender')=='Both' )>Both</option>

                                    </select>

                                </div>

                                <div class="mb-6">

                                    <label for="job_nationality" class="inline-block text-lg mb-2">
                                        Nationality
                                    </label>

                                    <select name="job_nationality" id="job_nationality"
                                        class="border border-gray-200 rounded p-2 w-full" required>

                                        <option value="{{$job -> job_nationality}}">{{$job -> job_nationality}}</option>
                                        <option value="Myanmar" @selected(old('job_nationality')=='Myanmar' )>Myanmar
                                        </option>
                                        <option value="Philippines" @selected(old('job_nationality')=='Philippines' )>
                                            Philippines</option>
                                        <option value="Thailand" @selected(old('job_nationality')=='Thailand' )>Thailand
                                        </option>
                                        <option value="Vietnam" @selected(old('job_nationality')=='Vietnam' )>Vietnam
                                        </option>
                                        <option value="Indonesia" @selected(old('job_nationality')=='Indonesia' )>
                                            Indonesia
                                        </option>
                                        <option value="Cambodia" @selected(old('job_nationality')=='Cambodia' )>Cambodia
                                        </option>
                                        <option value="Laos" @selected(old('job_nationality')=='Laos' )>Laos</option>

                                    </select>

                                </div>

                                <div class="mb-6">

                                    <label for="other_requirements" class="inline-block text-lg mb-2">
                                        Other Requirements
                                    </label>

                                    <input class="border border-gray-200 rounded p-2 w-full" name="other_requirements"
                                        rows="5" value="{{$job -> other_requirements}}"
                                        placeholder="Write Other Requirments" />

                                    @error('other_requirements')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="job_availability" class="inline-block text-lg mb-2">
                                        Availability
                                    </label>

                                    <select name="job_availability" id="job_availability"
                                        class="border border-gray-200 rounded p-2 w-full" required>

                                        <option value="{{$job -> job_availability}}">{{$job -> job_availability}}
                                        </option>
                                        <option value="Available" @selected(old('job_availability')=='Available' )>
                                            Available
                                        </option>
                                        <option value="Closed" @selected(old('job_availability')=='Closed' )>Closed
                                        </option>
                                        <option value="Finished" @selected(old('job_availability')=='Finished' )>
                                            Finished
                                        </option>


                                    </select>

                                </div>

                                <div class="mb-6 flex justify-center">

                                    <button type="submit" class="transition duration-300 bg-green-700 text-white rounded py-2 px-4 
                                    hover:bg-green-500">
                                        <i class="fa fa-pencil mr-2"></i>Edit
                                    </button>

                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </main>


        </div>

    </div>
</x-layout-admin>
