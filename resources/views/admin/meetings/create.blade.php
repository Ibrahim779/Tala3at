@extends('layout.admin')

@section('title', 'main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Create Meeting</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.meetings.store')}}" method="post" enctype="multipart/form-data">
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
                                    <label for="titleAr">Title ar</label>
                                    <input value="{{old('title_ar')}}" name="title_ar"
                                           id="titleAr" type="text" class="form-control"
                                           placeholder="Title Ar">
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-1">
                                <div class="form-group">
                                    <label for="titleEn">Title en</label>
                                    <input value="{{old('title_ar')}}" name="title_en"
                                           id="titleEn" type="text" class="form-control"
                                           placeholder="Title En">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label for="category-select">Category</label>
                                    <select name="category_id"  class="form-control myForm-select"
                                            id="category-select">
                                        <option selected>Open this select menu</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 px-md-1">
                                <div class="form-group">
                                    <label for="attendances-select">Attendances</label>
                                    <select name="users[]"  class="form-control myForm-select"
                                            id="attendances-select">
                                        <option selected>Open this select menu</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 px-md-1">
                                <div class="col-md-4 px-md-1">
                                    <label for="image">Image</label>
                                    <input name="img" id="image" type="file" class="form-control">
                                </div>
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
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 pl-md-1">
                                <div class="form-group">
                                    <label for="attendance-select">Attendance count</label>
                                    <select name="attendance_count" class="form-control myForm-select"
                                            id="attendance-select">
                                        <option selected>select menu</option>
                                        @foreach(\App\Models\Meeting::getAttendancesCountArray() as $key => $value)
                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 pl-md-1">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input value="{{old('date')}}" name="date" id="date" type="date"
                                           class="form-control" placeholder="Date">
                                </div>
                            </div>
                            <div class="col-md-2 pl-md-1">
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input value="{{old('time')}}" name="time" id="time" type="time"
                                           class="form-control" placeholder="Time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descriptionAr">Description ar</label>
                                    <textarea name="description_ar" id="descriptionAr" rows="4" cols="80" class="form-control"
                                              placeholder="Here can be your description Ar">{{old('description_ar')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descriptionEn">Description en</label>
                                    <textarea name="description_en" id="descriptionEn" rows="4" cols="80" class="form-control"
                                              placeholder="Here can be your description En">{{old('description_en')}}</textarea>
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
@include('admin.meetings.parts.script')
