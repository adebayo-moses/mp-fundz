<header>
    @include('includes.adsense1')
    <div class="top_bar">
        <div class="container">
            <div class="top_header_content d-flex justify-content-between">
                <div class="menu_logo">
                    <a href="{{url('/')}}" title="" class="logo">
                        <img src="{{asset('assets/images/logo.png')}}" alt="MP Funds Logo" />
                    </a>
                </div><!--menu_logo end-->
                @guest
                    <ul class="controls-lv">
                        <li><a href="{{url('/')}}" title="">Home</a></li>
                        <li><a href="#" title="">About us</a></li>
                        <li><a href="#" title="">How it works</a></li>
                        <li><a href="Single_Channel_Home.html" title="">Contact</a></li>
                        <li class="icon-menu-log d-flex d-sm-none mr-0">
                            <a href="#" title="" class="menu" style="font-size: 23px">
								<i class="icon-menu"></i>
							</a>
                        </li>
                        <li class="ml-5 d-none d-sm-inline-block">
                            <a href="{{route('login')}}" title="" class="btn-default btn-transparent">Login</a>
                        </li>
                        <li class="d-none d-sm-inline-block">
                            <a href="{{route('register')}}" title="" class="btn-default">Register</a>
                        </li>
                    </ul><!--controls-lv end-->
                @else
                    <div class="search_form align-self-center">
                        <form>
                            <input type="text" name="search" placeholder="Search Videos">
                            <button type="submit">
                                <i class="icon-search"></i>
                            </button>
                        </form>
                    </div><!--search_form end-->
                    <ul class="controls-lv">
                        <li class="coins">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="You currently have {{'$' . (Auth::user()->amount_in_dollars)}}" class="d-flex align-items-center"><svg width="15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="coins" class="svg-inline--fa fa-coins mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M0 405.3V448c0 35.3 86 64 192 64s192-28.7 192-64v-42.7C342.7 434.4 267.2 448 192 448S41.3 434.4 0 405.3zM320 128c106 0 192-28.7 192-64S426 0 320 0 128 28.7 128 64s86 64 192 64zM0 300.4V352c0 35.3 86 64 192 64s192-28.7 192-64v-51.6c-41.3 34-116.9 51.6-192 51.6S41.3 334.4 0 300.4zm416 11c57.3-11.1 96-31.7 96-55.4v-42.7c-23.2 16.4-57.3 27.6-96 34.5v63.6zM192 160C86 160 0 195.8 0 240s86 80 192 80 192-35.8 192-80-86-80-192-80zm219.3 56.3c60-10.8 100.7-32 100.7-56.3v-42.7c-35.5 25.1-96.5 38.6-160.7 41.8 29.5 14.3 51.2 33.5 60 57.2z"></path></svg>
                                <span>{{Auth::user()->coin_balance}}</span>
                            </a>
                            <span style="font-size: 12px;">100 coins = $1</span>
                        </li>
                        <li class="user-log pr-md-4">
                            <div class="user-ac-img">
                                <img src="{{asset('assets/images/resources/user-img.png')}}" alt="">
                            </div>
                            {{-- Kunle --}}
                            <div class="account-menu">
                                <h4>Membership<span class="usr-status">{{Auth::user()->user_type}}</span></h4>
                                <div class="sd_menu">
                                    <ul class="mm_menu">
                                        <li>
                                            <span>
                                                <i class="icon-user"></i>
                                            </span>
                                            <a href="{{route('user.profile')}}" title="">Profile</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="icon-paid_sub"></i>
                                            </span>
                                            <a href="{{route('user.refferal')}}" title="">Refferals</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class=" icon-add_to_playlist"></i>
                                            </span>
                                            <a href="{{route('user.account.add')}}">Add Account</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="icon-paid_sub"></i>
                                            </span>
                                            <a href="{{route('join_contest')}}">Join Contest</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="icon-paid_sub"></i>
                                            </span>
                                            <a href="{{route('user.account.withdraw')}}" title="">Withdraw Money</a>
                                        </li>
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
                            </div>
                        </li>
                        <li>
                            <a href="{{route('join_contest')}}" class="btn-default">Join Contest</a>
                        </li>
                        <li class="icon-menu-log">
                            <a href="#" title="" class="menu">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul><!--controls-lv end-->
                @endguest
            </div><!--top_header_content end-->
        </div>
    </div><!--header_content end-->

    @yield('contest')
</header><!--header end-->
