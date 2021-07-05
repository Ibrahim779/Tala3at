@extends('layout.admin')

@section('title', 'User')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Create User</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">&times;</i>
                                </button>
                                <span>
                                    {{$errors->first()}}
                                </span>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{old('name')}}" name="name"
                                           id="name" type="text" class="form-control"
                                           placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-1">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="{{old('email')}}" name="email"
                                           id="email" type="text" class="form-control"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-3 pl-md-1">
                                <div class="form-group">
                                    <label for="email">Phone</label>
                                    <input value="{{old('phone')}}" name="phone"
                                           id="email" type="text" class="form-control"
                                           placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-3 px-md-1">
                                <label for="image">Image</label>
                                <input name="avatar" id="image" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label for="governorate-select">Governorate</label>
                                    <select name="governorate_id" class="form-control myForm-select"
                                            id="governorate-select">
                                        <option selected>Open this select menu</option>
                                        @foreach($governorates as $governorate)
                                            <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 px-md-1">
                                <div class="form-group">
                                    <label for="city-select">City</label>
                                    <select name="city_id" class="form-control myForm-select"
                                            id="city-select">
                                        <option selected>Open this select menu</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 pl-md-1">
                                <div class="form-group">
                                    <label for="attendance-select">Gender</label>
                                    <select name="attendance_count" class="form-control myForm-select"
                                            id="attendance-select">
                                        <option selected>select menu</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 pl-md-2">
                                <div class="form-group">
                                    <label for="date">Date of birth</label>
                                    <input value="{{old('date_of_birth')}}" name="date_of_birth" id="date" type="date"
                                           class="form-control" placeholder="Date">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
