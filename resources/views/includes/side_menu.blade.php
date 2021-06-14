<div class="side_menu">
    @guest
        <div class="form_dvv">
            <a href="{{route('login')}}" title="" class="login_form_show">Sign in</a>
        </div>

        <div class="sd_menu">
            <ul class="mm_menu">
                <li>
                    <a class="pl-0" href="{{url('/')}}" title="">Home</a>
                </li>
                <li>
                    <a class="pl-0" href="#" title="">About Us</a>
                </li>
                <li>
                    <a class="pl-0" href="#" title="">How it works</a>
                </li>
                <li>
                    <a class="pl-0" href="#" title="">Contact Us</a>
                </li>
                <li>
                    <a class="pl-0" href="{{route('register')}}" title="">Sign up</a>
                </li>
            </ul>
        </div>
    @else
        <div class="sd_menu">
            <ul class="mm_menu">
                <li>
                    <span>
                        <i class="icon-home"></i>
                    </span>
                    <a href="{{route('home')}}" title="">Dashboard</a>
                </li>
                <li>
                    <span>
                        <i class="icon-fire"></i>
                    </span>
                    <a href="{{route('home')}}" title="">New Videos</a>
                </li>
            </ul>
        </div><!--sd_menu end-->
        <div class="sd_menu">
            <h3>Library</h3>
            <ul class="mm_menu">
                <li>
                    <span>
                        <i class="icon-history"></i>
                    </span>
                    <a href="{{ route('user.watch_history') }}" title="Watch history">Watch History</a>
                </li>
                <li>
                    <span>
                        <i class="icon-watch_later"></i>
                    </span>
                    <a href="#" title="">Watch Later</a>
                </li>
            </ul>
        </div><!--sd_menu end-->
        <div class="sd_menu">
            <ul class="mm_menu">
                {{-- <li>
                    <span>
                        <i class="icon-settings"></i>
                    </span>
                    <a href="#" title="">Settings</a>
                </li> --}}
                <li>
                    <span>
                        <i class="icon-logout"></i>
                    </span>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Sign out') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div><!--sd_menu end-->
    @endguest
</div><!--side_menu end-->
