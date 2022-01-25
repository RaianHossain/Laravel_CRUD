<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Categories </x-slot>

            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Category <a class="btn btn-sm btn-info" href="{{ route('categories.index') }}">List</a>
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

            <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-floating mb-3 mb-md-0">
                    <input name="title" class="form-control" id="inputTitle" type="text" placeholder="Enter your title" value="{{ old('title', $category->title) }}">
                    <label for="inputTitle">Title</label>

                    @error('title')
                    <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-floating mt-3">
                    <textarea name="description" class="form-control" id="inputDescription" placeholder="Description">
                    {{ old('description', $category->description) }}
                    </textarea>
                    <label for="inputDescription">Description</label>

                    @error('description')
                    <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-floating mt-3">
                    <input name="image" type="file" class="form-control" id="inputImage">
                    <label for="inputImage">Image</label>
                </div>

                <div class="mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-backend.layouts.master>