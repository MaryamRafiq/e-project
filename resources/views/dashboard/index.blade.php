@extends('layout.master')

@section('title')
    Dashboard
@endsection

@section('content')

    <body class=" text-gray-100 min-h-screen">
        <div class="container mx-auto p-6">
            <!-- Header -->
            <div class="flex justify-center items-center mb-8">
                <h3 class="text-center text-3xl" style="margin-top: 5rem;color:rgb(255, 255, 255); font-weight:bold;">
                    DASHBOARD OF LAB AUTOMATION
                </h3>
                <div class="flex items-center space-x-4">
                    <i data-feather="bell" class="w-6 h-6 text-gray-400 hover:text-purple-400 cursor-pointer"></i>
                    <i data-feather="settings"
                        class="w-6 h-6 text-gray-400 hover:text-purple-400 cursor-pointer animate-spin-slow"></i>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <!-- Users Stats -->
                <div class="bg-white rounded-lg p-6 transform hover:scale-105 transition-transform duration-300">
                    <div class="absolute top-3 right-3 bg-blue-100 text-blue-600 font-bold text-sm px-2 py-1 rounded-full">
                        Users
                    </div>
                    <div class="flex justify-between items-center">
                        <h3 class="text-black-400">TotalUsers</h3>
                        <i data-feather="alert-circle" class="w-5 h-5 text-red-400"></i>
                    </div>
                    <p class="text-3xl text-black font-bold mt-2">{{ $userCount }}</p>
                    <div class="mt-4 bg-gray-700 h-2 rounded-full">
                        <div class="bg-red-400 h-2 rounded-full" style="width: 0%" id="usercount"></div>
                    </div>
                </div>

                <!-- Products Stats -->
                <div class="bg-white rounded-lg p-6 transform hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute top-3 right-3 bg-purple-100 text-purple-600 font-bold text-sm px-2 py-1 rounded-full">
                        Products
                    </div>
                    <div class="flex justify-between items-center">
                        <h3 class="text-black-400">TotalProducts</h3>
                        <i data-feather="products" class="w-5 h-5 text-yellow-400"></i>
                    </div>
                    <p class="text-3xl font-bold text-black mt-2">{{ $productCount }}</p>
                    <!-- Display dynamic product count -->
                    <div class="mt-4 bg-gray-700 h-2 rounded-full">
                        <div class="bg-yellow-400 h-2 rounded-full" style="width: 0%" id="productCount"></div>
                    </div>
                </div>

                <!-- Categories Stats -->
                <div class="bg-white rounded-lg p-6 transform hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute top-3 right-3 bg-green-100 text-green-600 font-bold text-sm px-2 py-1 rounded-full">
                        Categories
                    </div>
                    <div class="flex justify-between items-center">
                        <h3 class="text-black-400">TotalCategoies</h3>
                        <i data-feather="heart" class="w-5 h-5 text-green-400"></i>
                    </div>
                    <p class="text-3xl text-black font-bold mt-2">{{ $categoryCount }}</p>
                    <!-- Display dynamic category count -->
                    <div class="mt-4 bg-gray-700 h-2 rounded-full">
                        <div class="bg-green-400 h-2 rounded-full" style="width: 0%" id="categoryCount"></div>
                    </div>
                </div>

                <!-- Testers Stats -->
                <div class="bg-white rounded-lg p-6 transform hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute top-3 right-3 bg-yellow-100 text-yellow-600 font-bold text-sm px-2 py-1 rounded-full">
                        Testings
                    </div>
                    <div class="flex justify-between items-center">
                        <h3 class="text-black-400">TotalTesters</h3>
                        <i data-feather="video-off" class="w-5 h-5 text-purple-400"></i>
                    </div>
                    <p class="text-3xl font-bold text-black mt-2">{{ $testerCount }}</p>
                    <div class="mt-4 bg-gray-700 h-2 rounded-full">
                        <div class="bg-purple-400 h-2 rounded-full" style="width: 0%" id="testerCount"></div>
                    </div>
                </div>

                <!-- REPORTS Stats -->
                <div class="bg-white rounded-lg p-6 transform hover:scale-105 transition-transform duration-300">
                    <div class="absolute top-3 right-3 bg-red-100 text-red-600 font-bold text-sm px-2 py-1 rounded-full">
                        Reports
                    </div>
                    <div class="flex justify-between items-center">
                        <h3 class="text-black-400">TotalReports</h3>
                        <i data-feather="video-off" class="w-5 h-5 text-purple-400"></i>
                    </div>
                    <p class="text-3xl font-bold text-black mt-2">{{ $reportCount }}</p>
                    <div class="mt-4 bg-gray-700 h-2 rounded-full">
                        <div class="bg-purple-400 h-2 rounded-full" style="width: 0%" id="reportCount"></div>
                    </div>
                </div>
            </div>

            {{-- income chart --}}
            <div class="container" style="display:flex; gap:1rem; justify-content:space-around;">

                <div style= "background-color: white;margin-top:3rem;font-weight:bold">
                    <canvas id="incomeChart" width="400" height="300"></canvas>
                </div>

                <!-- Sales Chart -->

                <div style="background-color: white; margin-top:3rem;">

                    <canvas id="salesChart" width="400" height="300"></canvas>
                </div>

            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                        const userCount = {{ $userCount }};
                        const categoryCount = {{ $categoryCount }};
                        const testerCount = {{ $testerCount }};
                        const productCount = {{ $productCount }};
                        const reportCount = {{ $reportCount }};
                        const totalUsers = 50;

                        const percentage = (userCount / totalUsers) * 100;
                        const percentage2 = (categoryCount / totalUsers) * 100;
                        const percentage3 = (testerCount / totalUsers) * 100;
                        const percentage4 = (productCount / totalUsers) * 100;
                        const percentage5 = (reportCount / totalUsers) * 100;

                        const progressBar = document.getElementById('usercount');
                        const progressBar2 = document.getElementById('categoryCount');
                        const progressBar3 = document.getElementById('testerCount');
                        const progressBar4 = document.getElementById('productCount');
                        const progressBar5 = document.getElementById('reportCount');

                        progressBar.style.width = percentage + '%';
                        if (progressBar2) progressBar2.style.width = percentage2 + '%';
                        if (progressBar3) progressBar3.style.width = percentage3 + '%';
                        if (progressBar4) progressBar4.style.width = percentage4 + '%';
                        if (progressBar5) progressBar5.style.width = percentage5 + '%';
                    }


                );

                function fetchChartData() {
                    fetch('/dashboard/data')
                        .then(response => response.json())
                        .then(data => {
                            // Income Chart
                            var ctx1 = document.getElementById('incomeChart').getContext('2d');
                            new Chart(ctx1, {
                                type: 'bar',
                                data: data.income,
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                        },
                                        title: {
                                            display: true,
                                            text: 'Income Over Time'
                                        }
                                    }
                                }
                            });

                            // Sales Chart
                            var ctx2 = document.getElementById('salesChart').getContext('2d');
                            new Chart(ctx2, {
                                type: 'line', // Sales chart type
                                data: data.sales, // Data fetched from the backend
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                        },
                                        title: {
                                            display: true,
                                            text: 'Sales Performance'
                                        }
                                    }
                                }
                            });
                        })
                        .catch(error => console.error('Error fetching chart data:', error));
                }

                fetchChartData();
            </script>
        @endsection
