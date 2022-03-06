<div class="table-responsive">
    <table class="table" id="proftfolioCategories-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($proftfolioCategories as $proftfolioCategory)
            <tr>
                <td>{{ $proftfolioCategory->name }}</td>
            <td>{{ $proftfolioCategory->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.proftfolioCategories.destroy', $proftfolioCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.proftfolioCategories.show', [$proftfolioCategory->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.proftfolioCategories.edit', [$proftfolioCategory->id]) }}"
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
