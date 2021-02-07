@extends('layouts.home')

@section('title',$data->title)
@section('keywords',$data->keywords)
@section('description',$data->description)
@section('menu')
    @include('home._menu')
@endsection

@section('content')
    <div class="wrapper row3">
        <div class="gezinme" style="width:100%;height:50px;">
            <ul style="list-style: none;">
                <li><a href="/">Anasayfa</a>&nbsp;/</li>
                <li><a href="/">
                    &nbsp; {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($data->category,$data->category->title) }}
                    </a>
                </li>
                <li class="active">
                    &nbsp;/ {{$data->title}}//sql migration!!
                </li>
            </ul>
        </div>
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content three_quarter first">
            <!-- ################################################################################################ -->
            <h1>{{$data->title}}</h1>
            <img  src="{{ Storage::url($data->image) }}" alt="{{$data->title}}">
            <div class="scrollable">
                {!! $data->detail !!}
            </div>
            <div id="comments">
                <h2>Yorumlar</h2>
                <ul style="overflow-y: scroll;height: 300px;">
                    @if($review->count()==0)
                        Yorum Yapılmamıştır.
                        @endif
                    @foreach($review as $rw)
                    <li>
                        <article>
                            <header>
                                <address>
                                    Yazar <a href="#">{{ $rw->user->name }}</a>
                                </address>
                                <time datetime="{{$rw->created_at}}"> {{$rw->created_at}}</time>
                            </header>
                            <div class="comcont">
                                <p>{{ $rw->review }}</p>
                            </div>
                        </article>
                    </li>
                    @endforeach
                </ul>
                <div class="col-lg-6">
                    <h4>Yorum Yap</h4>
                    <!-- review form -->
                    @livewire('review',['id'=>$data->id])
                </div>
                <div id="gallery">
                    <figure>
                        <header class="heading">Resim Galerisi</header>
                            @foreach($galery as $gl)
                            <img style="float: left;margin:10px;width:300px;height:180px;" src="{{Storage::url($gl->image)}}" alt="">
                            @endforeach
                    </figure>
                </div>
            </div>
            <!-- ################################################################################################ -->
        </div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->

    </main>
</div>
@endsection
