@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Products</div>
                        <div>
                            <a href="{{route('admin.products.create')}}" class="btn btn-primary" >Add product</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>image</th>
                            <th>name</th>
                            <th>price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            {{-- @foreach ($products as $prod)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/images/'.$prod->p_image) }}" alt="nope" style="object-fit: contain ; width : 150px ; height : 150px">
                                    </td>
                                    </td>
                                    <td>
                                        {{$prod->name}}
                                    </td>
                                    <td>
                                        {{$prod->price}}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning deteil-btn">
                                            Details
                                        </a>
                                    </td> --}}
                                {{-- </tr> --}}
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.products.details')

@endsection
