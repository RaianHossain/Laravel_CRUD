<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Details
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Categories </x-slot>

            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Category Details <a class="btn btn-sm btn-info" href="{{ route('categories.index') }}">List</a>
        </div>
        <div class="card-body">
            <h3>Title: {{ $category->title }}</h3>
            <p>Description: {{ $category->description }}</p>
        </div>
    </div>


</x-backend.layouts.master>