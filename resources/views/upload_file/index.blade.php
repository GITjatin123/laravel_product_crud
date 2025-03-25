<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Product Upload') }}
            </h2>
            <a href="{{route('product.index')}}" class="btn btn-outline-success">
                {{ __('Back') }}
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 col-md-6 mx-auto">
                    <form action="{{ route('import.products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5 border border-1">
                            <label for="uploadInput" class="form-label">Upload File</label>
                            <input type="file" value="" style="padding: 20px 5px;
  background-color: white;color: black"
                                   class="form-control  @error('excel_file') is-invalid @enderror" id="uploadInput"
                                   name="excel_file" placeholder="Image">
                            @error('excel_file')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button class="btn w-100 btn-outline-secondary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
