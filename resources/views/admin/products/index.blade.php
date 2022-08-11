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
                        </thead>
                        <tbody>
                            @foreach ($products as $prod)
                                <tr>
                                    <td>
                                        {{$prod->p_image}}
                                    </td>
                                    <td>
                                        {{$prod->name}}
                                    </td>
                                    <td>
                                        {{$prod->price}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
