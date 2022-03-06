<!-- Client Name Field -->
<div class="col-sm-12">
    {!! Form::label('client_name', 'Client Name:') !!}
    <p>{{ $testimonial->client_name }}</p>
</div>

<!-- Comment Field -->
<div class="col-sm-12">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{{ $testimonial->comment }}</p>
</div>

<!-- Client Media Field -->
<div class="col-sm-12">
    {!! Form::label('client_media', 'Client Media:') !!}
    <p>{{ $testimonial->client_media }}</p>
</div>

<!-- Client Image Field -->
<div class="col-sm-12">
    {!! Form::label('client_image', 'Client Image:') !!}
    <p>{{ $testimonial->client_image }}</p>
</div>

<!-- Signature Image Field -->
<div class="col-sm-12">
    {!! Form::label('signature_image', 'Signature Image:') !!}
    <p>{{ $testimonial->signature_image }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $testimonial->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $testimonial->updated_at }}</p>
</div>

