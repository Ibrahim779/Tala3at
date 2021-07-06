@extends('layout.admin')

@section('title', 'Slide Edit')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit Slide</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.slides.update', $slide->id)}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label for="titleAr">Title ar</label>
                                    <input value="{{$slide->title_ar?:old('title_ar')}}" name="name_ar"
                                           id="titleAr" type="text" class="form-control"
                                           placeholder="Name Ar">
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label for="titleEn">Title en</label>
                                    <input value="{{$slide->title_en?:old('title_en')}}" name="name_en"
                                           id="titleEn" type="text" class="form-control"
                                           placeholder="Name En">
                                </div>
                            </div>
                            <div class="col-md-4 px-md-1">
                                <label for="image">Image</label>
                                <input name="img" id="image" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descriptionAr">Text ar</label>
                                    <textarea name="description_ar" id="descriptionAr" rows="4" cols="80" class="form-control"
                                              placeholder="Here can be your description Ar">{{$slide->text_ar?:old('text_ar')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descriptionEn">Text en</label>
                                    <textarea name="description_en" id="descriptionEn" rows="4" cols="80" class="form-control"
                                              placeholder="Here can be your description En">{{$slide->text_en?:old('text_en')}}</textarea>
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
