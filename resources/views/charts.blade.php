<x-app-layout>
    <div class="bg-white rounded-md border my-8 px-6 py-6 mx-40">
        <div>
            <h2 class="text-2xl font-semibold">Charts</h2>
            <div class="mt-4">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, doloremque eveniet architecto culpa similique iure aspernatur nulla at, impedit veniam a ducimus non officiis quam perferendis, dolore sint maxime officia.
                <canvas id="myChart"></canvas>
            </div>
            <div class="my-6">
                <div>Year 2024: {{ array_sum($thisYearOrders) }}</div>
                <div>Year 2023: {{ array_sum($lastYearOrders) }}</div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const labels = [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ];

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Last Year Orders',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: {{ json_encode($lastYearOrders) }},
                }, {
                    label: 'This Year Orders',
                    backgroundColor: 'lightgreen',
                    borderColor: 'rgb(255, 99, 132)',
                    data: {{ json_encode($thisYearOrders) }},
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {}
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
    @endpush
</x-app-layout>
