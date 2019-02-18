<div id='outer-wrap-header'>
  <div id='inner-wrap-header'>
    <div id='header'>
      @include('inc.loginMenu')
      <div id='banner'>
        <a href='{{url("/")}}'><img id='site-logo' src='{{ asset("/img/logo_80x80.png") }}' alt='logo' width='80' height='80' /></a>
        <span id='site-title'><a href='{{url("/")}'>Jouper</a></span>
        <span id='site-slogan'>A PHP-based MVC-inspired CMF</span>
      </div>
      @include('inc.navbar')
    </div>
  </div>
</div>
