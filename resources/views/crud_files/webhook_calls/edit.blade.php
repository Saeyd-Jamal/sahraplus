<div class="container">
    <h2>Edit webhookCall</h2>
    <form action="{{ route('webhook_calls.update', $webhookCall->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $webhookCall["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="url" class="form-label">url</label>
            <input type="text" class="form-control" name="url" value="{{old("url", $webhookCall["url"])}}">
            @error("url")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="headers" class="form-label">headers</label>
            <input type="text" class="form-control" name="headers" value="{{old("headers", $webhookCall["headers"])}}">
            @error("headers")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="payload" class="form-label">payload</label>
            <input type="text" class="form-control" name="payload" value="{{old("payload", $webhookCall["payload"])}}">
            @error("payload")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="exception" class="form-label">exception</label>
            <input type="text" class="form-control" name="exception" value="{{old("exception", $webhookCall["exception"])}}">
            @error("exception")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>