@extends('layout.admin')

@section('title', 'main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-3 m-5 btn btn-primary btn-block">
                            <p class="p-1">
                               {{__('admin.meetings')}}
                            </p>
                            <span class="p-1">
                                {{$meetingsCount}}
                            </span>
                        </div>
                        <div class="col-md-3 m-5 btn btn-primary btn-block">
                            <p class="p-1">
                                {{__('admin.users')}}
                            </p>
                            <span class="p-1">
                                {{$usersCount}}
                            </span>
                        </div>
                        <div class="col-md-3 m-5 btn btn-primary btn-block">
                            <p class="p-1">
                                {{__('admin.categories')}}
                            </p>
                            <span class="p-1">
                                {{$categoriesCount}}
                            </span>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Last Meetings</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-full-width table-responsive">
                                <table class="table">
                                    <tbody>
                                    @forelse($lastMeetings as $meeting)
                                    <tr>
                                        <td>
                                          <img class="table-img" src="{{$meeting->image}}" alt="">
                                        </td>
                                        <td>
                                            <p class="title pt-2">{{$meeting->title}}</p>
                                            <p class="text-muted">{{$meeting->created_at}}</p>
                                        </td>
                                        <td class="td-actions text-right">
                                            <a class="col-3" href="{{route('admin.meetings.edit', $meeting->id)}}">
                                                <button class="btn btn-default p-2"><i class="tim-icons icon-pencil"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                        @empty
                                        No Meetings
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Last Users</h4>
                        </div>
                        <div class="card-body ">
                            <div class="table-full-width table-responsive">
                                <table class="table">
                                    <tbody>
                                    @forelse($lastUsers as $user)
                                        <tr>
                                            <td>
                                                <img class="table-img" src="{{$user->image}}" alt="">
                                            </td>
                                            <td>
                                                <p class="title pt-2">{{$user->name}}</p>
                                                <p class="text-muted">{{$user->email}}</p>
                                            </td>
                                            <td class="td-actions text-right">
                                                <a class="col-3" href="{{route('admin.users.edit', $user->id)}}">
                                                    <button class="btn btn-default p-2"><i class="tim-icons icon-pencil"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        No Meetings
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
