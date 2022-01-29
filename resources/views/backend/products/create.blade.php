<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Products </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Product <a class="btn btn-sm btn-info" href="{{ route('products.index') }}">List</a>
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

            <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="post">
            
                @csrf
                <x-backend.form.input name="title"/>

                <x-backend.form.textarea name="description" />

                <!-- <div class="form-floating mb-3 mb-md-0 mt-3">
                    <input name="price" class="form-control" id="inputTitle" type="number" placeholder="Enter price" value="{{ old('price') }}">
                    <label for="inputTitle">Price</label>

                    @error('price')
                    <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div> -->
                <x-backend.form.input name="price" type="number" />

                <!-- <div class="form-floating mb-3 mb-md-0 mt-3">
                    <input name="qty" class="form-control" id="inputTitle" type="number" placeholder="Enter quantity" value="{{ old('qty') }}">
                    <label for="inputTitle">QTY</label>

                    @error('qty')
                    <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div> -->
                <x-backend.form.input name="qty" type="number" />

                <!-- <div class="form-floating mb-3 mb-md-0 mt-3">
                    <input name="unit" class="form-control" id="inputTitle" type="text" placeholder="Enter unit" value="{{ old('unit') }}">
                    <label for="inputTitle">Unit</label>

                    @error('unit')
                    <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div> -->
                <x-backend.form.input name="unit"/>

                

                

                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>