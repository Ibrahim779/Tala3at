@extends('layout.admin')

@section('title', 'Chats')

@section('content')

    <div id="app">
        <div class="container">
            <div class="messaging">
                <chat-component></chat-component>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
