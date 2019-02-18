@extends('layouts.app')

@section('content')
@include('inc.statusBox')

<h1>Content</h1>
<p>Create, edit and view content.</p>

<h2>All content</h2>

@if(count($contents) > 0)
    <ul>
    @foreach($contents as $val)
        <li>
            {{ $val['id'] }}, {{ $val['title'] }} by {{ $val->user['username'] }} 
            <a href="<?= url('/content/edit') . '/' . $val['id']; ?>">Edit</a>
        </li>
    @endforeach
    </ul>
@else
    <p>No content exists.</p>
@endif

@include('inc.content.actions')

@endsection