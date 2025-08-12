<div class="container">
    <h2>job Details</h2>
     <p><strong>queue:</strong> {{ $job ->queue }}</p>
<p><strong>payload:</strong> {{ $job ->payload }}</p>
<p><strong>attempts:</strong> {{ $job ->attempts }}</p>
<p><strong>reserved_at:</strong> {{ $job ->reserved_at }}</p>
<p><strong>available_at:</strong> {{ $job ->available_at }}</p>

</div>