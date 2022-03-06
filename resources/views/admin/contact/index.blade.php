
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
                <form action=" {{ route("update_contact_info") }} "  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                       <label for="example-text-input" class="col-form-label">Heading</label>
                       <input class="form-control" type="text"  id="headertitle" name="headertitle" value="{{ $contactInfo->contact_heading }}">
                    </div>
                    <div class="form-group">
                       <label for="example-search-input" class="col-form-label">Description</label>
                       <textarea class="form-control" id="description" name="description">{{ $contactInfo->little_description }}</textarea>
                    </div>
     
                    <div class="form-group">
                       <label for="example-text-input" class="col-form-label">Email</label>
                       <input class="form-control" type="text"  id="email" name="email" value="{{ $contactInfo->email }}">
                    </div>
     
                    <div class="form-group">
                       <label for="example-text-input" class="col-form-label">Cell</label>
                       <input class="form-control" type="text"  id="cell" name="cell" value="{{ $contactInfo->cell }}">
                    </div>
     
                    <div class="form-group">
                       <label for="example-text-input" class="col-form-label">Website</label>
                       <input class="form-control" type="text"  id="website" name="website" value="{{ $contactInfo->website }}">
                    </div>
     
                    <div class="form-group">
                       <label for="example-text-input" class="col-form-label">Address</label>
                       <input class="form-control" type="text"  id="address" name="address" value="{{ $contactInfo->address }}">
                    </div>
     
                    <div class="form-group">
                       <small>(Set Location for google map)</small>
                       <label for="example-text-input" class="col-form-label">Set Map address Ex: [Latitude,Logitude]</label>
                       <input class="form-control" type="text"  id="mapadrs" name="mapadrs" value="{{ $contactInfo->go_location }}">
                    </div> 
     
                    <div class="form-group">
                       <label for="example-text-input" class="col-form-label">Note For Map</label>
                       <input class="form-control" type="text"  id="mapnote" name="mapnote" value="{{ $contactInfo->note_on_go_location }}">
                    </div>
     
                    <div class="row">
                       <div class="col">
                          <div class="form-group">
                             <input type="hidden" name="dbimagefile" value="{{$contactInfo->contact_image}}">
                             <input type="file" name="imgfile" id="imgfile">
                          </div>
                       </div>
                       <div class="col">
                          <img src="{{   asset("storage/".$contactInfo->contact_image) }}" id="blah" class="img-thumbnail">
                       </div>
                    </div>
                       
                    <div class="input-group-append" >
                          <button class="btn btn-primary" type="submit" name="btnupdate">Update</button>
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


 
