<!-- Client Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_name', 'Client Name:') !!}
    {!! Form::text('client_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Media Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_media', 'Client Media:') !!}
    {!! Form::text('client_media', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_image', 'Client Image:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('client_image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('client_image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Signature Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('signature_image', 'Signature Image:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('signature_image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('signature_image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
