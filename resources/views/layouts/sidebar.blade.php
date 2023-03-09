<div class='sidebar'>
    <a class="homelink" href=" {{ url('/') }} "><img src='https://cdn-icons-png.flaticon.com/512/25/25694.png'></a>

    <h2>Links</h2>
    <ul>
        <li><a href=" {{ url('/sudoku') }} ">Play Sudoku</a></li>
        <li><a href=" {{ url('/assessment') }} ">Do an assessment</a></li>
    </ul>

    <div class="session-status-sidebar">
        @if (Auth::check())
            @php 
                $username = Auth::user()->username;
            @endphp
            Logged in as {{ $username }}

            <br>
            <a href= "{{ url('/logout') }}">Logout</a>
        @else
            Not logged in
            <br>
            <a href="{{ url('/login') }}">Login here</a>
        @endif
        <br>
        
        
    </div>
</div>