@extends('layout.admin')

@section('title', 'Admin Create')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Create Admin</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.admins.store')}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{old('name')}}" name="name"
                                           id="name" type="text" class="form-control"
                                           placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="{{old('email')}}" name="email"
                                           id="email" type="text" class="form-control"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input value="{{old('password')}}" name="password"
                                           id="password" type="text" class="form-control"
                                           placeholder="password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label for="email">Phone</label>
                                    <input value="{{old('phone')}}" name="phone"
                                           id="email" type="text" class="form-control"
                                           placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-1">
                                <label for="image">Image</label>
                                <input name="img" id="image" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label for="facebook_link">Facebook Link</label>
                                    <input value="{{old('facebook_link')}}" name="facebook_link"
                                           id="facebook_link" type="text" class="form-control"
                                           placeholder="facebook link">
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label for="twitter_link">Twitter Link</label>
                                    <input value="{{old('twitter_link')}}" name="twitter_link"
                                           id="twitter_link" type="text" class="form-control"
                                           placeholder="twitter link">
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label for="google_link">Google Link</label>
                                    <input value="{{old('google_link')}}" name="google_link"
                                           id="google_link" type="text" class="form-control"
                                           placeholder="google link">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-md-1">
                                <div class="form-group">
                                    <label>Roles</label>
                                    @foreach($roles as $role)
                                        <input type="checkbox" id="role_{{$role->id}}" name="roles[]" value="{{$role->name}}">
                                        <label for="role_{{$role->id}}">{{$role->name}}</label><br>
                                    @endforeach
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
