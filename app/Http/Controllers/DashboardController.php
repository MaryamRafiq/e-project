<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();  
        $productCount = \App\Models\Product::count();  
        $categoryCount = \App\Models\Category::count();  
        $testerCount = \App\Models\Testing::count();  
        $reportCount = \App\Models\Report::count();  

        return view('dashboard.index', compact('userCount', 'productCount', 'categoryCount', 'testerCount','reportCount'));
    
    
    }
    public function getChartData()
    {
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