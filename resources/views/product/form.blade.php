<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if(session('success'))
                    <p>{{ session('success') }}</p>
                    <img src="{{ asset('uploads/' . session('image')) }}" width="200">
                @endif
                <form
                    action="{{ $product->id == null ? route('product.store') : route('product.update', $product->ref_no) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($product->id != null)
                        @method('put')
                    @endif
                    <div class="row">
                        <div class="col-md-6 mx-auto">


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       value="{{old('name', $product->name)}}" id="name" name="name" placeholder="Name">
                                <label for="name">Enter Name</label>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                       value="{{old('price', $product->price)}}" id="price" name="price"
                                       placeholder="Price">
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
                                <input type="file" value="{{old('image', '/uploads/' . $product->image)}}"
                                       class="form-control  @error('image') is-invalid @enderror" id="imageInput"
                                       name="image" placeholder="Image">
                                <label for="image">Select Image</label>

                                @if(isset($product->image))
                                    <div class="mb-3">
                                        <label>Current Image:</label><br>
                                        <img src="{{ asset('storage/uploads/' . $product->image) }}" alt="Product Image"
                                             width="150">
                                    </div>
                                @endif
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <br>
                            <div>
                                <button type="submit" class="btn w-100 btn-outline-secondary">Submit</button>
                            </div>
                            <script>
                                let cropper;
                                const  imageInput = document.getElementById('imageInput')
                                imageInput.addEventListener('change', function(event) {
                                    settingImage(event)
                                });
                                // imageInput.addEventListener('load', function(event) {
                                //     settingImage(event)
                                // });
                                function settingImage(event){
                                    let imageFile = event.target.files[0];
                                    if (imageFile) {
                                        let reader = new FileReader();
                                        reader.onload = function(e) {
                                            let imgElement = document.getElementById('preview');
                                            imgElement.src = e.target.result;

                                            if (cropper) {
                                                cropper.destroy();
                                            }

                                            cropper = new Cropper(imgElement, {
                                                aspectRatio: 1, // Crop Square
                                                viewMode: 2,
                                                crop(event) {
                                                    document.getElementById('cropData').value = JSON.stringify({
                                                        x: Math.round(event.detail.x),
                                                        y: Math.round(event.detail.y),
                                                        width: Math.round(event.detail.width),
                                                        height: Math.round(event.detail.height)
                                                    });
                                                }
                                            });
                                        };
                                        reader.readAsDataURL(imageFile);
                                    }
                                }
                            </script>
                        </div>
                        <div class="col-md-6">
                            <div style="max-width: 400px;">
                                <img id="preview" style="max-width: 100%;">
                            </div>
                            <input type="hidden" name="crop_data" id="cropData">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
