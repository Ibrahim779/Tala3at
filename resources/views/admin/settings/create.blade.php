@extends('layout.admin')

@section('title', 'Setting Create')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Create Setting</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.settings.store')}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{old('name')}}" name="name"
                                           id="name" type="text" class="form-control"
                                           placeholder="Role Name">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label for="key">Key</label>
                                    <input value="{{old('key')}}" name="key"
                                           id="key" type="text" class="form-control"
                                           placeholder="Role Name">
                                </div>
                            </div>
                            <div class="col-md-2 px-md-1">
                                <div class="form-group">
                                    <label for="type-select">Type</label>
                                    <select name="type" class="form-control myForm-select"
                                            id="type-select">
                                        <option selected>Open this select menu</option>
                                        <option {{old('type') == 'text'?'selected':''}} value="text">text</option>
                                        <option {{old('type') == 'image'?'selected':''}} value="image">image</option>
                                        <option {{old('type') == 'textarea'?'selected':''}} value="textarea">textarea</option>
                                    </select>
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
