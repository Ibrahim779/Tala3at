@extends('layout.admin')

@section('title', 'Admin Profile')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.admins.update', $admin->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
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
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{$admin->name?:old('name')}}" name="name"
                                           id="name" type="text" class="form-control"
                                           placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-1">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="{{$admin->email?:old('email')}}" name="email"
                                           id="email" type="text" class="form-control"
                                           placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label for="email">Phone</label>
                                    <input value="{{$admin->phone?:old('phone')}}" name="phone"
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
                                    <input value="{{$admin->facebook_link?:old('facebook_link')}}" name="facebook_link"
                                           id="facebook_link" type="text" class="form-control"
                                           placeholder="facebook link">
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label for="twitter_link">Twitter Link</label>
                                    <input value="{{$admin->twitter_link?:old('twitter_link')}}" name="twitter_link"
                                           id="twitter_link" type="text" class="form-control"
                                           placeholder="twitter link">
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label for="google_link">Google Link</label>
                                    <input value="{{$admin->google_link?:old('google_link')}}" name="google_link"
                                           id="google_link" type="text" class="form-control"
                                           placeholder="google link">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-md-1">
                                <label>Roles</label>
                                <div class="form-group">
                                    @foreach($roles as $role)
                                        <input {{in_array($role->name, $admin->roles->pluck('name')->toArray())?'checked':''}} type="checkbox" id="role_{{$role->id}}" name="roles[]" value="{{$role->name}}">
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
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="javascript:void(0)">
                                <img class="avatar" src="{{$admin->image}}" alt="adminImage">
                                <h5 class="title">{{$admin->name}}</h5>
                            </a>
                            <div class="description">
                                {{@$admin->roles()->first()->name}}
                            </div>
                            <div class="description">
                                {{$admin->email}}
                            </div>
                        </div>
                    </p>
            </div>
            <div class="card-footer">
                <div class="button-container">
                    <button href="{{$admin->facebook_link}}" class="btn btn-icon btn-round btn-facebook">
                        <i class="fab fa-facebook"></i>
                    </button>
                    <button href="{{$admin->twitter_link}}" class="btn btn-icon btn-round btn-twitter">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button href="{{$admin->google_link}}" class="btn btn-icon btn-round btn-google">
                        <i class="fab fa-google-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
