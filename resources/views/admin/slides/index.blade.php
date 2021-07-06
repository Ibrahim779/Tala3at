@extends('layout.admin')

@section('title', 'Slides')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Slides</h4>
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
                                <th>
                                    Image
                                </th>
                                <th>
                                    Text
                                </th>
                                <th class="text-center">
                                    Control
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($slides as $slide)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$slide->title}}
                                </td>
                                <td class="text-center">
                                    <a href="{{route('admin.slides.edit', $slide->id)}}">
                                        <button class="btn btn-default p-2"><i class="tim-icons icon-pencil"></i></button>
                                    </a>
                                    <form method="post"  action="{{route('admin.slides.destroy', $slide->id)}}">
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
                            @for($i=1; $i<=$slides->lastPage(); $i++)
                                <a href="{{$slides->url($i)}}" class="btn btn-icon btn-round pt-2 {{$i==$slides->currentPage()?'btn-primary':''}}">{{$i}}</a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a href="{{route('admin.slides.create')}}">
                <button class="btn btn-primary"><i class="tim-icons icon-simple-add"></i></button>
            </a>
        </div>
    </div>

@endsection
