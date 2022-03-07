
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
            <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Home Style 2</h5>
                      <img src="{{asset("storage/home_styles/1.png")}}" class="img-thumbnail" width="100%" height="300px" />
                      @if ($homestyles->id == 2)
                        <div class="overlay"></div>
                      @endif
                    </div>
                    <div class="card-footer">
                      <form method="post" action="{{ route("admin.update_home_style", ['id' => 2]) }}">
                      @csrf
                        <button type="submit" class="btn btn-outline-primary">Active</button>
                      </form>
                    </div>
                  </div>
                </div>
      
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Home Style 5</h5>
                      <img src="{{asset("storage/home_styles/2.png")}}" class="img-thumbnail" width="100%" height="300px" />
                      @if ($homestyles->id == 3)
                        <div class="overlay"></div>
                      @endif
                    </div>
                    <div class="card-footer">
                      <form method="post" action="{{ route("admin.update_home_style", ['id' => 3])  }}">
                        @csrf
                          <button type="submit" class="btn btn-outline-primary">Active</button>
                      </form>
                    </div>
                  </div>
                </div>
      
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Home Style 6</h5>
                      <img src="{{asset("storage/home_styles/3.png")}}" class="img-thumbnail" width="100%" height="300px" />
                      @if ($homestyles->id == 4)
                        <div class="overlay"></div>
                      @endif
                    </div>
                    <div class="card-footer">
                      <form method="post" action="{{ route("admin.update_home_style", ['id' => 4])  }}">
                      @csrf
                        <button type="submit" class="btn btn-outline-primary">Active</button>
                      </form>
                    </div>
                  </div>
                </div>
      
                <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Home Style 8</h5>
                      <img src="{{asset("storage/home_styles/4.png")}}" class="img-thumbnail" width="100%" height="300px" />
                      @if ($homestyles->id == 5)
                      <div class="overlay"></div>
                      @endif
                    </div>
                    <div class="card-footer">
                      <form method="post" action="{{ route("admin.update_home_style", ['id' => 5]) }}">
                      @csrf
                        <button type="submit" class="btn btn-outline-primary">Active</button>
                      </form>
                    </div>
                  </div>
                </div>
      
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Home Style Default</h5>
                      <img src="{{asset("storage/home_styles/5.png")}}" class="img-thumbnail" width="100%" height="300px" />
                      @if ($homestyles->id == 1)
                      <div class="overlay"></div>
                      @endif
                    </div>
                    <div class="card-footer">
                      <form method="post" action="{{ route("admin.update_home_style", ['id' => 1]) }}">
                        @csrf
                          <button type="submit" class="btn btn-outline-primary">Active</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

@endsection


 
