<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon"><img class="img-fluid" src="{{asset('assets/img/logo.png')}}"></div>
            <div class="sidebar-brand-text mx-3"><span>Water Refill</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        @if(\Illuminate\Support\Facades\Auth::user()->isRoot())
            @include('nav.menu.root')
        @elseif(\Illuminate\Support\Facades\Auth::user()->isAdmin())
            @include('nav.menu.admin')
        @else
            @include('nav.menu.bureau')
        @endif
    </div>
</nav>