@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h1">{{ __('Checkout Form') }}</h1>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">{{ __('Your cart') }}</span>
                    <span class="badge badge-secondary badge-pill">{{ $items->count() }}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach($items as $item)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h5 class="my-0"><strong>{{ $item->object->name }}</strong></h5>
                            <small class="text-muted">{{ $item->object->summary }}</small>
                            <h6 class="my-0">{{ __('Type') }}: {{ $item->type }}</h6>
                            <h6 class="my-0">{{ __('Quantity') }}: {{ $item->quantity }}</h6>
                            <h6 class="my-0">{{ __('Unit price') }}: {{ Shop::format($item->price) }}</h6>
                        </div>
                        <span class="text-muted">{{ __('total') }} <strong>{{ Shop::format($item->price * $item->quantity) }}</strong></span>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ __('Total') }}</span>
                        <strong>{{  Shop::format($cart->total) }}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" action="{{ route('carts.checkout') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name">{{ __('First name') }}</label>
                            <input name="first_name" type="text" class="form-control" id="first_name" placeholder="John" value="{{ old('first_name') }}">
                            @if($errors->first('first_name'))
                            <div class="invalid-feedback text-danger">
                                {{ $errors->first('first_name') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name">{{ __('Last name') }}</label>
                            <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Doe"  value="{{ old('last_name') }}">
                            @if($errors->first('last_name'))
                                <div class="invalid-feedback text-danger">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">{{ __('Email') }} <span class="text-muted">({{ __('Optional') }})</span></label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com" value="{{ old('email') }}">
                        @if($errors->first('email'))
                            <div class="invalid-feedback text-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="address">{{ __('Address') }}</label>
                        <input name="address" type="text" class="form-control" id="address" placeholder="1234 Main St" value="{{ old('address') }}">
                        @if($errors->first('address'))
                            <div class="invalid-feedback text-danger">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="address2">{{ __('Address 2') }} <span class="text-muted">({{ __('Optional') }})</span></label>
                        <input name="address2" type="text" class="form-control" id="address2" placeholder="Apartment or suite" value="{{ old('address2') }}">
                        @if($errors->first('address2'))
                            <div class="invalid-feedback text-danger">
                                {{ $errors->first('address2') }}
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="billing_country">{{ __('Billing country') }}</label>
                            <select name="billing_country" class="form-control" id="billing_country">
                                <option value="">Choose...</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->alpha2 }}" @if(old('billing_country') == $country->alpha2)selected=""@endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->first('billing_country'))
                                <div class="invalid-feedback text-danger">
                                    {{ $errors->first('billing_country') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="billing_state">{{ __('Billing state or city') }}</label>
                            <input name="billing_state" class="form-control" id="billing_state" placeholder="New York" value="{{ old('billing_state') }}">
                            @if($errors->first('billing_state'))
                                <div class="invalid-feedback text-danger">
                                    {{ $errors->first('billing_state') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="shipping_country">{{ __('Shipping country') }} <span class="text-muted">({{ __('Optional') }})</span></label>
                            <select name="shipping_country" class="form-control" id="shipping_country" value="{{ old('shipping_country') }}">
                                <option value="">Choose...</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->alpha2 }}" @if(old('shipping_country') == $country->alpha2)selected=""@endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->first('shipping_country'))
                                <div class="invalid-feedback text-danger">
                                    Please select a valid country.
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="shipping_state">{{ __('Shipping state or city') }} <span class="text-muted">({{ __('Optional') }})</span></label>
                            <input name="shipping_state" type="text" class="form-control" id="shppping_state" placeholder="New York" value="{{ old('shipping_state') }}">
                            @if($errors->first('shipping_state'))
                                <div class="invalid-feedback text-danger">
                                    Please select a valid state (city).
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="zip">{{ __('Zip') }}</label>
                            <input name="zip" type="text" class="form-control" id="zip" placeholder="" value="{{ old('zip') }}">
                            @if($errors->first('zip'))
                                <div class="invalid-feedback text-danger">
                                    {{ $errors->first('zip') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr class="mb-4">

                    <button class="btn btn-primary btn-lg btn-block" type="submit">{{ __('Continue to checkout') }}</button>
                </form>
            </div>
        </div>
    </div><br>
@endsection
