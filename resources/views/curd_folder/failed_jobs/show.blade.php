<div class="container">
    <h2>failedJob Details</h2>
     <p><strong>uuid:</strong> {{ $failedJob ->uuid }}</p>
<p><strong>connection:</strong> {{ $failedJob ->connection }}</p>
<p><strong>queue:</strong> {{ $failedJob ->queue }}</p>
<p><strong>payload:</strong> {{ $failedJob ->payload }}</p>
<p><strong>exception:</strong> {{ $failedJob ->exception }}</p>
<p><strong>failed_at:</strong> {{ $failedJob ->failed_at }}</p>

</div>