@php
$parentCategories=\App\Http\Controllers\HomeController::categorylist();

@endphp
<div class="wrapper row1">
    <section class="hoc clear">
        <!-- ################################################################################################ -->
        <nav id="mainav">
            <ul class="clear">
                <li><a href="/">Anasayfa</a></li>
                @foreach($parentCategories as $rs)
                @if(count($rs->children))
                        <li><a class="drop" href="#" onclick="return false;">{{ $rs->title }}</a>
                        @include("home.categoryTree",[
                                'children'=>$rs->children
                            ])

                        </li>
                    @else
                    <li><a href="{{ route("category",['id'=>$rs->id,'slug'=>$rs->slug]) }}">{{ $rs->title }}</a></li>
                    @endif
                @endforeach
                <li><a class="drop" href="#" onclick="return false;">Kurumsal</a>
                <ul>
                <li><a href="/contact">İletişim</a></li>
                <li><a href="/aboutus">Hakkımızda</a></li>
                <li><a href="/referance">Referanslar</a></li>
                <li><a href="/faq">SSS</a></li>
                </ul>
                </li>
                @auth
                <li><a class="drop" href="#" onclick="return false;"
                       >
                        &nbsp;<i class="fa fa-user"></i>&nbsp;{{Auth::user()->name}}&nbsp;&nbsp;</a>
                    <ul>
                        <li><a href="{{route("userprofile")}}">Profilim</a></li>
                        <li><a href="{{route("user_content")}}">İçeriklerim</a></li>
                        <li><a href="{{route("myreview")}}">Yorumlarım</a></li>
                        <li><a href="/logout">Çıkış</a></li>
                    </ul>
                </li>
                @endauth
                @guest
                <li><a href="/login" style="color: #1a202c;font:bold 15px verdana;">Giriş</a></li>
                <li><a href="/register"style="color: #1a202c;font:bold 15px verdana;">Kayıt</a></li>
                @endguest
            </ul>
        </nav>
        <!-- ################################################################################################ -->
        <div style="margin-top: 20px;float: right;width: 250px;">
            <div>
                <form action="{{ route('getproduct') }}" method="post">
                    @csrf
                    @livewire('search')
                    <button type="submit" style="background-color: #1a202c"><span class="fa fa-search"></span></button>
                </form>
                @livewireScripts
            </div>

        </div>
        <!-- ################################################################################################ -->
    </section>
</div>
