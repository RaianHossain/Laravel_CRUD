<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Categories
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Categories </x-slot>

            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Categories</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Categories <a class="btn btn-sm btn-info" href="{{ route('categories.create') }}">Add New</a>
        </div>
        <div class="card-body">

            @if (session('message'))
            <div class="alert alert-success">
                <span class="close" data-dismiss="alert">&times;</span>
                <strong>{{ session('message') }}.</strong>
            </div>
            @endif

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ ++$sl }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('categories.show', ['category' => $category->id]) }}" >Show</a>

                            <a class="btn btn-warning btn-sm" href="{{ route('categories.edit', ['category' => $category->id]) }}" >Edit</a>

                            <form style="display:inline" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>

                            <!-- <a href="{{ route('categories.destroy', ['category' => $category->id]) }}" >Delete</a> -->


                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-backend.layouts.master>