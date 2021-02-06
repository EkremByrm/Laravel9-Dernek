@extends("layouts.admin")
@section('title','Admin Content')
@section("js")
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
@endsection
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Ana Sayfa</a>
                <a href="{{ route("admin_setting")}}" class="current">Site Ayarları</a> </div>
            <h1>Site Ayarları</h1>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" action="{{ route('admin_setting_update',['id'=>$data->id]) }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="widget-box">
                                    <div class="widget-title">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#General">Genel</a></li>
                                            <li><a data-toggle="tab" href="#Smtp">Smtp</a></li>
                                            <li><a data-toggle="tab" href="#Social">Sosyal Medya</a></li>
                                            <li><a data-toggle="tab" href="#Aboutus">Hakkımzıda</a></li>
                                            <li><a data-toggle="tab" href="#Contact">İletişim</a></li>
                                            <li><a data-toggle="tab" href="#Referance">Referanslar</a></li>
                                        </ul>
                                    </div>
                                    <div class="widget-content tab-content">
                                        <div id="General" class="tab-pane active">
                                            <div class="control-group">
                                                <label class="control-label">Başlık</label>
                                                <div class="controls">
                                                    <input value="{{$data->title}}" required type="text" name="title" class="span11" placeholder="Başlık" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Keywords</label>
                                                <div class="controls">
                                                    <input value="{{$data->keywords}}" type="text" name="keywords" class="span11" placeholder="Keywords" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Description</label>
                                                <div class="controls">
                                                    <input value="{{$data->description}}" type="text" name="description" class="span11" placeholder="Description"  />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Şirket</label>
                                                <div class="controls">
                                                    <input value="{{$data->company}}" type="text" name="company" class="span11" placeholder="Şirket"  />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Adress</label>
                                                <div class="controls">
                                                    <input value="{{$data->adress}}" type="text" name="adress" class="span11" placeholder="adress"  />
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label for="normal" class="control-label">Telefon</label>
                                                <div class="controls">
                                                    <input value="{{$data->phone}}" name="phone" type="text" id="mask-phone" class="span8 mask text" placeholder="Telefon">
                                                    <span class="help-block blue span8">(999) 999-9999</span> </div>
                                            </div>
                                            <div class="control-group">
                                                <label for="normal" class="control-label">Faks</label>
                                                <div class="controls">
                                                    <input value="{{$data->fax}}" name="fax" type="text" id="mask-phone" class="span8 mask text" placeholder="Faks">
                                                    <span class="help-block blue span8">(999) 999-9999</span> </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Email</label>
                                                <div class="controls">
                                                    <input value="{{$data->email}}" type="email" name="email" class="span11" placeholder="Email"  />
                                                </div>
                                            </div>
                                            <div class="control-group" >
                                                <label class="control-label">Durum</label>
                                                <div class="controls">
                                                    <select name="status" >
                                                        <option value="True">True</option>
                                                        @if($data->status=="False")
                                                            <option selected value="False">False</option>
                                                        @else
                                                            <option value="False">False</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Smtp" class="tab-pane">
                                            <div class="control-group">
                                                <label class="control-label">Smtpserver</label>
                                                <div class="controls">
                                                    <input value="{{$data->smtpserver}}" type="text" name="smtpserver" class="span11" placeholder="Smtpserver"  />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Smtpemail</label>
                                                <div class="controls">
                                                    <input value="{{$data->smtpemail}}" type="email" name="smtpemail" class="span11" placeholder="Smtpemail"  />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Smtppassword</label>
                                                <div class="controls">
                                                    <input value="{{$data->smtpspassword}}" type="password" name="smtpspassword" class="span11" placeholder="Smtppassword"  />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Smtpport</label>
                                                <div class="controls">
                                                    <input value="{{$data->smtpport}}" type="number" name="smtpport" class="span11" placeholder="Smtpport"  />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Social" class="tab-pane">
                                            <div class="control-group">
                                                <label class="control-label">Facebook</label>
                                                <div class="controls">
                                                    <input value="{{$data->facebook}}" required type="text" name="facebook" class="span11" placeholder="Facebook" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Twitter</label>
                                                <div class="controls">
                                                    <input value="{{$data->twitter}}" required type="text" name="twitter" class="span11" placeholder="Twitter" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Instagram</label>
                                                <div class="controls">
                                                    <input value="{{$data->instagram}}" required type="text" name="instagram" class="span11" placeholder="Instagram" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Youtube</label>
                                                <div class="controls">
                                                    <input value="{{$data->youtube}}" required type="text" name="youtube" class="span11" placeholder="Youtube" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Aboutus" class="tab-pane">
                                            <div class="control-group">
                                                <label class="control-label">Hakkımızda</label>
                                                <div class="controls">
                                    <textarea  class="span11"name="aboutus" >
                                        {{ $data->aboutus }}
                                    </textarea>
                                                    <script>
                                                        CKEDITOR.replace( 'aboutus' );
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="Contact" class="tab-pane">
                                            <div class="control-group">
                                                <label class="control-label">İletişim</label>
                                                <div class="controls">
                                    <textarea  class="span11"name="contact" >
                                        {{ $data->contact }}
                                    </textarea>
                                                    <script>
                                                        CKEDITOR.replace( 'contact' );
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                            <div id="Referance" class="tab-pane">
                                            <div class="control-group">
                                                <label class="control-label">Referanslar</label>
                                                <div class="controls">
                                    <textarea  class="span11"name="referances" >
                                        {{ $data->referances }}
                                    </textarea>
                                                    <script>
                                                        CKEDITOR.replace( 'referances' );
                                                    </script>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>




                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Güncelle</button>
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
