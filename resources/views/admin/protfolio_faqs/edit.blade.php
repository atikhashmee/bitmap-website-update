@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Protfolio Faq</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            <form method="POST" action="{{ route('admin.protfolio.protfolioFaqs.update', ['protfolio_id' => request()->route('protfolio_id'), 'protfolioFaq' => $protfolioFaq->id]) }}" accept-charset="UTF-8">
                
                @csrf
                @method("PATCH")

            <div class="card-body">
                <div class="row">
                    @include('admin.protfolio_faqs.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.protfolio.protfolioFaqs.index', ['protfolio_id' => request()->route('protfolio_id')]) }}" class="btn btn-default">Cancel</a>
            </div>

        </form>

        </div>
    </div>
@endsection
