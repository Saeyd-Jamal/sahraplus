<div class="container">
    <h2>session Details</h2>
     <p><strong>id:</strong> {{ $session ->id }}</p>
<p><strong>user_id:</strong> {{ $session ->user_id }}</p>
<p><strong>ip_address:</strong> {{ $session ->ip_address }}</p>
<p><strong>user_agent:</strong> {{ $session ->user_agent }}</p>
<p><strong>payload:</strong> {{ $session ->payload }}</p>
<p><strong>last_activity:</strong> {{ $session ->last_activity }}</p>

</div>