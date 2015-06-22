<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">#darkshare</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('snippets.create') }}">Snippets</a></li>
                <li><a href="{{ route('files.create') }}">Files</a></li>
                <li><a href="{{ route('urls.create') }}">URLs</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if ( ! $currentUser)
                    <li><a href="{{ route('auth.login') }}">Login</a></li>
                    <li><a href="{{ route('auth.register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $currentUser->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('users.snippets') }}">Snippets</a></li>
                            <li><a href="{{ route('users.files') }}">Files</a></li>
                            <li><a href="{{ route('users.urls') }}">Urls</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
