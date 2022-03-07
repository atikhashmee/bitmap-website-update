<div class="form-group col-sm-6">
    <label for="title">Title:</label>
    <input class="form-control" name="title" type="text" id="title" @if(isset($protfolioFaq)) value="{{$protfolioFaq->title}}" @else value="{{old('title')}}"  @endif >
</div>
    
<div class="form-group col-sm-12 col-lg-12">
    <label for="description">Description:</label>
    <textarea class="form-control" name="description" cols="50" rows="10" id="description">
        @if(isset($protfolioFaq)) {{$protfolioFaq->title}} @else {{old('title')}}  @endif
    </textarea>
</div>  