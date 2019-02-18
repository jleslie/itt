@extends('layouts.app')

@section('content')

@if(isset($content['created_at']))
    <h1>Edit Content</h1>
    <p>You can edit and save this content.</p>
@else
    <h1>Create Content</h1>
    <p>Create new content.</p>
@endif

@include('inc.forms.content')

<p class='smaller-text'>
    <em>
        @if(isset($content['created_at']))
            This content was created by {{ $content['owner'] }} {{ formatDateTimeDiff($content['created_at']) }} ago.
        @else
            Content not yet created.
        @endif

        @if(isset($content['updated']))
            Last updated {{ formatDateTimeDiff($content['updated']) }} ago.
        @endif
    </em>
</p>


<a href='{{ url("/content/create") }}'>Create new</a>
@if(isset($content['id']))
    <a href="<?= url('/blog') . '/' . $content['id'] ?>"> View</a>
@endif
<a href='{{ url("/content") }}'>View all</a>

@include('inc.content.actions')

@endsection
