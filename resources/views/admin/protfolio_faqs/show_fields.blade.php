<!-- Proftfolio Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('proftfolio_category_id', 'Proftfolio Category Id:') !!}
    <p>{{ $protfolioFaq->proftfolio_category_id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $protfolioFaq->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $protfolioFaq->description }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $protfolioFaq->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $protfolioFaq->updated_at }}</p>
</div>

