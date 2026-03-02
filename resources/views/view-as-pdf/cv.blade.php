<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{$cv->cv_name}} - Curriculum Vitae</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background-color: #fff;
            display: flex;
            justify-content: center;
            font-size: 12px;
            color: #000;
        }

        h2,
        h3 {
            text-align: center;
        }

        h2 {
            font-size: 18px;
            font-weight: bold;
            margin-top: 40px;
            margin-bottom: 50px;
        }

        h3 {
            font-size: 14px;
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            border: 1px solid #d1d5db;
            padding: 6px 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #e5e7eb;
            font-weight: bold;
        }

        .font-bold {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .photo {
            width: 100px;
            height: 120px;
            object-fit: cover;
            border: 1px solid #d1d5db;
        }

        .photo-cell {
            text-align: center;
            vertical-align: top;
            width: 120px;
        }

        .evaluation-box {
            border: 1px solid #d1d5db;
            height: 200px;
            padding: 10px;
        }

    </style>
</head>

<body>

    <div>

        <h2>Oshigoto Japan CV Form</h2>

        <!-- Basic Info -->
        <table>
            <tr>
                <th>CV Code</th>
                <td class="font-bold">{{$cv->cv_code}}</td>
                <th>Name</th>
                <td>{{ $cv->cv_name }}</td>
                <td class="photo-cell" rowspan="6">
                    @if($cv->cv_profile)
                    <img src="{{public_path('storage/' . $cv->cv_profile)}}" class="photo" alt="Profile Photo">
                    <p style="font-size:10px; color:#6b7280;">Photo</p>
                    @else
                    <p><i>No Photo</i></p>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Registered</th>
                <td>{{$cv->created_at}}</td>
                <th>Gender</th>
                <td>{{$cv->cv_gender}}</td>
            </tr>
            <tr>
                <th>Nationality</th>
                <td>{{$cv->cv_nationality}}</td>
                <th>Address</th>
                <td>{{$cv->cv_address}}</td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>{{$cv->cv_dob}}</td>
                <th>Age</th>
                <td>{{$cv->cv_age}}</td>
            </tr>
            <tr>
                <th>Religion</th>
                <td>{{$cv->cv_religion}}</td>
                <th>Marital Status</th>
                <td>{{$cv->cv_marriage}}</td>
            </tr>
            <tr>
                <th>Language Level</th>
                <td>{{$cv->cv_jp_level}}</td>
                <th>Job Type</th>
                <td>{{$cv->cv_job_type}}</td>
            </tr>
        </table>

        <!-- School History -->
        <h3>School History</h3>
        <table>
            <thead>
                <tr>
                    <th>School Name</th>
                    <th>Subject</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach ([1,2,3] as $i)

                <tr>
                    <td>{{ $cv->{"cv_schoolhistory{$i}_name"} }}</td>
                    <td>{{ $cv->{"cv_schoolhistory{$i}_subject"} }}</td>
                    <td>{{ $cv->{"cv_schoolhistory{$i}_start"} }}</td>
                    <td>{{ $cv->{"cv_schoolhistory{$i}_end"} }}</td>
                    <td>{{ $cv->{"cv_schoolhistory{$i}_status"} }}</td>
                </tr>

                @endforeach

            </tbody>
        </table>

        <!-- Job History -->
        <h3>Job History</h3>
        <table>
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Position</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach ([1,2,3] as $i)

                <tr>
                    <td>{{ $cv->{"cv_jobhistory{$i}_name"} }}</td>
                    <td>{{ $cv->{"cv_jobhistory{$i}_position"} }}</td>
                    <td>{{ $cv->{"cv_jobhistory{$i}_start"} }}</td>
                    <td>{{ $cv->{"cv_jobhistory{$i}_end"} }}</td>
                    <td>{{ $cv->{"cv_jobhistory{$i}_status"} }}</td>
                </tr>

                @endforeach

            </tbody>
        </table>

        <!-- Evaluation -->
        <h3>Evaluation</h3>
        <div class="evaluation-box">
            {{ $cv->cv_evaluation ?? 'No evaluation provided.' }}
        </div>

    </div>

</body>

</html>
