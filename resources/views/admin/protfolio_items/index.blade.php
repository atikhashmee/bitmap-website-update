@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Protfolio Items</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('admin.protfolioItems.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.protfolio.Savepbginfo') }}"  method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="example-text-input" class="col-form-label">Heading</label>
                      <input class="form-control" type="text"  id="headertitle" name="headertitle" value="{{ $bginfo->bg_title }}">
                    </div>
                    <div class="form-group">
                      <label for="description">Descrioptn</label>
                      <textarea id="description" name="bgdescription" class="form-control" rows="3">{{ $bginfo->bg_description }}</textarea>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <input type="file" name="bgimgfile" id="bgimgfile">
                        </div>
                      </div>
                      <div class="col">
                        <img src="{{ asset("storage/".$bginfo->bg_image ) }}" class="img-thumbnail" width="200" height="200"  />
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit" name="btnupdate">Update</button>
                  </form>

                @include('admin.protfolio_items.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

