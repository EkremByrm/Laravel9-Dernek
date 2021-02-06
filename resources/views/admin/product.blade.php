@extends("layouts.admin")
@section('title','Admin Content')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Ana Sayfa</a>
                <a href="{{ route("admin_product")}}" class="current">İçerikler</a> </div>
            <h1>İçerik Yönetimi</h1>
        </div>
        <div class="container-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>İçerik Listesi</h5>

                    <a class="btn btn-inverse " href="{{route("admin_product_create")}}" style="margin:5px;">İçerik Ekle</a>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ekleyen Üye</th>
                            <th>Kategori</th>
                            <th>Başlık</th>
                            <th>Resim</th>
                            <th>Galeri</th>
                            <th>Durum</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($datalist as $rs)
                            <tr class="gradeX">
                                <td>{{$rs->id}}</td>
                                <td><a href="{{ route("admin_user_show",['id'=>$rs->user->id]) }}"
                                       onclick=" return  !window.open(this.href,'targetWindow',
                                               'toolbar=no,location=center,status=no,menubar=no,scrollbars=yes,' +
                                                'resizable=no,width=600,height=500,top=100px,left=100px')"
                                    >{{$rs->user->name}}</a></td>
                                <td>{{$rs->category->title}}</td>
                                <td>{{$rs->title}}</td>
                                <td align="center" style="text-align: center;"><img src="{{Storage::url($rs->image) }}" width="150px" height="120px"></td>
                                <td style="width:55px; "><a href="{{ route('admin_product_image',['id'=>$rs->id]) }}"><img src="/assets/galery.png" width="50px" height="50px"></a></td>
                                <td>{{$rs->status}}</td>
                                <td style="width:100px;">
                                    <a href="{{ route("admin_product_edit",['id'=>$rs->id]) }}" class="btn btn-primary btn-mini">Düzenle</a>
                                    <a href="{{ route("admin_product_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger btn-mini" style="float: right;">Sil</a>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection
