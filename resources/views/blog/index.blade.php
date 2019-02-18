@extends('layouts.app')

@section('content')
<h1>Blog</h1>
<p>All blog-like list of all content with the type "post"
@if(Auth::check())
    , <a href='{{url("/content")}}'>view all content</a>.
@endif
</p>

@if($contents)
    @foreach($contents as $val)
	<div id="content" style="width: 800px;" class="blog-post">
	<div id='logo2' class="rounded contentstyle"style="width: 790px;">
    <h2>{{ esc($val['title']) }}</h2>
    <p class='smaller-text'><em>Posted on {{ $val['created_at'] }} by {{ $val->user['username'] }}</em></p>
    <p>{{ nl2br(esc($val['data'])) }}</p>
        @if(Auth::check())
            <p class='smaller-text silent'><a href="<?= url('/content/edit') . '/' . $val['id']; ?>">edit</a></p>
        @endif
	</div>
	</div>
	<br />
    @endforeach
@else
    <p>No posts exists.</p>
@endif
@endsection