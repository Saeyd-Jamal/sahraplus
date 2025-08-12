<div class="container">
    <h2>Create webhook_calls</h2>
    <form action="{{ route('webhook_calls.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name")}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="url" class="form-label">url</label>
            <input type="text" class="form-control" name="url" value="{{old("url")}}">
            @error("url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="headers" class="form-label">headers</label>
            <input type="text" class="form-control" name="headers" value="{{old("headers")}}">
            @error("headers")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="payload" class="form-label">payload</label>
            <input type="text" class="form-control" name="payload" value="{{old("payload")}}">
            @error("payload")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="exception" class="form-label">exception</label>
            <input type="text" class="form-control" name="exception" value="{{old("exception")}}">
            @error("exception")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>