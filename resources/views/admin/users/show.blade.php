@extends('layouts.app')

@section('content')
    @include('admin.users._nav')
    <div class="d-flex flex-row mb-3">
        <a href="{{route('admin.users.edit')}}" class="btn btn-primary mr-1">Edit</a>
        <form method="POST" action="{{route('admin.users.update',$user)}}" class="mr-1">
            @method('delete')
            @csrf
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <td>Id</td>
            <td>{{$user->id}}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                @if($user->status === \App\Models\User::STATUS_WAIT)
                    <span class="badge badge-secondary">Waiting</span>
                @endif
                @if($user->status === \App\Models\User::STATUS_ACTIVE)
                    <span class="badge badge-primary">Active</span>
                @endif
            </td>
        </tr>
        </tbody>
    </table>
@endsection

