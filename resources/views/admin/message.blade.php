@extends("layouts.admin")
@section('title','Admin Message')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Ana Sayfa</a>
                <a href="{{ route("admin_message")}}" class="current">İletişim Mesajları</a> </div>
            <h1>İletişim Formu Mesajları</h1>
        </div>

        <div class="container-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Mesaj Listesi</h5>
                     </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>İsim</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Mesaj</th>
                            <th>Yönetici Notu</th>
                            <th>Durum</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($datalist as $rs)
                            <tr class="gradeX">
                                <td>{{$rs->id}}</td>
                                <td>{{$rs->name}}</td>
                                <td>{{$rs->phone}}</td>
                                <td>{{$rs->email}}</td>
                                <td>{{$rs->message}}</td>
                                <td>{{$rs->note}}</td>
                                <td>{{$rs->status}}</td>
                                <td style="width:100px;">
                                    <a href="{{ route("admin_message_edit",['id'=>$rs->id]) }}"
                                       onclick=" return  !window.open(this.href,'targetWindow',
                                               'toolbar=no,location=center,status=no,menubar=no,scrollbars=yes,' +
                                                'resizable=no,width=600,height=500,top=100px,left=100px')" class="btn btn-primary btn-mini">Düzenle</a>
                                    <a href="{{ route("admin_message_destroy",['id'=>$rs->id]) }}" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger btn-mini" style="float: right;">Sil</a>
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
