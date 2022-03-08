<div class="modal fade" id="what_we_do_service_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route("admin.service.store.what-we-do") }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new what we do</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    @if (count($errors->what_we_do) > 0)
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->what_we_do->messages() as $error)
                                <li>{{ $error[0] }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                
                    <div class="form-group">
                        <label for="">Service Name</label>
                        <input type="text" class="form-control" name="service_title" id="servicetitle" value="{{old('service_title')}}">
                    </div>
                    <div class="form-group">
                        <label for="">About Service</label>
                        <textarea name="about_project" id="about_project" class="form-control">{{old('about_project')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Details Description</label>
                        <textarea class="form-control" id="pro_detail" name="pro_detail">{{old('pro_detail')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{old('date')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Service Cover Photo</label><br>
                                <small> (height X width = 80 X 80 PX, type png) </small>
                                <input type="file" class="form-control-file" onchange="loadFile(event)" name="service_cover_photo" id="service_cover_photo">
                                <div class="service-img-folder" style="margin-top:20px;">
                                    <img src="https://picsum.photos/g/300/300"  id="output">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>