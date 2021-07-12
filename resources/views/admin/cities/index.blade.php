@extends('layout.admin')

@section('title', 'Cities')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header row">
                    <h4 class="card-title col-10">Cities</h4>
                    <a class="col-2" href="{{route('admin.cities.create')}}">
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
                                    Control
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cities as $city)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$city->name}}
                                </td>
                                <td class="row">
                                    <a class="col-2" href="{{route('admin.cities.edit', $city->id)}}">
                                        <button class="btn btn-default p-2"><i class="tim-icons icon-pencil"></i></button>
                                    </a>
                                    <form class="col-2" method="post"  action="{{route('admin.cities.destroy', $city->id)}}">
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
                        <div>
                            @for($i=1; $i<=$cities->lastPage(); $i++)
                                <a href="{{$cities->url($i)}}" class="btn btn-icon btn-round pt-2 {{$i==$cities->currentPage()?'btn-primary':''}}">{{$i}}</a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
