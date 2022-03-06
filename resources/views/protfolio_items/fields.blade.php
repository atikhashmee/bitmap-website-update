<!-- Project Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_title', 'Project Title:') !!}
    {!! Form::text('project_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Proftfolio Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proftfolio_category_id', 'Proftfolio Category Id:') !!}
    {!! Form::select('proftfolio_category_id', $proftfolio_categoryItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- About Project Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('about_project', 'About Project:') !!}
    {!! Form::textarea('about_project', null, ['class' => 'form-control']) !!}
</div>

<!-- Detail Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('detail_description', 'Detail Description:') !!}
    {!! Form::textarea('detail_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Project Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_date', 'Project Date:') !!}
    {!! Form::text('project_date', null, ['class' => 'form-control','id'=>'project_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#project_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Client Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client', 'Client:') !!}
    {!! Form::text('client', null, ['class' => 'form-control']) !!}
</div>

<!-- Project Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_location', 'Project Location:') !!}
    {!! Form::text('project_location', null, ['class' => 'form-control']) !!}
</div>

<!-- Video Demo Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video_demo_link', 'Video Demo Link:') !!}
    {!! Form::text('video_demo_link', null, ['class' => 'form-control']) !!}
</div>

<!-- Video Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video_description', 'Video Description:') !!}
    {!! Form::text('video_description', null, ['class' => 'form-control']) !!}
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
