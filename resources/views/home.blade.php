<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container my-5">
    <table class="table table-bordered">
        <h3>Product List</h3>
    <thead class="bg-primary text-white">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->title; }}</td>
            <td>{{ $product->sortDesc; }}</td>
            <td>{{ $product->price; }}</td>
        </tr>
        @endforeach

    </tbody>
</table>

<table class="table table-bordered my-3">
        <h3>Single Product</h3>
    <thead class="bg-primary text-white">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $single->title; }}</td>
            <td>{{ $single->sortDesc; }}</td>
            <td>{{ $single->price; }}</td>
        </tr>
    </tbody>
</table>
</div>
