
<nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
           {{trans('sentence.Home')}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('auth.register')}}"> {{ trans('sentence.Register')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('auth.login')}}"> {{ trans('sentence.Login')}}  </a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#"> {{ Auth::user()->role}} : {{ Auth::user()->name}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('auth.logout')}}"> {{ trans('sentence.Logout')}}  </a>
                    </li>

                @endauth
                @php $locale = session()->get('locale'); @endphp
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ trans('sentence.Language')}}  <span class="caret"></span>
                    </a>
                    @switch($locale)

                        @case('ar')
                        <img src="{{asset('img/arabic.jpg')}}" width="30px" height="20x"> Arabic
                        @break
                        @case('en')
                        <img src="{{asset('img/english.jpg')}}" width="30px" height="20x"> English
                        @break
                        @default
                        <img src="{{asset('img/english.jpg')}}" width="30px" height="20x"> English
                    @endswitch
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="lang/en"><img src="{{asset('img/english.jpg')}}" width="30px" height="20x"> English</a>
                        <a class="dropdown-item" href="lang/ar"><img src="{{asset('img/arabic.jpg')}}" width="30px" height="20x"> Arabic</a>
                        {{--  <a class="dropdown-item" href="lang/fr"><img src="{{asset('img/frensh.png')}}" width="30px" height="20x"> French</a>
                        <a class="dropdown-item" href="lang/es"><img src="{{asset('img/spanish.png')}}" width="30px" height="20x"> Spanish</a>
                        <a class="dropdown-item" href="lang/jp"><img src="{{asset('img/japan.jpg')}}" width="30px" height="20x"> Japanese</a>  --}}
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>
