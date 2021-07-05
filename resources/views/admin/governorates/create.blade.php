@extends('layout.admin')

@section('title', 'Governorate Create')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Create Governorate</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.governorates.store')}}" method="post" enctype="multipart/form-data">
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
                                    <label for="titleAr">Name ar</label>
                                    <input value="{{old('name_ar')}}" name="name_ar"
                                           id="titleAr" type="text" class="form-control"
                                           placeholder="Name Ar">
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-1">
                                <div class="form-group">
                                    <label for="titleEn">Name en</label>
                                    <input value="{{old('name_en')}}" name="name_en"
                                           id="titleEn" type="text" class="form-control"
                                           placeholder="Name En">
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
