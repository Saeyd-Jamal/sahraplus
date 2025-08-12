<div class="container">
    <h2>activityLog Details</h2>
     <p><strong>log_name:</strong> {{ $activityLog ->log_name }}</p>
<p><strong>description:</strong> {{ $activityLog ->description }}</p>
<p><strong>subject_type:</strong> {{ $activityLog ->subject_type }}</p>
<p><strong>subject_id:</strong> {{ $activityLog ->subject_id }}</p>
<p><strong>event:</strong> {{ $activityLog ->event }}</p>
<p><strong>causer_type:</strong> {{ $activityLog ->causer_type }}</p>
<p><strong>causer_id:</strong> {{ $activityLog ->causer_id }}</p>
<p><strong>properties:</strong> {{ $activityLog ->properties }}</p>
<p><strong>batch_uuid:</strong> {{ $activityLog ->batch_uuid }}</p>

</div>