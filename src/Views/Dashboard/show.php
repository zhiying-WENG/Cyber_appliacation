<?php include_once __DIR__ . '/../Commons/base_header.php'; ?>

<h2>File:
    <?= htmlspecialchars($file['filename'] ?? '') ?>
</h2>

<p>Filename:
    <?= htmlspecialchars($file['filename'] ?? '') ?>
</p>
<p>Description:
    <?= htmlspecialchars($file['description'] ?? '') ?>
</p>
<p>Size:
    <?= htmlspecialchars($file['size'] ?? '') ?>
</p>
<p>Download count:
    <?= htmlspecialchars($file['downloadCount'] ?? '') ?>
</p>
<p>Created at:
    <?= htmlspecialchars(date('d/m/Y à H:i', strtotime($file['createdAt'] ?? ''))) ?>
</p>
<p>Is public:
    <?= $file['isPublic'] ?? false ? 'Yes' : 'No' ?>
</p>

<?php if ($file['isPublic'] ?? false): ?>
    <p>Public URL: <a href="<?= $base_url ?? '' ?>/dl/<?= $file['token'] ?? '' ?>" target="_blank"><?= $base_url ?? '' ?>/dl/<?= $file['token'] ?? '' ?></a></p>
<?php endif; ?>

<hr />

<form action="/public/<?= htmlspecialchars($file['id'] ?? '', ENT_QUOTES) ?>" method="post">
    <div>
        <label>
            <input type="checkbox" name="isPublic" <?= $file['isPublic'] ?? false ? 'checked' : '' ?> />
            Public
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="hasPassword" <?= $file['hasPassword'] ?? false ? 'checked' : '' ?> />
            Password protected
        </label>
    </div>
    <div>
        <label>
            <input type="password" name="password" placeholder="Password" />
        </label>
    </div>
    <input type="hidden" name="csrf" value="<?= $csrf ?? '' ?>" />
    <button type="submit">Update</button>
</form>


<br />
<!-- Show comments -->
<div>
    <?php if (!empty($comments)): ?>
        <h2>comments file :</h2>
        <?php foreach ($comments as $comment): ?>
            <div>
                <p>
                    <?= htmlspecialchars($comment['content']); ?>
                </p>
                <p>Posted by
                    <?= htmlspecialchars($comment['firstname'] . ' ' . $comment['lastname']); ?><br> le :
                    <?= htmlspecialchars(date('d/m/Y à H:i', strtotime($comment['created_at']))); ?>
                </p>

                <form action="/delete/comment/<?= htmlspecialchars($comment['id'], ENT_QUOTES) ?>" method="POST">
                    <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf); ?>">
                    <button type="submit"
                        onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No comments for this file.</p>  
    <?php endif; ?>
</div>
<!--  -->


<a href="/dashboard">Back to dashboard</a>

<?php include_once __DIR__ . '/../Commons/base_footer.php'; ?>
