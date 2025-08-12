<div class="container">
<h2>user_coupon_redeems List</h2>
<a href="{{ route('user_coupon_redeems.create') }}" class="btn btn-primary mb-3">Create user_coupon_redeems</a>
<table class="table">
    <thead>
        <tr><th>coupon_code</th><th>discount</th><th>user_id</th><th>coupon_id</th><th>booking_id</th><th>created_by</th><th>updated_by</th></tr>
    </thead>
    <tbody>
        @foreach ($user_coupon_redeems as $item)
                <tr>
                    <td>{{$item->coupon_code}}</td>
<td>{{$item->discount}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->coupon_id}}</td>
<td>{{$item->booking_id}}</td>
<td>{{$item->created_by}}</td>
<td>{{$item->updated_by}}</td>
<td>
                        <a href="{{ route('user_coupon_redeems.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user_coupon_redeems.destroy', $item->id) }}" method="POST" style="display:inline;">
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