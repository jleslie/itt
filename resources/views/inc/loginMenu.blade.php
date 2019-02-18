<div id="login-menu">
    <nav>
        @if(Auth::check())
            {{ Auth::user()->username }} 
            <a href='{{ url("/logout") }}'>Logout</a>
        @else
            <a href='{{ url("/login") }}'>Login</a> | 
            <a href='{{ url("/register") }}'>Register</a>
        @endif
    </nav>
</div>
