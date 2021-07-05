@extends('layout.admin')

@section('title', 'Users')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Users</h4>
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
                                <th class="text-center">
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
                                    <img class="table-img" src="{{$user->avatar}}" alt="meeting_img">
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
                                <td class="text-center">
                                    <a href="{{route('admin.users.edit', $user->id)}}">
                                        <button class="btn btn-default p-2"><i class="tim-icons icon-pencil"></i></button>
                                    </a>
                                    <form method="post"  action="{{route('admin.users.destroy', $user->id)}}">
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
        <div class="col-md-4">
            <a href="{{route('admin.users.create')}}">
                <button class="btn btn-primary"><i class="tim-icons icon-simple-add"></i></button>
            </a>
        </div>
    </div>

@endsection
