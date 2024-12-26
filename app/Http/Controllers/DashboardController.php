<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Import the User model

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the data you need for the dashboard
        $userCount = User::count();  // Example: Number of users
        // You can fetch other data like products, categories, etc.
        $productCount = \App\Models\Product::count();  // Example for products
        $categoryCount = \App\Models\Category::count();  // Example for categories
        $testerCount = \App\Models\Testing::count();  // Example for testers

        return view('dashboard.index', compact('userCount', 'productCount', 'categoryCount', 'testerCount'));
    
    
    }
    public function getChartData()
    {
        // Sample data for Income and Sales (replace with your dynamic data from the database)
        $incomeData = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'datasets' => [
                [
                    'label' => 'Income',
                    'data' => [1200, 1500, 1300, 1600, 1700],
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];

        $salesData = [
            'labels' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'datasets' => [
                [
                    'label' => 'Sales',
                    'data' => [10, 15, 13, 20, 25],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];

        return response()->json([
            'income' => $incomeData,
            'sales' => $salesData
        ]);
    }

   }