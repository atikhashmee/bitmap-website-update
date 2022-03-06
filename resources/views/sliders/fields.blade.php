<!-- Header Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('header_title', 'Header Title:') !!}
    {!! Form::text('header_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_date', 'Post Date:') !!}
    {!! Form::text('post_date', null, ['class' => 'form-control','id'=>'post_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#post_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Visible Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_visible', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_visible', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_visible', 'Is Visible', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
