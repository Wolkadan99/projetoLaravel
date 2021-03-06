<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="chart" style="height: 300px;"></div>

               </div>
            </div>
        </div>
    </div>
    <!-- Charts container-->
    <div id="chart" style="height: 300px;"></div>
    <!-- Charting library-->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan-->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script-->
    <script>
        const chart = new Chartisan({
            el: '#chart',
            url: "@chart('ProdutosPreco')",
        });

    </script>

</x-app-layout>
