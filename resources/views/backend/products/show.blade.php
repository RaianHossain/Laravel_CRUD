<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Details
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
           Product Details <a class="btn btn-sm btn-info" href="{{ route('products.index') }}">List</a>
        </div>
        <div class="card-body">
            <h3>Title: {{ $product->title }}</h3>
            <p>Description: {{ $product->description }}</p>
            <p>Price: {{ $product->price }}</p>
            <p>QTY: {{ $product->qty }}</p>
            <p>Unit: {{ $product->unit }}</p>
            <img src="{{ asset('storage/images/'.$product->image) }}" />
        </div>
    </div>


</x-backend.layouts.master>