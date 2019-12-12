@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="h2">Number of Products: {{ \App\Cart::current()->items->count() }}</h2>
                        <h2 class="h2">Number of Pieces: {{ \App\Cart::current()->count }}</h2>
                        <h2 class="h2">Total Price: {{ \App\Cart::current()->total }}</h2><br>
                        @if($items->count() > 0)
                            <a class="btn btn-primary" href="{{ route('carts.checkout-form') }}"><i class="fas fa-shopping-bag"></i> {{ __('Checkout') }}</a><br><br>
                            <form action="{{ route('carts.clear-cart') }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button role="button" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> {{ __('Clear cart') }}</button>
                            </form>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    @if($items->count() > 0)
                        @foreach($items as $item)
                            <div class="col-sm-12">
                                <div class="card" style="width: 18rem; border: 2px solid #aaa; border-radius: 10px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ __('Type') }}: {{ $item->type }}</h5>
                                        <h5 class="card-title">{{ __('Name') }}: {{ $item->object->name }}</h5>
                                        <h5 class="card-title">{{ __('Quantity') }}: {{ $item->quantity }} {{ __('pieces') }}</h5>
                                        <h5 class="card-title">{{ __('Unit price') }}: {{ Shop::format($item->price) }}</h5>
                                        <h5 class="card-title">{{ __('Total') }}: {{ Shop::format($item->price * $item->quantity) }}</h5>
                                        <form action="{{ route('carts.remove-from-cart', $item) }}" method="POST">
                                            {{ csrf_field() }}
                                            <select name="quantity" min="1" max="100">
                                                @for($i = 1; $i<=$item->quantity; $i++)
                                                    <option value="{{ $i }}" @if($i==1){{'selected'}}@endif>{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <button role="button" type="submit" class="btn btn-danger">{{ __('Remove from Cart') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-sm-12">
                            There is no items in the cart.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
