<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Products
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Products </x-slot>

            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Products <a class="btn btn-sm btn-info" href="{{ route('products.create') }}">Add New</a>
            <a class="btn btn-sm btn-info" href="{{ route('products.trash') }}">Trash List</a>
            <a class="btn btn-sm btn-info" href="{{ route('products.pdf') }}">Downlaod PDF</a>
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
                        <th>Price</th>
                        <th>QTY</th>
                        <th>Unit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ ++$sl }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('products.show', ['product'=> $product->id]) }}" >Show</a>

                            <a class="btn btn-warning btn-sm" href="{{ route('products.edit', ['product'=> $product->id]) }}" >Edit</a>

                            <form style="display:inline" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                            


                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-backend.layouts.master>