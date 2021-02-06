@extends("layouts.admin")
@section('title','Admin faq')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Ana Sayfa</a>
                <a href="{{ route("admin_faq")}}" class="current">Sıkça Sorulan Sorular</a> </div>
            <h1>SSS Ekle</h1>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>SSS-Bilgileri</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" action="{{ route("admin_faq_update",['id'=>$data->id]) }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label">Soru</label>
                                    <div class="controls">
                                        <input value="{{ $data->question }}" required type="text" name="question" class="span11" placeholder="Question" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Cevap</label>
                                    <div class="controls">
                                        <input required value="{{ $data->answer }}" type="text" name="answer" class="span11" placeholder="Answer" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Sıra</label>
                                    <div class="controls">
                                        <input required value="{{ $data->position }}" type="number" name="position" class="span11" placeholder="Position"  />
                                    </div>
                                </div>
                                <div class="control-group" >
                                    <label class="control-label">Durum</label>
                                    <div class="controls">
                                        <select name="status" >
                                            <option value="True">True</option>
                                            <option value="False">False</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">SSS Güncelle</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
@section("css_end")
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/colorpicker.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/datepicker.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/uniform.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/select2.css" />
@endsection
@section("js_end")
    <script src="{{ asset("assets/admin")}}/js/bootstrap-colorpicker.js"></script>
    <script src="{{ asset("assets/admin")}}/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.toggle.buttons.js"></script>
    <script src="{{ asset("assets/admin")}}/js/masked.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.uniform.js"></script>
    <script src="{{ asset("assets/admin")}}/js/select2.min.js"></script>
    <script src="{{ asset("assets/admin")}}/js/matrix.js"></script>
    <script src="{{ asset("assets/admin")}}/js/matrix.form_common.js"></script>
    <script src="{{ asset("assets/admin")}}/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.peity.min.js"></script>
    <script src="{{ asset("assets/admin")}}/js/bootstrap-wysihtml5.js"></script>
@endsection
