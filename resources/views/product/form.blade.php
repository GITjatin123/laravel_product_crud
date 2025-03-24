<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="col-md-6 mx-auto">

                    <form
                        action="{{ $product->id == null ? route('product.store') : route('product.update', $product->ref_no) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($product->id != null)
                            @method('put')
                        @endif
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $product->name)}}" id="name" name="name" placeholder="Name" >
                            <label for="name">Enter Name</label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{old('price', $product->price)}}" id="price" name="price" placeholder="Price">
                            <label for="price">Enter Price</label>
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 border border-1">
                            <textarea class="form-control" placeholder="Description" name="desc" id="floatingTextarea2"
                                      style="height: 100px">{{old('desc', $product->description)}}</textarea>
                            <label for="floatingTextarea2">Enter Description</label>
                            @error('desc')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 border border-1">
                            <input type="file" value="{{old('image', $product->image)}}"  class="form-control  @error('image') is-invalid @enderror" id="image" name="image" placeholder="Image">
                            <label for="image">Select Image</label>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @if(isset($product->image))
                                <div class="mb-3">
                                    <label>Current Image:</label><br>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="150">
                                </div>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn w-100 btn-outline-secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
