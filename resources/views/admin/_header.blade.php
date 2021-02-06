<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">Master Admin</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav" style="float: right;">
        @auth()
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">{{Auth::user()->name}}</span><b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li class="divider"></li>
                <li><a href="{{route("logout")}}"><i class="icon-key"></i> Çıkış Yap</a></li>

            </ul>
        </li>
        @endauth
        </ul>
</div>

