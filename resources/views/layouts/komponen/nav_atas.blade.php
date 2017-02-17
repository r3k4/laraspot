<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa fa-cloud"></i> {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">


            @if(auth()->check())
               <li @if(isset($backend_home)) class="active" @endif>
                    <a href="{{ route('backend.home.index') }}">
                        <i class="fa fa-home"></i> Home
                    </a>
               </li>


               @if(auth()->user()->ref_user_level_id == 1)
                   <li @if(isset($backend_hotspot_users_home)) class="active" @endif>
                        <a href="{{ route('backend.hotspot_users.index') }}">
                            <i class="fa fa-users"></i> Hotspot Users
                        </a>
                   </li>

                   <li @if(isset($backend_user_aktif_home)) class="active" @endif>
                        <a href="{{ route('backend.user_aktif.index') }}">
                            <i class="fa fa-check-circle"></i> User Aktif
                        </a>
                   </li>




                   <li @if(isset($backend_hotspot_profile_home)) class="active" @endif>
                        <a href="{{ route('backend.hotspot_profile.index') }}">
                            <i class="fa fa-list"></i> Hotspot Profiles
                        </a>
                   </li>

     
                   <li @if(isset($backend_passport_home)) class="active" @endif>
                        <a href="{{ route('backend.passport.index') }}">
                            <i class="fa fa-cubes"></i> Passport
                        </a>
                   </li>

                   <li @if(isset($backend_nas_home)) class="active" @endif>
                        <a href="{{ route('backend.nas.index') }}">
                            <i class="fa fa-server"></i> NAS Device
                        </a>
                   </li>


                   <li @if(isset($backend_statistik_home)) class="active" @endif>
                        <a href="{{ route('backend.statistik.index') }}">
                            <i class="fa fa-bar-chart"></i> Statistik
                        </a>
                   </li>
                @endif

            @endif

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @else
                    <li class="dropdown   

                     @if(isset($backend_profile_home) ||
                         isset($backend_usages_home)
                     )  active   @endif
                    ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                           <li @if(isset($backend_profile_home)) class="active"  @endif>
                                <a href="{{ route('backend.profile.index') }}">
                                    <i class="fa fa-cog"></i> My Config
                                </a>
                           </li>


                           <li @if(isset($backend_usages_home)) class="active" @endif>
                                <a href="{{ route('backend.usages.index') }}">
                                    <i class="fa fa-database"></i> Usages
                                </a>
                           </li>

                        
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>