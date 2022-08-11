@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Product</div>
                <div class="card-body">
                    @livewire('create-prod-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
