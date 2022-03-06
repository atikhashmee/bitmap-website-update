<div class="table-responsive">
    <table class="table" id="testimonials-table">
        <thead>
        <tr>
            <th>Client Name</th>
        <th>Comment</th>
        <th>Client Media</th>
        <th>Client Image</th>
        <th>Signature Image</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($testimonials as $testimonial)
            <tr>
                <td>{{ $testimonial->client_name }}</td>
            <td>{{ $testimonial->comment }}</td>
            <td>{{ $testimonial->client_media }}</td>
            <td>{{ $testimonial->client_image }}</td>
            <td>{{ $testimonial->signature_image }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['testimonials.destroy', $testimonial->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('testimonials.show', [$testimonial->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('testimonials.edit', [$testimonial->id]) }}"
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
