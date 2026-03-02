<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-6">

    <div class="mt-10">

        <header class="text-center mb-10">

            <h2 class="text-2xl font-bold uppercase mb-1">
                Job Information
            </h2>

        </header>

        <div class="mb-10">
            <table class="w-full">
                <tbody class="border-2 border-black rounded-3xl">

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Information
                        </td>
                        <td class="border border-gray-700">
                            <ul class="p-5 font-bold">
                                <li>
                                    Code : <span class="text-blue-700">{{$job -> job_code}}</span>
                                </li>
                                <li>
                                    Job Type : <span class="text-blue-700">{{$job -> job_type}}</span>
                                </li>
                                <li>
                                    Recruitment Number : <span class="text-blue-700">{{$job -> recruit_number}}</span>
                                </li>
                                <li>
                                    Application Deadline : <span
                                        class="text-blue-700">{{$job -> application_deadline}}</span>
                                </li>
                                <li>
                                    Availability : <span class="text-blue-700">{{$job -> job_availability}}</span>
                                </li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Company Name
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> company_name}}
                        </td>
                    </tr>

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Company Website
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> company_website}}
                        </td>
                    </tr>

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Company Location
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> company_location}}
                        </td>
                    </tr>

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Job Title
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> job_title}}
                        </td>
                    </tr>

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Job Description
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> job_description}}
                        </td>
                    </tr>

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Work Times
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> work_time}}
                        </td>
                    </tr>

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Off Days
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> off_days}}
                        </td>
                    </tr>

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            A. Salary + Benefits
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> salary_benefits}}
                        </td>
                    </tr>

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            B. Deductables
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> deductables}}
                        </td>
                    </tr>

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Salary after Deduction (A - B)
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> after_deduction}}
                        </td>
                    </tr>

                    <tr>
                        <td class="max-w-1/3 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Airplane Ticket Expense
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> airticket_exp}}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div>
            <h1 class="text-2xl font-bold mb-5">
                Requirements
            </h1>
            <table class="mb-5 w-full">

                <tbody class="border-2 border-black rounded-3xl">
                    <tr>
                        <td class="p-5 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Japanese Level
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> required_jp_level}}
                        </td>
                    </tr>
                    <tr>
                        <td class="p-5 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Age
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> age_range}}
                        </td>
                    </tr>
                    <tr>
                        <td class="p-5 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Gender
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            {{$job -> job_gender}}
                        </td>
                    </tr>
                    <tr>
                        <td class="p-5 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Nationality
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            <p>
                                {{$job -> job_nationality}}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-5 text-center text-xl font-bold bg-gray-200 border border-gray-700">
                            Other Requirements
                        </td>
                        <td class="p-5 text-l border border-gray-700">
                            <p>
                                {{$job -> other_requirements}}
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>

<div class="flex justify-center m-10">

    <a href="{{ url('/job/' . $job -> job_code . '/pdf') }}" target="_blank"
        class="bg-green-600 text-white px-3 py-2 rounded">
        <i class="fa fa-file-pdf"></i> View PDF
    </a>

</div>
