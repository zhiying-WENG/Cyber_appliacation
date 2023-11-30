<?php include_once __DIR__ . '/../Commons/base_header.php'; ?>

<h2>Download file: <?= htmlspecialchars($file['filename'] ?? '') ?></h2>
<p>Description: <?= htmlspecialchars($file['description'] ?? '') ?></p>
<p>Size: <?= htmlspecialchars($file['size'] ?? '') ?></p>
<p>Download count: <?= htmlspecialchars($file['downloadCount'] ?? '') ?></p>
<p>Created at: <?= htmlspecialchars(date('d/m/Y à H:i', strtotime($file['createdAt'] ?? ''))) ?></p>

<form action="/dl/<?= htmlspecialchars($file['token'] ?? '', ENT_QUOTES) ?>" method="post">
    <?php if ($file['hasPassword'] ?? false): ?>
        <div>
            <label>
                <input type="password" name="password" placeholder="Password" required/>
            </label>
        </div>
    <?php endif; ?>
    
    <input type="hidden" name="csrf" value="<?= $csrf ?? '' ?>" />
    <button type="submit">Download</button>
</form>

<!-- Comments -->

<h2>Comments</h2>



<br/>
<!--  -->
<!-- Show comments -->
<div>
    <?php if (!empty($comments)) : ?>
        <h2>Comments:</h2>
        <?php foreach ($comments as $comment) : ?>
            <div>
                <p><?= htmlspecialchars($comment['content']); ?></p>
                <p>Posted by <?= htmlspecialchars($comment['firstname'] . ' ' . $comment['lastname'] ); ?> le <?= htmlspecialchars(date('d/m/Y à H:i', strtotime($comment['created_at']))); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No comments for this file.</p>
    <?php endif; ?>
</div>

<!--  -->
<hr>
<form action="/addComment/<?= htmlspecialchars($file['token'] ?? '', ENT_QUOTES) ?>" method="post">
   <div>
  	<label for="comment">Comment</label><br />
  	<textarea id="comment" name="comment"></textarea>
   </div>
   <div>
  	<input type="submit" value="Post" />
   </div>
</form>

<?php if (!empty($messages)): ?>
    <hr/>
    <p>Errors:</p>
    <?php foreach ($messages as $message): ?>
        <div><?= htmlspecialchars($message) ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<?php include_once __DIR__ . '/../Commons/base_footer.php'; ?>
