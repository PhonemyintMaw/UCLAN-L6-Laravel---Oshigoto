<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $job->job_code }} - Job Information</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 1.5cm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            color: #111827;
        }

        /* Card container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 24px;
        }

        /* Headings */
        h1,
        h2 {
            text-align: center;
            font-weight: 700;
            margin: 0;
            padding: 0;
        }

        h2 {
            font-size: 20px;
            text-transform: uppercase;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 30px;
            text-align: left;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid #374151;
            /* gray-700 */
            padding: 8px 10px;
            vertical-align: top;
            text-align: left;
        }

        /* Info table header cells */
        td.bg-gray {
            background-color: #e5e7eb;
            /* gray-200 */
            font-weight: 700;
            text-align: center;
            width: 30%;
            font-size: 14px;
        }

        td.text-blue {
            color: #1d4ed8;
            /* blue-700 */
        }

        ul {
            list-style: none;
            margin: 0;
            padding-left: 0;
        }

        li {
            padding: 2px 0;
        }

        .bold {
            font-weight: 700;
        }

        .section {
            page-break-inside: avoid;
            margin-bottom: 30px;
        }

        table,
        tr,
        td,
        th {
            page-break-inside: avoid;
        }

    </style>
</head>

<body>

    <h1>
        Oshigoto Japan
    </h1>

    <div class="container">

        <div class="section">

            <div class="section">
                <h2>Job Information</h2>
                <table>
                    <tbody>

                        <tr>
                            <td class="bg-gray">Information</td>
                            <td>
                                <ul class="bold">
                                    <li>Code : <span class="text-blue">{{ $job->job_code }}</span></li>
                                    <li>Job Type : <span class="text-blue">{{ $job->job_type }}</span></li>
                                    <li>Recruitment Number : <span class="text-blue">{{ $job->recruit_number }}</span>
                                    </li>
                                    <li>Application Deadline : <span
                                            class="text-blue">{{ $job->application_deadline }}</span></li>
                                    <li>Availability : <span class="text-blue">{{ $job->job_availability }}</span></li>
                                </ul>
                            </td>
                        </tr>

                        <tr>
                            <td class="bg-gray">Company Name</td>
                            <td>{{ $job->company_name }}</td>
                        </tr>

                        <tr>
                            <td class="bg-gray">Company Website</td>
                            <td>{{ $job->company_website }}</td>
                        </tr>

                        <tr>
                            <td class="bg-gray">Company Location</td>
                            <td>{{ $job->company_location }}</td>
                        </tr>

                        <tr>
                            <td class="bg-gray">Job Title</td>
                            <td>{{ $job->job_title }}</td>
                        </tr>

                        <tr>
                            <td class="bg-gray">Job Description</td>
                            <td>{{ $job->job_description }}</td>
                        </tr>

                        <tr>
                            <td class="bg-gray">Work Times</td>
                            <td>{{ $job->work_time }}</td>
                        </tr>

                        <tr>
                            <td class="bg-gray">Off Days</td>
                            <td>{{ $job->off_days }}</td>
                        </tr>

                        <tr>
                            <td class="bg-gray">A. Salary + Benefits</td>
                            <td>{{ $job->salary_benefits }}</td>
                        </tr>

                        <tr>
                            <td class="bg-gray">B. Deductables</td>
                            <td>{{ $job->deductables }}</td>
                        </tr>

                        <tr>
                            <td class="bg-gray">Salary after Deduction (A - B)</td>
                            <td>{{ $job->after_deduction }}</td>
                        </tr>

                        <tr>
                            <td class="bg-gray">Airplane Ticket Expense</td>
                            <td>{{ $job->airticket_exp }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>


        <div class="section">
            <h2>Requirements</h2>
            <table class="rounded">
                <tbody>
                    <tr>
                        <td class="bg-gray">Japanese Level</td>
                        <td>{{ $job->required_jp_level }}</td>
                    </tr>
                    <tr>
                        <td class="bg-gray">Age</td>
                        <td>{{ $job->age_range }}</td>
                    </tr>
                    <tr>
                        <td class="bg-gray">Gender</td>
                        <td>{{ $job->job_gender }}</td>
                    </tr>
                    <tr>
                        <td class="bg-gray">Nationality</td>
                        <td>{{ $job->job_nationality }}</td>
                    </tr>
                    <tr>
                        <td class="bg-gray">Other Requirements</td>
                        <td>{{ $job->other_requirements }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
