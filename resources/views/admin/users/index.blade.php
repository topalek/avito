@extends('layouts.app')

@section('content')
    @include('admin.users._nav')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->status === \App\Models\User::STATUS_WAIT)
                        <span class="badge badge-secondary">Waiting</span>
                    @endif
                    @if($user->status === \App\Models\User::STATUS_ACTIVE)
                        <span class="badge badge-primary">Active</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$users}}
@endsection
