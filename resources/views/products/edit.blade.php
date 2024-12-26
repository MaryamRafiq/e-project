@extends('layout.master')

@section('title')
    Update Product
@endsection

@section('content')
<h1 class="text-center text-5xl" style="margin-top: 5rem; color: rgb(255, 255, 255); font-weight: bold;">UPDATE PRODUCT</h1>

<div class="flex justify-center items-center max-h-screen" style="margin-top:70px">
    <div class="relative p-4 w-full max-w-2xl max-h-full bg-white rounded-lg shadow-lg">
        <form action="/products/{{$product->id}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                    <input type="text" name="name" id="name" value="{{ $product->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Product name" required>
                </div>

                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <input type="text" name="description" value="{{ $product->description }}" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product description" required>
                </div>

                <div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="number" name="price" id="price" value="{{ $product->price }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product price" required>
                </div>

                <div>
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product quantity" required>
                </div>

                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <input type="text" name="status" id="status" value="{{ $product->status }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Status" required>
                </div>
            

             <div>
                <label for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select type="text" name="category" id="category" value="{{ $product->category_id }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="category" required>
                    <option selected disabled>Select category</option>
                    <option >Energy storage capacitor</option>
                    <option >Passive Components</option>
                    <option >Active Components</option>
                    <option >Single processing components</option>
                    <option >Power management components</option>
                    <option >Communication components</option>
                    <option >Measurement components</option>
                    <option >Mechanical Components</option>
                </select>    
              </div>

              <div>
                <label for="image"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                <input type="file" name="image" id="image" value="{{ $product->image }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="image" required>
              </div>
            </div>  

            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update Product</button>

            <a href="/products">
                <button type="button" style="color: white" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Back</button>
            </a>
        </form>
    </div>
</div>
@endsection

