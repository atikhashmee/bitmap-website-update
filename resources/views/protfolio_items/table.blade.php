<div class="table-responsive">
    <table class="table" id="protfolioItems-table">
        <thead>
        <tr>
            <th>Project Title</th>
        <th>Proftfolio Category Id</th>
        <th>About Project</th>
        <th>Detail Description</th>
        <th>Project Date</th>
        <th>Client</th>
        <th>Project Location</th>
        <th>Video Demo Link</th>
        <th>Video Description</th>
        <th>Image</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($protfolioItems as $protfolioItem)
            <tr>
                <td>{{ $protfolioItem->project_title }}</td>
                <td>{{ $protfolioItem->proftfolio_category_id }}</td>
                <td>{{ $protfolioItem->about_project }}</td>
                <td>{{ $protfolioItem->detail_description }}</td>
                <td>{{ $protfolioItem->project_date }}</td>
                <td>{{ $protfolioItem->client }}</td>
                <td>{{ $protfolioItem->project_location }}</td>
                <td>{{ $protfolioItem->video_demo_link }}</td>
                <td>{{ $protfolioItem->video_description }}</td>
                <td>
                    <img src="{{ $protfolioItem->image }}" width="20"  height="20" alt="">
                    <a href="{{route('protfolio.images.create', ['id' => $protfolioItem->id ])}}">Other Images</a>
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['protfolioItems.destroy', $protfolioItem->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('protfolioItems.show', [$protfolioItem->id]) }}"
                            class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('protfolioItems.edit', [$protfolioItem->id]) }}"
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
