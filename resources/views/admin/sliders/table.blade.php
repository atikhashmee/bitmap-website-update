<div class="table-responsive">
    <table class="table" id="sliders-table">
        <thead>
        <tr>
            <th>Header Title</th>
        <th>Url</th>
        <th>Post Date</th>
        <th>Description</th>
        <th>Is Visible</th>
        <th>Image</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sliders as $slider)
            <tr>
                <td>{{ $slider->header_title }}</td>
            <td>{{ $slider->url }}</td>
            <td>{{ $slider->post_date }}</td>
            <td>{{ $slider->description }}</td>
            <td>{{ $slider->is_visible }}</td>
            <td>{{ $slider->image }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.sliders.destroy', $slider->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.sliders.show', [$slider->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.sliders.edit', [$slider->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
