@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="row">
                    @foreach($books as $book)
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="card" style="width: 18rem; border: 2px solid #aaa; border-radius: 10px">
                                <div class="card-body">
                                    <h5 class="card-title"><a class="card-link" href="{{ route('books.show', $book) }}">{{ $book->title }}</a></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
                                    <p class="card-text">{{ $book->summary }}</p>
                                    <form action="{{ route('books.add-to-cart', $book) }}" method="POST">
                                        {{ csrf_field() }}
                                        <select name="quantity" min="1" max="100">
                                            @for($i = 1; $i<=100; $i++)
                                                <option value="{{ $i }}" @if($i==1){{'selected'}}@endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <button role="button" type="submit" class="btn btn-success">{{ __('Add to Cart') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    @foreach($mobiles as $mobile)
                        <div class="col-sm-6 col-md-4">
                            <div class="card" style="width: 18rem; border: 2px solid #aaa; border-radius: 10px">
                                <div class="card-body">
                                    <h5 class="card-title"><a class="card-link" href="{{ route('books.show', $mobile) }}">{{ $mobile->model }}</a></h5>
                                    <p class="card-text">{{ __('Brand') }}: {{ $mobile->brand }}</p>
                                    <p class="card-text">{{ $mobile->summary }}</p>
                                    <p class="card-text">{{ __('Processor') }}: {{ $mobile->processor }}</p>
                                    <p class="card-text">{{ __('Memory capacity') }}: {{ $mobile->memory_capacity }}</p>
                                    <p class="card-text">{{ __('OS') }}: {{ $mobile->os }}</p>
                                    <p class="card-text">{{ __('OS Version') }}: {{ $mobile->os_version }}</p>
                                    <form action="{{ route('mobiles.add-to-cart', $mobile) }}" method="POST">
                                        {{ csrf_field() }}
                                        <select name="quantity" min="1" max="100">
                                            @for($i = 1; $i<=100; $i++)
                                                <option value="{{ $i }}" @if($i==1){{'selected'}}@endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <button role="button" type="submit" class="btn btn-success">{{ __('Add to Cart') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
