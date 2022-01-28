

<table id="datatablesSimple" border="1">
    <thead>
        <tr>
            <th>Sl#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>QTY</th>
            <th>Unit</th>
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
            
        </tr>
        @endforeach

    </tbody>
</table>