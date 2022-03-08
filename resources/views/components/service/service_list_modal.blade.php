  {{-- service lists modal section --}}
  <div class="modal fade" id="service_list_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add new Service</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if (count($errors->service_list) > 0)
             <div class="alert alert-danger">
                <ul>
                   @foreach ($errors->service_list->messages() as $error)
                      <li>{{ $error[0] }}</li>
                   @endforeach
                </ul>
             </div>
          @endif
          <form method="post" action="{{ url('Admin/SaveServiceList') }} " enctype="multipart/form-data">
             @csrf   
             <div class="form-group">
                <label for="my-input">Title</label>
                <input id="list_title"  name="list_title" class="form-control" type="text">
             </div>
             <div class="form-group">
                <div class="form-group">
                   <label for="my-input">Description <small> <b> (No More than 40 character) </b> </small> </label>
                   <textarea id="short_description"  name="short_description" class="form-control" rows="3"></textarea>
                </div>
             </div>
             <div class="form-group">
                <label for="my-input">Avatar</label>
                <input id="list_avater" name="list_avater" class="form-control-file" type="file">
                <small> <b> (size: 48X40 PX |  ** mandatory) </b> </small>
             </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
       </form>
        </div>
      </div>
    </div>
  </div>