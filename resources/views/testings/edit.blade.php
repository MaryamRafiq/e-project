@extends('layout.master')

@section('title')
    Update Testers
@endsection

@section('content')
<h1 class="text-center text-5xl" style="margin-top: 5rem; color: rgb(255, 255, 255); font-weight: bold;">UPDATE TESTER</h1>

<div class="flex justify-center items-center max-h-screen" style="margin-top:70px">
    <div class="relative p-4 w-full max-w-2xl max-h-full bg-white rounded-lg shadow-lg">
        <form action="/testings/{{$testing->id}}" method="POST">
            @method('PUT')
            @csrf
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tester Name</label>
                    <input type="text" name="name" id="name" value="{{ $testing->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Tester name" required>
                </div>

                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <input type="text" name="description" value="{{ $testing->description }}" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tester description" required>
                </div>

                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tester Role</label>
                    <input type="text" name="role" id="role" value="{{ $testing->role }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tester role" required>
                </div>

                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <input type="text" name="status" id="status" value="{{ $testing->status }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Status" required>
                </div>
            </div>

            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update tester</button>

            <a href="/testings">
                <button type="button" style="color: white" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Back</button>
            </a>
        </form>
    </div>
</div>
@endsection
