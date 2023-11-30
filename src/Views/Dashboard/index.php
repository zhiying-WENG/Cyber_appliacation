<?php include_once __DIR__ . '/../Commons/base_header.php'; ?>

<h2>Dashboard</h2>

<p>Hello <?= htmlspecialchars($name ?? '', ENT_QUOTES) ?> !</p>


<h3>Your files</h3>

<?php if (!empty($files)): ?>
    <table>
        <thead>
        <tr>
            <th>Filename</th>
            <th>Description</th>
            <th>Size</th>
            <th>Download count</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($files as $file): ?>
            <tr>
                <td><a href="/file/<?= $file['id'] ?>"><?= htmlspecialchars($file['filename'], ENT_QUOTES) ?></a></td>
                <td><?= htmlspecialchars($file['description'], ENT_QUOTES) ?></td>
                <td><?= htmlspecialchars($file['size'], ENT_QUOTES) ?></td>
                <td><?= htmlspecialchars($file['downloadCount'], ENT_QUOTES) ?></td>
                <td>
                    <a href="/download/<?= htmlspecialchars($file['id'], ENT_QUOTES) ?>" target="_blank">Download</a>
                    <form action="/delete/<?= htmlspecialchars($file['id'], ENT_QUOTES) ?>" method="post">
                        <input type="hidden" name="csrf" value="<?= $csrf_delete ?? '' ?>" />
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>You have no files</p>
<?php endif; ?>

<h3> Your quota </h3>
<p> You use <?= number_format($used_size ?? 0, 2) ?> Mo </p>
<p> You have <?= number_format($quota  ?? 0, 2) ?> Mo free on your account </p>


<h3>Upload a file</h3>

<p> You cannot upload a file whose size exceeds 10MB </p>

<form action="/upload" method="post" enctype="multipart/form-data">
    <label  for="file" class="drop-container" id="dropcontainer"> 
    <div>
        <input type="file" name="file" id="images" onchange="checkFile(<?= htmlspecialchars($quota ?? 0) ?>, <?= htmlspecialchars($max_file_size ?? 0) ?>)" required/>
    </div>
    </label>

    <p id="error" style="display:none;"></p>

    <div style="margin: 30px;">
        <textarea name="description" placeholder="Description"></textarea>
    </div>    
    <div>
       <button type="submit" class="buttonfile" id="button">Upload</button>
    </div>
    <input type="hidden" name="csrf" value="<?= $csrf_upload ?? '' ?>" />
</form>

<div>
    <button><a href="/change_password">Change password</a></button>
</div>

<?php if (!empty($messages)): ?>
    <?php foreach ($messages as $message): ?>
        <p>
            <?= htmlspecialchars($message ?? '', ENT_QUOTES) ?>
        </p>
    <?php endforeach; ?>
<?php endif; ?>

<?php include_once __DIR__ . '/../Commons/base_footer.php'; ?>


