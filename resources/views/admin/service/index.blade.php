
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Services</h1>
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
                <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                             Background
                          </button>
                        </h5>
                      </div>
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          <form action="{{ route("admin.service.update.background") }}"  method="post"  enctype="multipart/form-data">
                             @csrf
                             <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Heading</label>
                                <input class="form-control" type="text"  id="headertitle" name="headertitle" value="{{$bg->service_headline}}">
                             </div>
                             <div class="form-group">
                                <label for="description">Descrioptn</label>
                                <textarea id="description" name="bgdescription" class="form-control" rows="3">{{$bg->service_description}}</textarea>
                             </div>
                             <div class="row">
                                <div class="col-md-4">
                                   <div class="form-group">
                                      <label for="">Background Image</label>
                                      <input type="file" name="bgimgfile" class="form-control-file" id="bgimgfile">
                                   </div>
                                   <img src="{{ asset("storage/".$bg->service_bg_img) }}" class="img-thumbnail"  />
                                </div>
                             </div>
                             <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="btnupdate">Update</button>
                             </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            What we do
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                          <div class="control-panel d-flex justify-content-between">
                             <div class="left-side">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#what_we_do_service_modal" type="button">Add new</button>
                             </div>
                             <div class="right-side d-flex"></div>
                          </div>
                          <table class="table table-bordered">
                             <thead>
                                <tr>
                                   <th>Service Name</th>
                                   <th style="width: 46%">Description</th>
                                   <th>Image</th>
                                   <th>Action</th>
                                </tr>
                             </thead>
                             <tbody>
                                @foreach ($allservices as $service)
                                   <tr>
                                      <td>{{ $service->service_name }}</td>
                                      <td>{{ $service->about_service }}</td>
                                      <td>
                                         <img src="{{ asset("storage/".$service->services_photo) }}" alt="" class="rounded-circle" height="100" width="100" />
                                      </td>
                                      <td>
                                         <a class="btn btn-primary" href="{{ route("admin.service.edit.service-list", ['id' => $service->id]) }}">Edit</a>
                                         <a class="btn btn-primary" href="{{ route("admin.service.delete.what-we-do", ['id' => $service->id]) }}" onclick="return confirm('Are you sure?')">Delete</a>
                                      </td>
                                   </tr>
                                @endforeach
                             </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Services list
                          </button>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                          <div class="control-panel d-flex justify-content-between">
                             <div class="left-side">
                                   <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#service_list_modal">Add new</button>
                             </div>
                             <div class="right-side d-flex"></div>
                          </div>
                          <table class="table table-bordered">
                             <thead>
                                <tr>
                                   <th>Title</th>
                                   <th>Description</th>
                                   <th>Image</th>
                                   <th>Action</th>
                                </tr>
                             </thead>
                             <tbody>
                                @foreach ($shortservicelists as $serviceitem)
                                   <tr>
                                      <td>{{ $serviceitem->list_title }}</td>
                                      <td>{{ $serviceitem->short_description }}</td>
                                      <td><img src="{{ asset("storage/".$serviceitem->img) }}" width="48" height="40" /></td>
                                      <td><a class="btn btn-danger btn-sm project-btn" onclick="return confirm('Are you sure?')" href="{{ route("admin.service.delete.service-list", ['id' => $serviceitem->id]) }}">Delete</a></td>
                                   </tr>
                                @endforeach
                             </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                       <div class="card-header" id="headingFour">
                         <h5 class="mb-0">
                           <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                             Clients
                           </button>
                         </h5>
                       </div>
                   
                       <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                         <div class="card-body">
                          <div class="control-panel d-flex justify-content-between">
                             <div class="left-side">
                                   <button class="btn btn-primary" data-toggle="modal" data-target="#client_modal" type="button">Add new</button>
                             </div>
                             <div class="right-side d-flex">
                                
                             </div>
                          </div>
                          <table class="table table-bordered table-striped table-light">
                             <thead>
                                <tr>
                                   <th>#SL</th>
                                   <th>Compnay Name</th>
                                   <th>Description</th>
                                   <th>Avater</th>
                                   <th>Action</th>
                                </tr>
                             </thead>
                             <tbody>
                                @foreach ($client_lists as $client)
                                <tr>
                                   <td> {{ $loop->iteration }} </td>
                                   <td> {{ $client->Compnay_name }} 
                                      <a href="{{ route("admin.service.edit.client", ['id' => $client->id]) }}"> Edit </a> 
                                      <a href="{{ route("admin.service.delete.client", ['id' => $client->id]) }}" onclick="return confirm('Are you sure?')"  > Delete </a>
                                   </td>
                                   <td>
                                      Phone_Number =  {{ $client->phone_number }} <br>
                                      Email =  {{ $client->email }} <br>
                                      Address =  {{ $client->address }} <br>
                                   </td>
                                   <td>
                                      <img src="{{ asset("storage/".$client->avater) }}" width="80" height="60" class="rounded-circle" alt="Cinque Terre">
                                   </td>
                                   <td> 
                                       @if ($client->status == 0)
                                          <a onclick="return confirm('Are you sure?')" href="{{ url('admin/service/action-publish/'.$client->id.'/1') }}" class="btn btn-danger" >unpublished</a>
                                       @else
                                          <a onclick="return confirm('Are you sure?')" href="{{ url('admin/service/action-publish/'.$client->id.'/0') }}" class="btn btn-primary" >Published</a>
                                       @endif    
                                   </td>
                                </tr>
                                @endforeach
                             </tbody>
                          </table>
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

    <x-service.service_list_modal />
    <x-service.what_we_do_modal />
    <x-service.client_modal />
 
@endsection


 

@push('page_scripts')
      <script>
         @if (count($errors->what_we_do) > 0)
             $("#what_we_do_service_modal").modal('show')
         @endif
         @if (count($errors->service_list) > 0)
             $("#service_list_modal").modal('show')
         @endif
         @if (count($errors->clients) > 0)
             $("#client_modal").modal('show')
         @endif

      </script>
@endpush