<!-- Header Title Field -->
<div class="col-sm-12">
    {!! Form::label('header_title', 'Header Title:') !!}
    <p>{{ $slider->header_title }}</p>
</div>

<!-- Url Field -->
<div class="col-sm-12">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $slider->url }}</p>
</div>

<!-- Post Date Field -->
<div class="col-sm-12">
    {!! Form::label('post_date', 'Post Date:') !!}
    <p>{{ $slider->post_date }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $slider->description }}</p>
</div>

<!-- Is Visible Field -->
<div class="col-sm-12">
    {!! Form::label('is_visible', 'Is Visible:') !!}
    <p>{{ $slider->is_visible }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $slider->image }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $slider->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $slider->updated_at }}</p>
</div>

