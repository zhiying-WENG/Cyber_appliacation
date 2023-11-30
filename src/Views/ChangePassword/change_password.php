<?php include_once __DIR__ . '/../Commons/base_header.php'; ?>

<h2>Change password</h2>

<form action="/change_password" method="post">
    <div>
        <label>
            Password:
            <input type="password" name="password_old" required />
        </label>
    </div>
    <div>
        <label>
            New password:
            <input type="password" name="password" required />
        </label>
    </div>
    <div id="pwdLog"></div>
    <div id="pwdBlock">
        <div id="pwdLevel">
            <span id="block1">&nbsp;</span>
            <span id="block2">&nbsp;</span>
            <span id="block3">&nbsp;</span>
        </div>
    </div>
    <div>
        <label>
            New password confirmation:
            <input type="password" name="password_confirm" required />
        </label>
    </div>
    <div id="pwdConfirmLog"></div>
    <div>
        <button type="submit">change password</button>
    </div>
    <input type="hidden" name="csrf" value="<?= $csrf ?? '' ?>" />
</form>

<?php if (!empty($messages)): ?>
    <?php foreach ($messages as $message): ?>
        <p style="color:red">
            <?= htmlspecialchars($message ?? '', ENT_QUOTES) ?>
        </p>
    <?php endforeach; ?>
<?php endif; ?>
<script src="/js/password.js"></script>
<?php include_once __DIR__ . '/../Commons/base_footer.php'; ?>