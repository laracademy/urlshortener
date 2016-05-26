<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">AppName</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Link <span class="sr-only">(current)</span></a></li>
            </ul>


          @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li><p class="navbar-text">Welcome back {{ Auth::user()->email }}</p></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('administration.authentication.logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        @endif
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>