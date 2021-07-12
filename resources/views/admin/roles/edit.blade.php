@extends('layout.admin')

@section('title', 'Role Edit')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit Role</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.roles.update', $role->id)}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{$role->name?:old('name')}}" name="name"
                                           id="name" type="text" class="form-control"
                                           placeholder="Role Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-md-1">
                                <label>Permissions</label>
                                <div class="form-group">
                                    @foreach($permissions as $permission)
                                        <input {{in_array($permission->name, $role->permissions->pluck('name')->toArray())?'checked':''}} type="checkbox" id="permission_{{$permission->id}}" name="permissions[]" value="{{$permission->name}}">
                                        <label for="permission_{{$permission->id}}">{{$permission->name}}</label><br>
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
