@extends('layout.admin')

@section('title', 'Categories')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header row">
                    <h4 class="card-title col-10">Categories</h4>
                    <a class="col-2" href="{{route('admin.categories.create')}}">
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
                            @forelse($categories as $category)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td class="row">
                                    <a class="col-2" href="{{route('admin.categories.edit', $category->id)}}">
                                        <button class="btn btn-default p-2"><i class="tim-icons icon-pencil"></i></button>
                                    </a>
                                    <form class="col-2" method="post"  action="{{route('admin.categories.destroy', $category->id)}}">
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
                            @for($i=1; $i<=$categories->lastPage(); $i++)
                                <a href="{{$categories->url($i)}}" class="btn btn-icon btn-round pt-2 {{$i==$categories->currentPage()?'btn-primary':''}}">{{$i}}</a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
