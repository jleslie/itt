@if(session('success'))
    <div class="success-message">{{ session('success') }}</div>
@endif

@if(session('fail'))
    <div class="fail-message">{{ session('fail') }}</div>
@endif