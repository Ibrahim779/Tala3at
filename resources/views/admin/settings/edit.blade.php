@extends('layout.admin')

@section('title', 'Setting Edit')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit Setting</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.settings.update', $setting->id)}}" method="post" enctype="multipart/form-data">
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
                                    <input value="{{$setting->name?:old('name')}}" name="name"
                                           id="name" type="text" class="form-control"
                                           placeholder="Setting Name">
                                </div>
                            </div>
                            @if($setting->type == 'image')
                                <div class="col-md-4 px-md-1">
                                    <label for="image">Image</label>
                                    <input name="img" id="image" type="file" class="form-control">
                                </div>
                            @else
                                <div class="col-md-8 pr-md-1">
                                    <div class="form-group">
                                        <label for="value_ar">Value ar</label>
                                        <input value="{{$setting->value_ar?:old('value_ar')}}" name="value_ar"
                                               id="value_ar" type="text" class="form-control"
                                               placeholder="Setting Value Ar">
                                    </div>
                                </div>
                                <div class="col-md-8 pr-md-1">
                                    <div class="form-group">
                                        <label for="value_en">Value en</label>
                                        <input value="{{$setting->value_en?:old('value_en')}}" name="value_en"
                                               id="value_en" type="text" class="form-control"
                                               placeholder="Setting Value En">
                                    </div>
                                </div>
                            @endif
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
