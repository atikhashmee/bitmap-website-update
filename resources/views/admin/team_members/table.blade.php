<div class="table-responsive">
    <table class="table" id="teamMembers-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Team Type</th>
                <th>Designation</th>
                <th>Description</th>
                <th>Email</th>
                <th>Status</th>
                <th>Show On Website?</th>
                <th>Linkedin</th>
                <th>Twitter</th>
                <th>Instagram</th>
                <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teamMembers as $teamMember)
            <tr>
                <td>{{ $teamMember->name }}</td>
                <td>{{ $teamMember->teamType ? $teamMember->teamType->name : "N/A" }}</td>
                <td>{{ $teamMember->designation }}</td>
                <td>{{ $teamMember->description }}</td>
                <td>{{ $teamMember->email }}</td>
                <td>{{ $teamMember->status }}</td>
                <td>{{ $teamMember->is_private ? "Yes" : "No" }}</td>
                <td>{{ $teamMember->linkedin }}</td>
                <td>{{ $teamMember->twitter }}</td>
                <td>{{ $teamMember->instagram }}</td>
                <td>{{ $teamMember->image }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.teamMembers.destroy', $teamMember->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.teamMembers.show', [$teamMember->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.teamMembers.edit', [$teamMember->id]) }}"
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
