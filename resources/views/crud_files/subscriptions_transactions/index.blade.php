<div class="container">
<h2>subscriptions_transactions List</h2>
<a href="{{ route('subscriptions_transactions.create') }}" class="btn btn-primary mb-3">Create subscriptions_transactions</a>
<table class="table">
    <thead>
        <tr><th>subscriptions_id</th><th>user_id</th><th>amount</th><th>payment_type</th><th>payment_status</th><th>transaction_id</th><th>tax_data</th><th>other_transactions_details</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($subscriptions_transactions as $item)
                <tr>
                    <td>{{$item->subscriptions_id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->amount}}</td>
<td>{{$item->payment_type}}</td>
<td>{{$item->payment_status}}</td>
<td>{{$item->transaction_id}}</td>
<td>{{$item->tax_data}}</td>
<td>{{$item->other_transactions_details}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('subscriptions_transactions.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('subscriptions_transactions.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>