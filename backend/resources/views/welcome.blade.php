<div class="container">

    <form action="{{ route('buy-products') }}" method="POST">
        @csrf
        <input type="text" name="products">
        <button type="submit"> Submit </button>
    </form>

</div>

@foreach ($errors->all() as $error)
    <li style="font-size: 16px; color: red; font-weight: bold">{{ $error }}</li>
@endforeach

@if(isset($saleRecord))
        <table>
            <thead>
                <th> Item </th>
                <th> Amount </th>
                <th> Price for the item </th>
            </thead>
            <tbody>
            @foreach($saleRecord['saleRecordProducts'] as $detail)
                <tr>
                    <td>{{$detail->product->name}}</td>
                    <td>{{$detail->amount_of_products}}</td>
                    <td>{{$detail->price_for_products}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    <h2>Total Price: {{$saleRecord->total_price}}</h2>

@endif
