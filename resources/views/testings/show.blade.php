@extends('layout.master')

@section('title')
    Tester Details
@endsection

@section('content')
    <h1 class="text-center text-5xl" style="margin-top: 5rem;color:rgb(255, 255, 255); font-weight:bold;">TESTER DETAILS</h1>

    <div class="flex justify-center items-center max-h-screen">
        <div class="flex justify-center items-center max-h-screen" style="margin-top:20px">
            <div class="relative p-4 w-full max-w-xl max-h-full">
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    </div>

                    <dl>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tester Name</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $testing->name }}</dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Description</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $testing->description }}
                        </dd>
                    </dl>

                    <dl>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tester Role</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $testing->role }}</dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Status</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $testing->status }}</dd>
                    </dl>

                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-3 sm:space-x-4">
                            <!-- Back Button -->
                            <a href="/testings">
                                <button type="button"
                                    class="py-2.5 px-5 text-m font-medium text-white focus:outline-none bg-blue-600 rounded-lg border border-gray-200 hover:bg-blue-700 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-blue-500 dark:hover:text-white">
                                    Back
                                </button>
                            </a>

                            <!-- Edit Button -->
                            <a href="/testings/{{ $testing->id }}/edit">
                                <button type="button"
                                    class="py-2.5 px-5 text-m font-medium text-white focus:outline-none bg-green-600 rounded-lg border border-gray-200 hover:bg-green-700 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-green-500 dark:hover:text-white">
                                    Edit
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
