@extends('layout.master')

@section('title')
Dashboard
@endsection

@section('content')

<body class=" text-gray-100 min-h-screen">
    <div class="container mx-auto p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-center text-5xl" style="margin-top: 5rem;color:rgb(255, 255, 255); font-weight:bold;">
            DASHBOARD OF LAB AUTOMATION
            </h1>
            <div class="flex items-center space-x-4">
                <i data-feather="bell" class="w-6 h-6 text-gray-400 hover:text-purple-400 cursor-pointer"></i>
                <i data-feather="settings" class="w-6 h-6 text-gray-400 hover:text-purple-400 cursor-pointer animate-spin-slow"></i>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Users Stats -->
            <div class="bg-white rounded-lg p-6 transform hover:scale-105 transition-transform duration-300">
                <div class="flex justify-between items-center">
                    <h3 class="text-black-400">USERS</h3>
                    <i data-feather="alert-circle" class="w-5 h-5 text-red-400"></i>
                </div>
                <p class="text-3xl text-black font-bold mt-2">{{ $userCount }}</p> <!-- Display dynamic user count -->
                <div class="mt-4 bg-gray-700 h-2 rounded-full">
                    <div class="bg-red-400 h-2 rounded-full" style="width: 85%" id="ignoredProgress"></div>
                </div>
            </div>

            <!-- Products Stats -->
            <div class="bg-white rounded-lg p-6 transform hover:scale-105 transition-transform duration-300">
                <div class="flex justify-between items-center">
                    <h3 class="text-black-400">PRODUCTS</h3>
                    <i data-feather="coffee" class="w-5 h-5 text-yellow-400"></i>
                </div>
                <p class="text-3xl font-bold text-black mt-2">{{ $productCount }}</p> <!-- Display dynamic product count -->
                <div class="mt-4 bg-gray-700 h-2 rounded-full">
                    <div class="bg-yellow-400 h-2 rounded-full" style="width: 95%" id="coffeeProgress"></div>
                </div>
            </div>

            <!-- Categories Stats -->
            <div class="bg-white rounded-lg p-6 transform hover:scale-105 transition-transform duration-300">
                <div class="flex justify-between items-center">
                    <h3 class="text-black-400">CATEGORIES</h3>
                    <i data-feather="heart" class="w-5 h-5 text-green-400"></i>
                </div>
                <p class="text-3xl text-black font-bold mt-2">{{ $categoryCount }}</p> <!-- Display dynamic category count -->
                <div class="mt-4 bg-gray-700 h-2 rounded-full">
                    <div class="bg-green-400 h-2 rounded-full" style="width: 42%" id="serverProgress"></div>
                </div>
            </div>

            <!-- Testers Stats -->
            <div class="bg-white rounded-lg p-6 transform hover:scale-105 transition-transform duration-300">
                <div class="flex justify-between items-center">
                    <h3 class="text-black-400">TESTERS</h3>
                    <i data-feather="video-off" class="w-5 h-5 text-purple-400"></i>
                </div>
                <p class="text-3xl font-bold text-black mt-2">{{ $testerCount }}</p> <!-- Display dynamic tester count -->
                <div class="mt-4 bg-gray-700 h-2 rounded-full">
                    <div class="bg-purple-400 h-2 rounded-full" style="width: 75%" id="meetingsProgress"></div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <div class="container">
            <!-- Income Chart -->
            <h2 class="text-center text-5xl" style="margin-top: 5rem;color:rgb(255, 255, 255); font-weight:bold;">INCOME BAR</h2>
            <div style= "background-color: white;margin-top:1rem">
                <canvas id="incomeChart" width="400" height="200"></canvas>
            </div>
    
            <!-- Sales Chart -->
            <h2 class="text-center text-5xl" style="margin-top: 5rem;color:rgb(255, 255, 255); font-weight:bold;">SALES GRAPH</h2>

            <div style="background-color: white; margin-top:1rem;">
                <canvas id="salesChart" width="400" height="200"></canvas>
            </div>
        </div>
    
        <script>
            // Function to fetch data from Laravel backend
            function fetchChartData() {
                fetch('/dashboard/data')
                    .then(response => response.json())
                    .then(data => {
                        // Income Chart
                        var ctx1 = document.getElementById('incomeChart').getContext('2d');
                        new Chart(ctx1, {
                            type: 'bar', // Income chart type
                            data: data.income, // Data fetched from the backend
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
    
            // Fetch data and render the charts on page load
            fetchChartData();
        </script>
@endsection
