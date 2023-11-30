<?php include_once __DIR__ . '/../Commons/base_header.php'; ?>

<h2>Change password</h2>

<form action="/change_password" method="post">
    <div>
        <label>
            Password:
            <input type="password" name="password_old" required />
            <div class="password-icon">
                <i id="eye" data-feather="eye"></i>
                <i id="eye-off" data-feather="eye-off"></i>
            </div>
        </label>

    </div>
    <div>
        <label>
            New password:
            <input type="password" name="password" id="pwd" required />
        </label>
    </div>
    <p id="pwdLog"></p>
    <div id="pwdBlock">
        <div id="pwdLevel">
            <span id="block1">weak</span>
            <span id="block2">medium</span>
            <span id="block3">strong</span>
        </div>
    </div>
    <div>
        <label>
            New password confirmation:
            <input type="password" name="password_confirm" id="pwdConfirm" required />
        </label>
    </div>
    <p id="pwdConfirmLog"></p>
    <div>
        <button type="submit">change password</button>
    </div>
    <input type="hidden" name="csrf" value="<?= $csrf ?? '' ?>" />
</form>

<div class="result"></div>
<?php if (!empty($messages)): ?>
    <?php foreach ($messages as $message): ?>
        <p style="color:red">
            <?= htmlspecialchars($message ?? '', ENT_QUOTES) ?>
        </p>
    <?php endforeach; ?>
<?php endif; ?>
<script src="/js/password.js"></script>
<?php include_once __DIR__ . '/../Commons/base_footer.php'; ?>