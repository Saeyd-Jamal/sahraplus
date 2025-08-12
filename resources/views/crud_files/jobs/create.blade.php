<div class="container">
    <h2>Create jobs</h2>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="queue" class="form-label">queue</label>
            <input type="text" class="form-control" name="queue" value="{{old("queue")}}">
            @error("queue")
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
            <label for="attempts" class="form-label">attempts</label>
            <input type="text" class="form-control" name="attempts" value="{{old("attempts")}}">
            @error("attempts")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="reserved_at" class="form-label">reserved_at</label>
            <input type="text" class="form-control" name="reserved_at" value="{{old("reserved_at")}}">
            @error("reserved_at")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="available_at" class="form-label">available_at</label>
            <input type="text" class="form-control" name="available_at" value="{{old("available_at")}}">
            @error("available_at")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>