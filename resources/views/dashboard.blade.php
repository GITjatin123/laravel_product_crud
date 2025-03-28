<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 style="font-size: 30px;margin-bottom: 20px;">You're logged in!</h5>
                    <h2>This Project Is Based On Product CRUD</h2>
                    <ul class="mt-8" style="list-style: circle;">
                        <li><p>You can <strong>view,create,@if(auth()->check() && auth()->user()->role->name !== App\Constants\UserConstant::ROLE_STAFF)update, or delete @endif</strong> the product.</p></li>
                        <li><p>You can also directly uploads the products with excel file without duplicate.</p></li>
                        <li><p>Duplicate products are automatically download into excel file.</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
