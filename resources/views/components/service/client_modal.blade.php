  {{-- client modal section --}}
<div class="modal fade" id="client_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <form method="post"  action="{{ route("admin.service.store.client") }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">Add new Client</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               @if (count($errors->clients) > 0)
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->clients->messages() as $error)
                           <li>{{ $error[0] }}</li>
                        @endforeach
                     </ul>
                  </div>
               @endif   
               <div class="form-group">
                  <label for="my-input">Compnay Name</label>
                  <input id="compnay_name"  name="compnay_name" class="form-control" type="text" value="{{old('compnay_name')}}">
               </div>
               <div class="form-group">
                  <label for="my-input">Contact Number (Any numbers)</label>
                  <input id="phone_number"  name="phone_number" class="form-control" type="text" value="{{old('phone_number')}}">
               </div>
               <div class="form-group">
                  <label for="my-input">E-mail</label>
                  <input id="email"  name="email" class="form-control" type="email" value="{{old('email')}}">
               </div>
               <div class="form-group">
                  <div class="form-group">
                     <label for="my-input">Address</label>
                     <textarea id="address"  name="address" class="form-control" rows="3">{{old('address')}}</textarea>
                  </div>
               </div>
               <div class="form-group">
                  <label for="my-input">Avatar</label>
                  <input id="client_avater" name="client_avater" class="form-control-file" type="file">
                  <small> <b>( Logo size : 120X68 PX| **mandatory)</b> </small>
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