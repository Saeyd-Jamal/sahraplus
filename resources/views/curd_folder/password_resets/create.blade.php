<div class="container">
    <h2>Create password_resets</h2>
    <form action="{{ route('password_resets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" name="email" value="{{old("email")}}">
            @error("email")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="token" class="form-label">token</label>
            <input type="text" class="form-control" name="token" value="{{old("token")}}">
            @error("token")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>