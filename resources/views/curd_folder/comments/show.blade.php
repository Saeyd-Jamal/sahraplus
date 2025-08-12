<div class="container">
    <h2>comment Details</h2>
     <p><strong>short_id:</strong> {{ $comment ->short_id }}</p>
<p><strong>user_id:</strong> {{ $comment ->user_id }}</p>
<p><strong>parent_id:</strong> {{ $comment ->parent_id }}</p>
<p><strong>body:</strong> {{ $comment ->body }}</p>
<p><strong>media_url:</strong> {{ $comment ->media_url }}</p>
<p><strong>likes_count:</strong> {{ $comment ->likes_count }}</p>
<p><strong>replies_count:</strong> {{ $comment ->replies_count }}</p>
<p><strong>is_edited:</strong> {{ $comment ->is_edited }}</p>
<p><strong>status:</strong> {{ $comment ->status }}</p>
<p><strong>deleted_at:</strong> {{ $comment ->deleted_at }}</p>

</div>