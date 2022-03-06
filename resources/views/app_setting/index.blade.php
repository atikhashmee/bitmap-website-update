
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact Us</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route("update_setting_page") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="example-text-input" class="col-form-label">Site Title</label>
                              <input class="form-control" type="text"  id="sitetitle" name="sitetitle" value="{{ $settinginfo->title}}">
                          </div>
                          <div class="form-group">
                            <label for="">Short description</label>
                            <textarea name="shortdes" class="form-control" id="shortdes">{{ $settinginfo->short_description}}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="adrs" class="form-control" id="adrs" >{{ $settinginfo->address}}</textarea>
                          </div>
                          <div class="form-group">
                              <label for="example-search-input" class="col-form-label">Phone</label>
                              <input class="form-control" type="text" value="{{ $settinginfo->phone}}" id="phone" name="phone">
                          </div> 
                          <div class="form-group">
                              <label for="example-email-input" class="col-form-label">Email</label>
                              <input class="form-control" type="email"  id="email" name="email" value="{{ $settinginfo->email}}">
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-fblink-input" class="col-form-label">Facebook</label>
                          <div class="row">
                            <input type="text" class="form-control col-md-6 text-right" readonly value="https://www.facebook.com/">
                            <input class="form-control col-md-6" type="text" value="{{ $settinginfo->facebook}}" id="fblink" name="fblink">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="example-fblink-input" class="col-form-label">Twitter</label>
                          <div class="row">
                              <input type="text" class="form-control col-md-6 text-right" readonly value="https://twitter.com/">
                              <input class="form-control col-md-6" type="text" value="{{ $settinginfo->twitter}}" id="twitterlink" name="twitterlink">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="example-fblink-input" class="col-form-label">Instragram</label>
                          <div class="row">
                            <input type="text" class="form-control col-md-6 text-right" readonly value="https://www.linkedin.com/company/">
                            <input class="form-control col-md-6" type="text" value="{{ $settinginfo->instagram}}" id="instlink" name="instlink">
                          </div>
                        </div>
                        <div class="form-group">
                            <input type="file"  id="logofile" name="logofile">
                            <label  for="logofile">Choose Logo</label>
                            <div class="img-container">
                              <img src=" {{ asset("storage/".$settinginfo->logo) }}" id="output" />
                            </div>
                        </div>
                        <div class="form-group">
                          <input type="file"  id="feviconfile" name="feviconfile">
                          <label for="feviconfile">Choose Fevicon</label>
                          <div class="img-container">
                            <img src=" {{ asset("storage/".$settinginfo->fevicon)}} " class='img-thumbnail' />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                  </form>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


 
