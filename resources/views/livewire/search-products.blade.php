<div>
    <div>
        <p>
            <input type="text" wire:model.live.debounce.2000ms="q">
        </p>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Product #</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($products as $product)
                <tr wire:key="{{$product->id}}">
                <td><a href="{{ route("products.show",$product)}}">{{$product->name}}</a></td>
                <td>${{number_format($product->price, 2, '.', ',')}}</td>
                <td>{{$product->item_number}}</td>
                </tr>
            @empty
                <p>No products to show. {{$q}}</p>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
