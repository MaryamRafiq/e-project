@extends('layout.master')

@section('title')
    Update User
@endsection

@section('content')
    <h1 class="text-center text-5xl" style="margin-top: 5rem; color:rgb(255, 255, 255); font-weight:bold;">UPDATE USER</h1>

    <div class="flex justify-center items-center max-h-screen">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Name</label>

                        <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ $user->name }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ $user->email }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">Password
                            (Leave blank to keep current)</label>
                        <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <button type="submit"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update
                        user</button>

                    <a href="/users">
                        <button type="button" style="color: white"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Back</button>
                    </a>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
