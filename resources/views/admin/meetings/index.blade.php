@extends('layout.admin')

@section('title', 'main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Simple Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Title
                                </th>
                                <th class="text-center">
                                    Image
                                </th>
                                <th class="text-center">
                                    Attendances Count
                                </th>
                                <th class="text-center">
                                    Date
                                </th>
                                <th class="text-center">
                                    Time
                                </th>
                                <th class="text-center">
                                    Control
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($meetings as $meeting)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$meeting->title}}
                                </td>
                                <td class="text-center">
                                    <img class="table-img" src="{{$meeting->image}}" alt="meeting_img">
                                </td>
                                <td class="text-center">
                                    {{$meeting->attendance_count}}
                                </td>
                                <td class="text-center">
                                    {{$meeting->date}}
                                </td>
                                <td class="text-center">
                                    {{$meeting->time}}
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-default p-2"><i class="tim-icons icon-pencil"></i></button>
                                    <button class="btn btn-danger p-2"><i class="tim-icons icon-trash-simple"></i></button>
                                </td>
                            </tr>
                                @empty
                                No
                            @endforelse
                            </tbody>
                        </table>
                        <div class="">
                            @for($i=1; $i<=$meetings->lastPage(); $i++)
                                <a href="{{$meetings->url($i)}}" class="btn btn-icon btn-round pt-2 {{$i==$meetings->currentPage()?'btn-primary':''}}">{{$i}}</a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a href="{{route('admin.meetings.create')}}">
                <button class="btn btn-primary"><i class="tim-icons icon-simple-add"></i></button>
            </a>
        </div>
    </div>

@endsection
