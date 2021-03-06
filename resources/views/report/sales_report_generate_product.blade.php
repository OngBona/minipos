<html>
<title>Sales Product Report</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>
<table class="table m-table m-table--head-bg-success">
    <thead>
        <tr>
            <th>No</th>
            <th>Product</th>
            <th>Cost</th>
            <th>Price</th>
            <th>Sales</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            @php
                $discount    += $product->discount;
                $grand_total += ($product->count * $product->price) - $product->discount;
            @endphp 
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ \Helper::number_formats($product->cost, 'view', 0, ',') }}</td>
                <td>{{ \Helper::number_formats($product->price, 'view', 0, ',') }}</td>
                <td>{{ $product->count }}</td>
                <td>{{ \Helper::number_formats($product->count * $product->price, 'view', 0, ',') }}</td>
            </tr>
        @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Discount<br /> </strong> Rp {{ \Helper::number_formats($discount, 'view', 0, ',') }}</td>
                <td><strong>Grand Total<br /> </strong> Rp {{ \Helper::number_formats($grand_total, 'view', 0, ',') }}</td>
            </tr>
    </tbody>
</table>
</html>