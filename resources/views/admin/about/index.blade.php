
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About Us Page Content</h1>
                </div>
                <div class="col-sm-6"></div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route("admin.update_about_page") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">History Title</label>
                                <input class="form-control" type="text" id="history-headertitle" name="history-headertitle" value="{{$aboutinfo->company_history_title}}">
                            </div>
                            <div class="form-group">
                                <label for="">History Description</label>
                                <textarea class="form-control" rows="3" type="search" id="history-description" name="history-description">{{$aboutinfo->compnay_history_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Heading</label>
                                <input class="form-control" type="text" id="headertitle" name="headertitle" value="{{$aboutinfo->heading}}">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" rows="3" type="search" id="description" name="description">{{$aboutinfo->description}}</textarea>
                            </div>
                            <small><b>( Note: Images size should in the limit,Otherwise picture won't be uploaded )</b></small>
                            <div class="form-group">
                                <input type="file" id="aboutimage" name="aboutimage">
                            </div>
                            <div class="img-box">
                                <img class="img-thumbnail" src="{{   asset("storage/".$aboutinfo->about_img) }}" id="blah">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Heading for Background</label>
                                <input class="form-control" type="text" id="headerbg" name="headerbg" value="{{$aboutinfo->headline_bg}}">
                            </div>
                            <div class="form-group">
                                <label for="">Description for Background</label>
                                <textarea id="my-input" name="descbg" class="form-control" rows="3">{{$aboutinfo->description_bg}}</textarea>
                            </div>
                            <small><b>( Note: Images size should in the limit,Otherwise picture won't be uploaded )</b></small>
                            <div class="form-group">
                                <label for="">Embaded youtube video Link</label>
                                <input class="form-control" type="text" id="youtubelink" name="youtubelink" value="{{$aboutinfo->youtubelink}}">
                            </div>
                            <div class="form-group">
                                <input type="file" id="bgimgfile" name="bgimgfile">
                            </div>
                            <div class="img-box">
                                <img class="img-thumbnail" src="{{  asset("storage/".$aboutinfo->image_bg) }}" id="blah">
                            </div>
                        </div>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-sm project-btn btn-primary" type="submit">Save Changes</button>
                    </div>
                </form>
                <div class="card-footer clearfix">
                    <div class="float-right"></div>
                </div>
            </div>
        </div>
    </div>

@endsection


 
