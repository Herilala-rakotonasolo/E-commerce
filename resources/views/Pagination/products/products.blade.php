@extends('layouts.template')
@section('main')
@include('layouts.partials.categoryitem')
<div class="bannerProduct mb-5 container bg-light">
    <div class="row gy-3 justify-content-center">
        @foreach ($products as $product)
        <div class="col-sm-3">
            <div class="card shadow-sm">
                <img src="{{asset('assets/products/'.$product->photo_principal)}}" alt="{{$product->name}}" class="img-fluid">
                <div class="card-body">
                    <p class="card-text d-none d-md-block">
                        {{strtoupper($product->name)}} <br>
                        Prix H.T : {{number_format($product->prix_ht,2)}} Ar
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{route('showproduct',['id'=>$product->id])}}" class="btn btn-sm btn-outline-primary">View</a>
                    </div>
                    <i class="fa fa-shopping-cart h4 text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection