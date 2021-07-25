@extends('layout.admin')

@section('title', 'Chats')

@section('content')

    <div class="container">
        <div class="messaging">
            @livewire('chat')
        </div>
    </div>

@endsection
