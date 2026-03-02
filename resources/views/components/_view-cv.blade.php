<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-6">
    <!-- Title -->
    <h2 class="text-2xl font-bold text-center mb-6">Curriculum Vitae</h2>

    <!-- Basic Info -->
    <table class="w-full border border-gray-300 text-sm mb-6">
        <tr class="border border-gray-300">
            <th class="bg-gray-200 px-3 py-2 text-left w-32">CV Code</th>
            <td class="px-3 py-2 font-bold">{{$cv -> cv_code}}</td>
            <th class="bg-gray-200 px-3 py-2 text-left">Name</th>
            <td class="px-3 py-2">{{$cv -> cv_name}}</td>
            <td rowspan="6" class="flex flex-col justify-center border-l border-gray-300 text-center align-top w-36">
                <div class="flex flex-col items-center justify-center">

                    @if($cv->cv_profile)

                    <img src="{{ asset('storage/' . $cv->cv_profile) }}" alt="Profile Photo"
                        class="w-28 h-32 object-cover border border-gray-300 m-2">
                    <span class="text-xs text-gray-600">Photo</span>

                    @else

                    <p class="italic">Please Upload Profile Image</p>

                    @endif

                </div>
            </td>
        </tr>
        <tr class="border border-gray-300">
            <th class="bg-gray-200 px-3 py-2 text-left w-32">Registered</th>
            <td class="px-3 py-2">{{$cv -> created_at}}</td>
            <th class="bg-gray-200 px-3 py-2 text-left">Gender</th>
            <td class="px-3 py-2">{{$cv -> cv_gender}}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="bg-gray-200 px-3 py-2 text-left">Nationality</th>
            <td class="px-3 py-2">{{$cv -> cv_nationality}}</td>
            <th class="bg-gray-200 px-3 py-2 text-left">Address</th>
            <td class="px-3 py-2">{{$cv -> cv_address}}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="bg-gray-200 px-3 py-2 text-left">Date of Birth</th>
            <td class="px-3 py-2">{{$cv -> cv_dob}}</td>
            <th class="bg-gray-200 px-3 py-2 text-left">Age</th>
            <td class="px-3 py-2">{{$cv -> cv_age}}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="bg-gray-200 px-3 py-2 text-left">Religion</th>
            <td class="px-3 py-2">{{$cv -> cv_religion}}</td>
            <th class="bg-gray-200 px-3 py-2 text-left">Martial Status</th>
            <td class="px-3 py-2">{{$cv -> cv_marriage}}</td>
        </tr>
        <tr class="border border-gray-300">
            <th class="bg-gray-200 px-3 py-2 text-left">Language Level</th>
            <td class="px-3 py-2">{{$cv -> cv_jp_level}}</td>
            <th class="bg-gray-200 px-3 py-2 text-left">Job Type</th>
            <td class="px-3 py-2">{{$cv -> cv_job_type}}</td>
        </tr>
    </table>

    <!-- Education Section -->
    <h3 class="text-lg font-semibold mt-6 mb-3 text-center font-bold">School History</h3>
    <table class="w-full border border-gray-300 text-sm mb-6">
        <thead>
            <tr class="bg-gray-200 border border-gray-300">
                <th class="px-3 py-2 text-left">School Name</th>
                <th class="px-3 py-2 text-left">Subject</th>
                <th class="px-3 py-2 text-left">Start Date</th>
                <th class="px-3 py-2 text-left">End Date</th>
                <th class="px-3 py-2 text-left">Status</th>
            </tr>
        </thead>
        <tbody>

            @foreach ([1,2,3] as $i)

            <tr class="border border-gray-300">
                <td class="px-3 py-2">{{ $cv->{"cv_schoolhistory{$i}_name"} }}</td>
                <td class="px-3 py-2">{{ $cv->{"cv_schoolhistory{$i}_subject"} }}</td>
                <td class="px-3 py-2">{{ $cv->{"cv_schoolhistory{$i}_start"} }}</td>
                <td class="px-3 py-2">{{ $cv->{"cv_schoolhistory{$i}_end"} }}</td>
                <td class="px-3 py-2">{{ $cv->{"cv_schoolhistory{$i}_status"} }}</td>
            </tr>

            @endforeach

        </tbody>
    </table>

    <!-- Work Experience -->
    <h3 class="text-lg font-semibold mt-6 mb-3 text-center font-bold">Job History</h3>
    <table class="w-full border border-gray-300 text-sm mb-6">
        <thead>
            <tr class="bg-gray-200 border border-gray-300">
                <th class="px-3 py-2 text-left">Company Name</th>
                <th class="px-3 py-2 text-left">Position</th>
                <th class="px-3 py-2 text-left">Start Date</th>
                <th class="px-3 py-2 text-left">End Date</th>
                <th class="px-3 py-2 text-left">Status</th>
            </tr>
        </thead>
        <tbody>

            @foreach ([1,2,3] as $i)

            <tr class="border border-gray-300">
                <td class="px-3 py-2">{{ $cv->{"cv_jobhistory{$i}_name"} }}</td>
                <td class="px-3 py-2">{{ $cv->{"cv_jobhistory{$i}_subject"} }}</td>
                <td class="px-3 py-2">{{ $cv->{"cv_jobhistory{$i}_start"} }}</td>
                <td class="px-3 py-2">{{ $cv->{"cv_jobhistory{$i}_end"} }}</td>
                <td class="px-3 py-2">{{ $cv->{"cv_jobhistory{$i}_status"} }}</td>
            </tr>

            @endforeach

        </tbody>
    </table>

    <!-- Other Notes -->
    <h3 class="text-lg font-semibold mt-6 mb-3 text-center font-bold">Evaluation</h3>
    <div class="border border-gray-300 h-28 p-2">{{$cv -> cv_evaluation}}</div>
</div>

<div class="flex justify-center m-10">

    <a href="{{ url('/cv/' . $cv->cv_code . '/pdf') }}" target="_blank"
        class="bg-green-600 text-white px-3 py-2 rounded">
        <i class="fa fa-file-pdf"></i> View PDF
    </a>

</div>
