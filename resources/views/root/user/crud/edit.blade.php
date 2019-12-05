@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Edit {{$user->name}}</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"  value="{{$user->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password..">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password..">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="custom-select" required>
                                <option value="L">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="school">Majors / Department</label>
                            <input type="text" name="majors" class="form-control" value="{{$user->majors}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update User</button>
                            @if($user->role_id == 1)
                                <a class="btn btn-danger" href="{{route('user.root')}}">Cancel</a>
                            @elseif($user->role_id == 2)
                                <a class="btn btn-danger" href="{{route('user.admin')}}">Cancel</a>
                            @elseif($user->role_id == 3)
                                <a class="btn btn-danger" href="{{route('user.bureau')}}">Cancel</a>
                            @elseif($user->role_id == 4)
                                <a class="btn btn-danger" href="{{route('user.index')}}">Cancel</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection