<?php

//    $loginUser = \Illuminate\Support\Facades\Auth::user()['user_role'];
//    echo $loginUser->user;
?>
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Products') }}
            </h2>
            <a href="{{route('product.create')}}" class="btn btn-outline-success">
                {{ __('Add New') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" table-responsive p-6 text-gray-900 dark:text-gray-100">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            @if(auth()->check() && auth()->user()->role->name !== App\Constants\UserConstant::ROLE_STAFF)
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($products) > 0)
                            <?php $count = 1 ?>
                            @foreach($products as $product => $productVal)
                                <tr>
                                    <th>{{$count++}}</th>
                                    <td>{{$productVal['name']}}</td>
                                    <td>{{$productVal['description']}}</td>
                                    <td>{{$productVal['price']}}</td>
                                    <td><img src="{{ asset('storage/uploads/' . $productVal->image) }}" alt="Product Image" width="150"></td>
                                    @if(auth()->check() && auth()->user()->role->name !== App\Constants\UserConstant::ROLE_STAFF)
                                        <td><a href="{{route('product.edit',$productVal->ref_no)}}"  class="btn btn-outline-warning">Edit</a></td>
                                        <td>
                                            <form action="{{ route('product.destroy', $productVal->ref_no) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-outline-danger">
                                                    Delete
                                                </button>
                                            </form></td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="{{(auth()->check() && auth()->user()->role->name === App\Constants\UserConstant::ROLE_STAFF) ? '5':'7' }}" class="text-center">Product Not Found</th>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
