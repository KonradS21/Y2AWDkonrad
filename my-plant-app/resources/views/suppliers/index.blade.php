<!DOCTYPE html>
<html>
<head><title>Supplier</title></head>
<body>
    <h1>All Suppliers</h1>
    <ul>
    @foreach($suppliers as $supplier)
        <li>{{$supplier->name}} - {{ $supplier->description}}</li>
    @endforeach
    </ul>
</body>
</html>
