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
                <div class="row">
                    <div class="col-md-6">   
                        <div class="card card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route("admin.protfolio.images.store")}}" class="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="protfolio_id" value="{{request()->route('id')}}">
                                <div class="form-group">
                                    <input type="file" name="images[]" id="images" multiple>
                                </div>
                                <div class="form-group">
                                    <button name="saveimg" class="btn btn-outline-primary"> Save <i class="fa fa-floppy-o"></i> </button>
                                    <a href="{{ route('admin.protfolioItems.index') }}" class="btn btn-outline-primary">Go Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="card card-body">
                          <div class="row">
                             @foreach ($images as $img)
                                <div class="col-md-4">
                                      <a href="javascript:void(0)" onclick="return confirm('Are you sure?') ? document.querySelector('#image_delete_form').submit(): null" class="close" aria-label="Close">
                                         <span style="color: red" aria-hidden="true">&times;</span>
                                      </a>
                                      <form action="{{route('admin.protfolio.images.delete', ['id' => $img->id])}}" method="POST" id="image_delete_form">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                      <img class="img-thumbnail" src="{{ $img->images }}" alt="">
                                   </div>
                             @endforeach
                             {{ $images->links() }}
                          </div>
                       </div>
                    </div>
                 </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


 
