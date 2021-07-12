@extends('layout.admin')

@section('title', 'Admins')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header row">
                    <h4 class="card-title col-10">Admins</h4>
                    <a class="col-2" href="{{route('admin.admins.create')}}">
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
                                <th>
                                    Image
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Control
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($admins as $admin)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$admin->name}}
                                </td>
                                <td>
                                    <img class="table-img" src="{{$admin->image}}" alt="meeting_img">
                                </td>
                                <td>
                                    {{$admin->phone}}
                                </td>
                                <td>
                                    {{$admin->email}}
                                </td>
                                <td class="row">
                                    <a class="col-2" href="{{route('admin.admins.show', $admin->id)}}">
                                        <button class="btn btn-success p-2"><i class="fas fa-eye"></i></button>
                                    </a>
                                    <form class="col-2" method="post"  action="{{route('admin.admins.destroy', $admin->id)}}">
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
                            @for($i=1; $i<=$admins->lastPage(); $i++)
                                <a href="{{$admins->url($i)}}" class="btn btn-icon btn-round pt-2 {{$i==$admins->currentPage()?'btn-primary':''}}">{{$i}}</a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
