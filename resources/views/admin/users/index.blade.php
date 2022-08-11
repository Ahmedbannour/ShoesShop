@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">role</th>
                            <th scope="col">Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                               <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                    <td>
                                        <a href="{{route('admin.users.edit' , $user->id)}}" class="btn btn-warning">update</a>
                                        <form action="{{route('admin.users.destroy' , $user)}}" method="post" class="float-left">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
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
