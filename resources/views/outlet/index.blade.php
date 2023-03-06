@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-5">
    <div class="col-md-6">
        <form action="/outlets">
            <div class="input-group">
                <span class="input-group-text align-top pb-3" id="basic-addon2"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control" placeholder="Search book" aria-label="Search book" aria-describedby="button-addon2" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
    </div>
</div>

@if ($outlets->count())
<div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach ($outlets as $outlet)
    <div class="col">
        <div class="card border border-dark">
            <h3 class="card-header border-bottom border-secondary d-inline">{{ $outlet->nama }}</h3>
            <div class="card-body pt-4">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <h5>Alamat</h5>
                        <p>{{ $outlet->alamat }}</p>
                    </div>
                    <div class="col">
                        <h5>No Telepon</h5>
                        <p>{{ $outlet->telepon }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<h4 class="d-flex justify-content-center align-items-center fw-bold" style="margin: 30vh 0 30vh 0;">Books not found</h4>
@endif
<div class="d-flex justify-content-end">
    {{ $outlets->links() }}
</div>
@endsection