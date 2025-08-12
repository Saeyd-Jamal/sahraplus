<div class="container">
<h2>subscriptions List</h2>
<a href="{{ route('subscriptions.create') }}" class="btn btn-primary mb-3">Create subscriptions</a>
<table class="table">
    <thead>
        <tr><th>plan_id</th><th>user_id</th><th>start_date</th><th>end_date</th><th>status</th><th>is_manual</th><th>amount</th><th>discount_percentage</th><th>tax_amount</th><th>coupon_discount</th><th>total_amount</th><th>name</th><th>identifier</th><th>type</th><th>duration</th><th>level</th><th>plan_type</th><th>payment_id</th><th>device_id</th><th>created_by</th><th>updated_by</th><th>deleted_by</th><th>deleted_at</th></tr>
    </thead>
    <tbody>
        @foreach ($subscriptions as $item)
                <tr>
                    <td>{{$item->plan_id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->start_date}}</td>
<td>{{$item->end_date}}</td>
<td>{{$item->status}}</td>
<td>{{$item->is_manual}}</td>
<td>{{$item->amount}}</td>
<td>{{$item->discount_percentage}}</td>
<td>{{$item->tax_amount}}</td>
<td>{{$item->coupon_discount}}</td>
<td>{{$item->total_amount}}</td>
<td>{{$item->name}}</td>
<td>{{$item->identifier}}</td>
<td>{{$item->type}}</td>
<td>{{$item->duration}}</td>
<td>{{$item->level}}</td>
<td>{{$item->plan_type}}</td>
<td>{{$item->payment_id}}</td>
<td>{{$item->device_id}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>{{$item->deleted_by}}</td>
<td>{{$item->deleted_at}}</td>
<td>
                        <a href="{{ route('subscriptions.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('subscriptions.destroy', $item->id) }}" method="POST" style="display:inline;">
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