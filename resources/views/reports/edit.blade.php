@extends('layout.master')

@section('title')
    Edit Report
@endsection

@section('content')
    <h1 class="text-center text-5xl" style="margin-top: 5rem; color:rgb(255, 255, 255); font-weight:bold">Edit Report</h1>

    <div class="mx-auto max-w-2xl mt-10">
        <form action="{{ route('reports.update', $report->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $report->title) }}" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Content</label>
                <textarea name="content" id="content" rows="4" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content', $report->content) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status</label>
                <select name="status" id="status" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="Pass" {{ $report->status == 'Pass' ? 'selected' : '' }}>Pass</option>
                    <option value="Fail" {{ $report->status == 'Fail' ? 'selected' : '' }}>Fail</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">User ID</label>
                <input type="number" name="user_id" id="user_id" value="{{ old('user_id', $report->user_id) }}" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="testing_id">Testing ID</label>
                <input type="number" name="testing_id" id="testing_id" value="{{ old('testing_id', $report->testing_id) }}" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Report
                </button>
            </div>
        </form>
    </div>
@endsection
