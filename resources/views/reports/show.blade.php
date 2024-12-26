@extends('layout.master')

@section('title')
    Report Details
@endsection

@section('content')
    <h1 class="text-center text-5xl" style="margin-top: 5rem; color:rgb(255, 255, 255); font-weight:bold">Report Details</h1>

    <div class="mx-auto max-w-4xl mt-10">
        <div class="bg-white shadow-md rounded p-6">
            <p><strong>ID:</strong> {{ $report->id }}</p>
            <p><strong>Title:</strong> {{ $report->title }}</p>
            <p><strong>Content:</strong> {{ $report->content }}</p>
            <p><strong>Status:</strong> {{ $report->status }}</p>
            <p><strong>User ID:</strong> {{ $report->user_id }}</p>
            <p><strong>Testing ID:</strong> {{ $report->testing_id }}</p>
            <div class="mt-4">
                <a href="{{ route('reports.index') }}" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to All Reports
                </a>
            </div>
        </div>
    </div>
@endsection
