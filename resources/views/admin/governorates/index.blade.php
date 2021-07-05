@extends('layout.admin')

@section('title', 'Governorates')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Governorates</h4>
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
                                    Control
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($governorates as $governorate)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$governorate->name}}
                                </td>
                                <td class="text-center">
                                    <a href="{{route('admin.governorates.edit', $governorate->id)}}">
                                        <button class="btn btn-default p-2"><i class="tim-icons icon-pencil"></i></button>
                                    </a>
                                    <form method="post"  action="{{route('admin.governorates.destroy', $governorate->id)}}">
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
                            @for($i=1; $i<=$governorates->lastPage(); $i++)
                                <a href="{{$governorates->url($i)}}" class="btn btn-icon btn-round pt-2 {{$i==$governorates->currentPage()?'btn-primary':''}}">{{$i}}</a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a href="{{route('admin.governorates.create')}}">
                <button class="btn btn-primary"><i class="tim-icons icon-simple-add"></i></button>
            </a>
        </div>
    </div>

@endsection
