@extends('layout.admin')

@section('title', 'Users')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header row">
                    <h4 class="card-title col-10">Users</h4>
                    <a class="col-2" href="{{route('admin.users.create')}}">
                        <button class="btn btn-primary">Add</button>
                    </a>
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
                                    Name
                                </th>
                                <th class="text-center">
                                    Image
                                </th>
                                <th class="text-center">
                                    Phone
                                </th>
                                <th class="text-center">
                                    Email
                                </th>
                                <th class="text-center">
                                    Gender
                                </th>
                                <th class="text-center">
                                    Date of birth
                                </th>
                                <th>
                                    Control
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td class="text-center">
                                    <img class="table-img" src="{{$user->image}}" alt="meeting_img">
                                </td>
                                <td class="text-center">
                                    {{$user->phone}}
                                </td>
                                <td class="text-center">
                                    {{$user->email}}
                                </td>
                                <td class="text-center">
                                    {{$user->gender}}
                                </td>
                                <td class="text-center">
                                    {{$user->date_of_birth}}
                                </td>
                                <td class="row">
                                    <a class="col-3" href="{{route('admin.users.edit', $user->id)}}">
                                        <button class="btn btn-default p-2"><i class="tim-icons icon-pencil"></i></button>
                                    </a>
                                    <form class="col-2" method="post"  action="{{route('admin.users.destroy', $user->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger p-2"><i class="tim-icons icon-trash-simple"></i></button>
                                    </form>
                                </td>
                            </tr>
                                @empty
                                No
                            @endforelse
                            </tbody>
                        </table>
                        <div class="">
                            @for($i=1; $i<=$users->lastPage(); $i++)
                                <a href="{{$users->url($i)}}" class="btn btn-icon btn-round pt-2 {{$i==$users->currentPage()?'btn-primary':''}}">{{$i}}</a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
