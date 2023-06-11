<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container my-5">

<table class="table table-bordered my-3">
        <h3>Find Product By Id</h3>
    <thead class="bg-primary text-white">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $findById->title; }}</td>
            <td>{{ $findById->sortDesc; }}</td>
            <td>{{ $findById->price; }}</td>
        </tr>
    </tbody>
</table>
</div>
