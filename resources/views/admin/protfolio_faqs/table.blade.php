<div class="table-responsive">
    <table class="table" id="protfolioFaqs-table">
        <thead>
        <tr>
            <th>Proftfolio Category Id</th>
        <th>Title</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($protfolioFaqs as $protfolioFaq)
            <tr>
                <td>{{ $protfolioFaq->proftfolio_category_id }}</td>
            <td>{{ $protfolioFaq->title }}</td>
            <td>{{ $protfolioFaq->description }}</td>
                <td width="120">
                    <form method="POST" action="{{ route('admin.protfolio.protfolioFaqs.destroy', ['protfolio_id' => request()->route('protfolio_id'), 'protfolioFaq' => $protfolioFaq->id]) }}" accept-charset="UTF-8">
                        @csrf
                        @method("DELETE")
                    <div class='btn-group'>
                        <a href="{{ route('admin.protfolio.protfolioFaqs.show', ['protfolio_id' => request()->route('protfolio_id'), 'protfolioFaq' => $protfolioFaq->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.protfolio.protfolioFaqs.edit', ['protfolio_id' => request()->route('protfolio_id'), 'protfolioFaq' => $protfolioFaq->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
