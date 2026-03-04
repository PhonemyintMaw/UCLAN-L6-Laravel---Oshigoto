<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            @include('components._message')

            <div class="font-bold text-3xl mt-5 mb-10">

                Admin Dashboard

            </div>

            <!-- STATISTICS SECTION 1 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-5">
                <div class="bg-gray-50 border border-gray-200 rounded p-5 text-center">
                    <h3 class="text-2xl font-bold mb-2">CVs Added This Month</h3>
                    <p id="monthlyCVs" class="text-3xl text-blue-600 font-bold">...</p>
                    <p class="text-sm text-gray-500">This Year: <span id="yearlyCVs">...</span></p>
                </div>

                <div class="bg-gray-50 border border-gray-200 rounded p-5 text-center">
                    <h3 class="text-2xl font-bold mb-2">Jobs Added This Month</h3>
                    <p id="monthlyJobs" class="text-3xl text-blue-600 font-bold">...</p>
                    <p class="text-sm text-gray-500">This Year: <span id="yearlyJobs">...</span></p>
                </div>
            </div>

            <!-- STATISTICS SECTION 2 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-5">
                <div class="bg-gray-50 border border-gray-200 rounded p-5 text-center">
                    <h3 class="text-2xl font-bold mb-2">Partners Added This Month</h3>
                    <p id="monthlyPartners" class="text-3xl text-blue-600 font-bold">...</p>
                    <p class="text-sm text-gray-500">This Year: <span id="yearlyPartners">...</span></p>
                </div>

                <div class="bg-gray-50 border border-gray-200 rounded p-5 text-center">
                    <h3 class="text-2xl font-bold mb-2">Applications Made This Month</h3>
                    <p id="monthlyApplications" class="text-3xl text-blue-600 font-bold">...</p>
                    <p class="text-sm text-gray-500">This Year: <span id="yearlyApplications">...</span></p>
                </div>
            </div>

            <!-- SEARCH DATE SECTION -->
            <div class="flex flex-col justify-center mb-5 bg-gray-50 border border-gray-200 rounded p-5 text-center">

                <form class="mb-10" action="{{ url('/admin-home/date-filter') }}" method="GET">
                    <h3 class="text-2xl font-bold mb-5">Filter by Date</h3>
                    <div class="grid grid-cols-1 mb-5">
                        <div class="m-5">
                            <label class="font-bold" for="start_date">Start Date :</label>
                            <input type="date" name="start_date" id="">
                        </div>

                        <div class="m-5">
                            <label class="font-bold" for="end_date">End Date :</label>
                            <input type="date" name="end_date" id="end_date">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="h-10 w-20 text-white rounded-lg bg-black hover:bg-gray-500">
                            Search
                        </button>
                    </div>
                </form>

                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="mb-5">
                        <h4 class="col-span-1 font-bold">Number of Total CVs Made from {{$start}} to {{$end}}</h4>
                        <span class="col-span-1 text-blue-600 font-bold">{{$cvs}}</span>
                    </div>
                    <div class="mb-5">
                        <h4 class="col-span-1 font-bold">Number of Total Applications Made from {{$start}} to {{$end}}
                        </h4>
                        <span class="col-span-1 text-blue-600 font-bold">{{$applications}}</span>
                    </div>
                    <div class="mb-5">
                        <h4 class="col-span-1 font-bold">Number of Total Partners Made from {{$start}} to {{$end}}</h4>
                        <span class="col-span-1 text-blue-600 font-bold">{{$partners}}</span>
                    </div>
                    <div class="">
                        <h4 class="col-span-1 font-bold">Number of Total Jobs Made from {{$start}} to {{$end}}</h4>
                        <span class="col-span-1 text-blue-600 font-bold">{{$jobs}}</span>
                    </div>
                </div>

            </div>

            <!-- Jobs Bar Chart -->
            <div class="flex-row justify-left bg-gray-50 border border-gray-200 rounded p-5 mb-10">
                <div class="flex items-center mb-10">
                    <i class="fa-solid fa-thumbtack fa-xl mr-5"></i>

                    <h3 class="text-xl font-bold mr-5">
                        Total Jobs Created
                    </h3>

                    <h3 class="text-xl font-bold text-blue-700">
                        {{$totalJobs}}
                    </h3>
                </div>

                <div class="flex items-center justify-center text-xl font-bold text-blue-700">
                    <canvas class="max-h-[600px]" id="jobsByTypeChart"></canvas>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-10">

                <!--Partner Pie Chart -->
                <div class="col-span-1 bg-gray-50 border border-gray-200 rounded p-5 mb-10">
                    <h2 class="text-2xl font-bold mb-10">
                        Partner Chart
                    </h2>

                    <div class="mb-10 flex items-center justify-center text-xl font-bold text-blue-700">
                        <canvas id="partnersByNationalityChart" class="max-h-[300px]"></canvas>
                    </div>


                    <div class="flex">

                        <h3 class="text-xl font-bold mr-5">
                            Total Partners :
                        </h3>

                        <h3 class="text-xl font-bold text-blue-700">
                            {{$totalPartners}}
                        </h3>

                    </div>

                </div>

                <!--CV Pie Chart -->
                <div class="col-span-1 bg-gray-50 border border-gray-200 rounded p-5 mb-10">

                    <h2 class="text-2xl font-bold mb-2">
                        CV Chart
                    </h2>

                    <div class="m-10 flex items-center justify-center text-xl font-bold text-blue-700">
                        <canvas id="cvsByNationalityChart" class="max-h-[300px]"></canvas>
                    </div>

                    <div class="flex">
                        <h3 class="text-xl font-bold mr-5">
                            Total CVs :
                        </h3>

                        <h3 class="text-xl font-bold text-blue-700">
                            {{$totalCVs}}
                        </h3>
                    </div>

                    <div class="flex">
                        <h3 class="text-xl font-bold mr-5">
                            Passed Applicants :
                        </h3>

                        <h3 class="text-xl font-bold text-blue-700">
                            {{$totalPassed}}
                        </h3>
                    </div>

                </div>

            </div>

            <!-- Calendar-->
            <div class="flex justify-center mb-10">

                <div class="relative overflow-y-auto" style="height: 600px;">
                    <h1 class="text-3xl font-bold m-5">Company Calendar</h1>
                    <iframe
                        src="https://calendar.google.com/calendar/embed?src=phonemyintmaw.ge%40gmail.com&ctz=Asia%2FTokyo"
                        style="border: 0" width="1000" height="600" frameborder="0" scrolling="no">
                    </iframe>
                </div>

            </div>

        </div>

    </div>

    <!-- Chart JS Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            //Job Type Barchart
            fetch('{{ url("/chart/jobs-by-type") }}')
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(item => item.job_type);
                    const counts = data.map(item => item.count);

                    new Chart(document.getElementById('jobsByTypeChart'), {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jobs by Type',
                                data: counts,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });

            //Partners by Nationality
            fetch('{{ url("/chart/partners-by-nationality") }}')
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(item => item.partner_nationality);
                    const counts = data.map(item => item.count);

                    new Chart(document.getElementById('partnersByNationalityChart'), {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Partners by Nationality',
                                data: counts,
                                backgroundColor: [
                                    '#3B82F6', '#10B981', '#F59E0B', '#EF4444',
                                    '#8B5CF6',
                                    '#EC4899', '#14B8A6'
                                ],
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }
                    });
                });

            // CVs by Nationality 
            fetch('{{ url("/chart/cvs-by-nationality") }}')
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(item => item.cv_nationality);
                    const counts = data.map(item => item.count);

                    new Chart(document.getElementById('cvsByNationalityChart'), {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'CVs by Nationality',
                                data: counts,
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }
                    });
                });

            //Statistics   
            fetch('{{ url("/graph/statistics") }}')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('monthlyCVs').textContent = data.cv.monthly;
                    document.getElementById('yearlyCVs').textContent = data.cv.yearly;
                    document.getElementById('monthlyJobs').textContent = data.job.monthly;
                    document.getElementById('yearlyJobs').textContent = data.job.yearly;
                    document.getElementById('monthlyPartners').textContent = data.partner.monthly;
                    document.getElementById('yearlyPartners').textContent = data.partner.yearly;
                    document.getElementById('monthlyApplications').textContent = data.application.monthly;
                    document.getElementById('yearlyApplications').textContent = data.application.yearly;
                })
        });

    </script>

</x-layout-admin>
