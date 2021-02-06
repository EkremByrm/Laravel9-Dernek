@extends("layouts.admin")
@section('title','Admin FAQ')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Ana Sayfa</a>
                <a href="{{ route("admin_faq")}}" class="current">Sıkça Sorulan Sorular</a> </div>
            <h1>Sıkça Sorulan Sorular</h1>

            @include("home.message")
        </div>

        <div class="container-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>SSS Listesi</h5>
                    <a class="btn btn-inverse " href="{{route("admin_faq_create")}}" style="margin:5px;">SSS Ekle</a>

                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Soru</th>
                            <th>Cevap</th>
                            <th>Sıra</th>
                            <th>Durum</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($datalist as $rs)
                            <tr class="gradeX">
                                <td>{{$rs->id}}</td>
                                <td>{{$rs->question}}</td>
                                <td>{{$rs->answer}}</td>
                                <td>{{$rs->position}}</td>
                                <td>{{$rs->status}}</td>
                                <td style="width:100px;">
                                    <a href="{{ route("admin_faq_edit",['id'=>$rs->id]) }}" class="btn btn-primary btn-mini">Düzenle</a>
                                    <a href="{{ route("admin_faq_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger btn-mini" style="float: right;">Sil</a>
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
