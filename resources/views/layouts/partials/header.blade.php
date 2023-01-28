<header>
    <h1>CRUD Users to Generate CURP</h1>
    <!-- nav -->
    <nav>
        <li>
            <a href="{{route('users.index')}}" class="{{request()->routeIs('users.*')?'active':''}}">Users</a>
            {{-- @dump(request()->routeIs('users.*')) --}}
            
        </li>
        <li>
            <a href="{{route('users.create')}}" class="{{request()->routeIs('users.*')?'active':''}}">Create New User</a>
            {{-- @dump(request()->routeIs('users.*')) --}}
        </li>
    </nav>
    </header>