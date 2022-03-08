@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Client</h1>
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
               <form method="post"  action="{{ route("admin.service.update.client", ['id' => $client_info->id]) }} " enctype="multipart/form-data">
                  @csrf   
                  @method("PATCH")
                  <div class="form-group col-md-6">
                     <label for="my-input">Compnay Name</label>
                     <input id="compnay_name" name="compnay_name" class="form-control" type="text" value="{{ $client_info->Compnay_name}}"/>
                  </div> 
                  <div class="form-group col-md-6">
                     <label for="my-input">Contact Number (Any numbers)</label>
                     <input id="phone_number" name="phone_number" class="form-control" type="text" value="{{ $client_info->phone_number}}"/>
                  </div> 
                  <div class="form-group col-md-6">
                     <label for="my-input">E-mail</label>
                     <input id="email" name="email" class="form-control" type="email" value="{{ $client_info->email}}"/>
                  </div> 
                  <div class="form-group col-md-6">
                        <div class="form-group">
                           <label for="my-input">Address</label>
                           <textarea id="address"  name="address" class="form-control" rows="3">{{ $client_info->address}}</textarea>
                        </div>
                  </div> 
                  <div class="form-group col-md-6">
                     <label for="my-input">Avatar</label>
                     <input name="dbclientavater" class="form-control" type="hidden" value="{{$client_info->avater}}" />
                     <input id="client_avater" name="client_avater" class="form-control" onchange="loadFile(event)" type="file" />
                     <img src="{{  asset("storage/".$client_info->avater) }}" class="img-thumbnail" id="output" />
                  </div>
                  <button class="btn btn-outline-primary"> Update <i class="fa fa-floppy-o" aria-hidden="true"></i> </button>
               </form>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


 
