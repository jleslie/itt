<div id='navbar'>
    <ul class="menu my-navbar">
        <li><a href="/">About Me</a></li>
        <li><a href="/blog">My Blog</a></li>
        @if(Auth::check())
            <li><a href="/content">Content</a></li>
        @endif
    </ul>
</div>
