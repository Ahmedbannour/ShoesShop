@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>{{$prod->name}}</div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('storage/images/'.$prod->name.'/'.$prod->photos[0]->name) }}" alt="nope" style="object-fit: contain ; width : 100% ; height : 150px">
                        </div>
                        <div class="col-md-8 row mb-1">
                            <div class="col-md-12 " style="overflow-y: auto ; height : 100px">
                                <p>
                                    {{$prod->description}}
                                </p>
                            </div>
                            <div class="col-md-12  mt-3">
                                <strong>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            Price :
                                        </div>
                                        <div class="">
                                            {{ number_format($prod->price, 2) }} <span>&#36;</span>
                                        </div>
                                    </div>
                                </strong>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 font-weight-bold">
                            More Details
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <strong>Images</strong>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                            <div class="col-md-6 text-center">
                                                <strong>Taille</strong>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <strong>Quantity</strong>
                                            </div>
                                    </div>
                                </div>
                                @foreach ($prod->photos as $item)
                                    <div class="col-md-12 mt-2 details-card">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{asset('storage/images/'.$prod->name.'/'.$item->name) }}" alt="nope" style="object-fit: contain ; width : 100% ; height : 80px">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row h-100" style="align-items: center" >
                                                    @foreach ($item->sizes as $size)
                                                        <div class="col-md-6 align-middle" style="text-align: center">
                                                            {{$size->taille}}
                                                        </div>
                                                        <div class="col-md-6" style="text-align: center">
                                                            {{$size->pivot->qte}}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
