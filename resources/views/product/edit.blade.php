<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Product / Edit') }}
            </h2>
            <a href="{{route('product.index')}}" class="btn btn-outline-success">
                {{ __('Back') }}
            </a>
        </div>
    </x-slot>
    @include('product.form')

</x-app-layout>
