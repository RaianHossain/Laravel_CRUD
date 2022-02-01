<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Products </x-slot>

            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Product <a class="btn btn-sm btn-info" href="{{ route('products.index') }}">List</a>
        </div>
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post">
                @csrf
                @method('patch')
                <select name="category_id" id="">
                    <option value={{ $product->category->id }}>{{ $product->category->title }}</option>
                    @foreach($categories as $category)
                    <option value={{ $category->id }}>{{ $category->title }}</option>
                    @endforeach
                </select>
                <x-backend.form.input name="title" :value="$product->title" />               
                <x-backend.form.textarea name="description">
                {{ $product->description }}
                </x-backend.form.textarea>

                <!-- <div class="form-floating mb-3 mb-md-0 mt-3">
                    <input name="price" class="form-control" id="inputTitle" type="number" placeholder="Enter price" value="{{ old('price', $product->price) }}">
                    <label for="inputTitle">Price</label>

                    @error('price')
                    <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div> -->
                <x-backend.form.input name="price" :value="$product->price" />

                <!-- <div class="form-floating mb-3 mb-md-0 mt-3">
                    <input name="qty" class="form-control" id="inputTitle" type="number" placeholder="Enter qty" value="{{ old('qty', $product->qty) }}">
                    <label for="inputTitle">QTY</label>

                    @error('qty')
                    <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div> -->

                <x-backend.form.input name="qty" :value="$product->qty" />

                <!-- <div class="form-floating mb-3 mb-md-0 mt-3">
                    <input name="unit" class="form-control" id="inputTitle" type="text" placeholder="Enter unit" value="{{ old('unit', $product->unit) }}">
                    <label for="inputTitle">Unit</label>

                    @error('unit')
                    <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div> -->
                <x-backend.form.input name="unit" :value="$product->unit" />
                <x-backend.form.input name="image" type="file" :value="$product->image"/>                


                

                <x-backend.form.button>Update</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>