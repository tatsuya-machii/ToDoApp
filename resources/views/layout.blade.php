<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('styles')
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>ToDo App</title>
  </head>

  <body>
    <header>
      <nav class="my-navbar">
        <a class="my-navbar-brand" href="/">ToDo App</a>
        <div class="flex">
          @if (Route::has('login'))

            @auth
              <span class="my-navbar-item">ようこそ、{{Auth::user()->name}}さん</span>
              <a href="javascript:logout.submit()" class="my-navbar-item">
              <a href="javascript:logout.submit()" class="my-navbar-item">
                <form name="logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                        {{ __('Logout') }}
                    </a>

                </form>

            @else
                <a href="{{ route('login') }}" class="my-navbar-item">ログイン</a>

                <a href="{{ route('register') }}" class="my-navbar-item">会員登録</a>

                <!-- @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif -->
            @endif

          @endif
        </div>
      </nav>

    </header>

    <main>
      @yield('content')
    </main>
    @yield('scripts')
  </body>

</html>
