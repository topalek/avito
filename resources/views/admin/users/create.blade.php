@extends('layouts.app')

@section('content')
    @include('admin.users._nav')
    <form method="POST" action="{{route('admin.users.store')}}">
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input type="text" name="name" id="name" value="{{old('name')}}"
                   class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="" required>
            @if($errors->has('name'))
                <span class="invalid-feedback"><strong>{{$errors->first('name')}}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label">Email address</label>
            <input type="email" name="email" id="email" value="{{old('email')}}"
                   class="form-control {{$errors->has('email')?'is-invalid':''}}" placeholder="" required>
            @if($errors->has('email'))
                <span class="invalid-feedback"><strong>{{$errors->first('email')}}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection

