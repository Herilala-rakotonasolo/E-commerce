
<table class="table table-hover table-borderless">
    <p class="float-end"><a href="{{route('carts_clear')}}" class="text-danger">Vider le panier</a></p>
    <thead>
        <tr class="border-bottom bg-primary text-light">
            <th scope="col">Images</th>
            <th scope="col">Nom Produits</th>
            <th scope="col">Quantité</th>
            <td scope="col">Modification</td>
            <th scope="col" class="text-center">Prix TTC</th>
        </tr>
    </thead>
    <tbody>
        @foreach($content->all() as $items)
        <tr>
            <td><img src="{{$items->attributes->photo}}" class="img-thumbnail" alt="{{ $items->name }}" width="50px"></td>
            <td>{{ $items->name }}</td>
            <form action="{{route('cart_update',['id'=>$items->attributes->id])}}" class="d-inline">
                <td><input name="quantity" type="number" value="{{$items->quantity}}" class="form-control w-50 text-center"></td>
                <td>
                    <input type="submit" value="Mettre à jour" class="btn btn-outline-success">
                </td>
            </form>
            <td class="text-end">{{ number_format($items->quantity * $items->price,2) }} €</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>

        <tr>
            <td><td></td></td>
            <td></td>
            <td class="fw-bold">Montant Total</td>
            <td class="text-end fw-bold border border-lg pink fw-bold">{{ number_format($total,2) }} €</td>
        </tr>

        <tr>
            <td><td><a href="{{route('products')}}" class="nav-link">Plus des produits</a></td></td>
            <td></td>
            <td class="fw-bold">Montant Total TTC</td>
            <td class="text-end fw-bold border border-lg pink fw-bold">{{ number_format($totalTTC,2) }} €</td>
        </tr>

        <tr>
            <td><td></td></td>
            <td></td>

            <td colspan="2" class="text-center">
                <form action="{{ route('storeAllCommands') }}" method="POST">
                        @csrf
                    <input type="submit" value="Passer à la caisse" class="btn btn-outline-primary text-center w-100">
                </form>
            </td>
        </tr>
    </tfoot>
</table>