<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
  @include('head')
  @yield('title')
</head>

<body>
<div id="wrapper">


<div class="jumbotron jumbotron-fluid mb-0">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <a class="" href="/top"><img src="{{ asset('/img/Jumbotron.png') }}" class="img-fluid" alt="Jumbotron-title"></a>
      </div>
    </div>
    <div class="row mt-3">
      <p class="lead">水泳大会の運営を行うアプリ</p>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 sticky-top">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- この下の行に mr-auto クラスを付与するだけ -->
      <ul class="navbar-nav mr-auto">　
        <li class="nav-item"><a class="nav-link @if(Request::is('top')) active @endif" href="/top">TOP</a></li>
        <li class="nav-item"><a class="nav-link @if(Request::is('info')) active @endif" href="/info">大会情報</a></li>
        <li class="nav-item"><a class="nav-link @if(Request::routeIs('Events')) active @endif" href="{{ route('Events') }}">種目一覧</a></li>
        <li class="nav-item"><a class="nav-link @if(Request::routeIs('InquiryForm')) active @endif" href="{{ route('InquiryForm') }}">お問い合わせ</a></li>
        @auth
          @php $user = Auth::user(); @endphp
        <li class="nav-item"><a class="nav-link @if(Request::is('users/mypage*')) active @endif" href="{{ route('Mypage') }}">マイページ</a></li>
        <li class="nav-item"><a class="nav-link @if(Request::routeIs('Entries')) active @endif" href="{{ route('Entries') }}">エントリー</a></li>
          @if ($user->admin == 1)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle @if(Request::is('admin/*')) active @endif"
              href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">管理者機能</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('PlayersList') }}">選手一覧</a>
              <a class="dropdown-item" href="{{ route('Hole') }}">レース全体情報</a>
              <a class="dropdown-item" href="{{ route('MakeEventForm') }}">種目登録</a>
            </div>
          </li>
          @endif
        @endauth
      </ul>

      <ul class="navbar-nav">
        @auth
        <li class="nav-item"><a class="nav-link disabled" href="#">ようこそ, {{ $user->name }}さん</a></li>
        <li class="nav-item"><a class="nav-link disabled" href="#">|</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('MyLogout') }}">{{ __('Logout') }}</a></li>
        @endauth
        @guest
        <li class="nav-item"><a class="nav-link  @if(Request::routeIs('login')) active @endif" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li class="nav-item"><a class="nav-link  disabled" href="#">|</a></li>
        <li class="nav-item"><a class="nav-link  @if(Request::routeIs('register')) active @endif" href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @endguest
      </ul>

    </div>
  </div>
</nav>

<main>
  <div class="container">
    @if(session('message'))
    <div class="row">
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        {{@session('message')}}
      </div>
    </div>
    @endif

    <div class="row justify-content-center">
      <div class="col-12 col-md-9">
        <div class="card">
          @yield('content')
        </div>
      </div>
      @yield('sidebar')
    </div>
  </div>

</main>


<footer class="bg-dark text-white">
  © Copyright 2020-07 Masaki Ito
</footer>


</div>
@yield('scripts')
</body>

</html>
