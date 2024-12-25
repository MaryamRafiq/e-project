@extends('layout.master')

@section('title')
    Add Category
@endsection

@section('content')
    <h1 class="text-center text-5xl" style="margin-top: 5rem; color: rgb(255, 255, 255); font-weight: bold;">
        ADD NEW CATEGORY
    </h1>

    <div class="flex justify-center items-center max-h-screen" style="margin-top:70px">
        <div class="relative p-4 w-full max-w-2xl max-h-full bg-white rounded-lg shadow-lg">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-1">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Category Name
                        </label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Enter category name" required>
                        @error('name')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Description
                        </label>
                        <textarea name="description" id="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Enter category description" required></textarea>
                        @error('description')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit"
                    class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    style="background-color: #009CFF">
                    Submit
                </button>

                <a href="{{ route('categories.index') }}"
                    class="text-white ml-5 inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    style="background-color: #28a745;">
                    Back
                </a>
            </form>
        </div>
    </div>
@endsection
