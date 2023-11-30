<?php include_once __DIR__ . '/../Commons/base_header.php'; ?>

<h2>Login</h2>

<div class="mb-3">
<form action="/login_check" method="post">
        <label>
            Email :
            <input type="email" name="email" required <?php if (isset($email)): ?>value='<?= htmlspecialchars($email) ?>'<?php endif; ?> />
        </label>
    <div>
        <label>
            Password:
            <input id="password" type="password" name="password" required />
            <div id="icon-eye" class="password-icon">
                <i id="icon-eye-on" data-feather="eye"></i>
                <i id="icon-eye-off" data-feather="eye-off"></i>
            </div>
        </label>
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
    <input type="hidden" name="csrf" value="<?= $csrf ?? '' ?>" />
</form>
</div>

<div>
    <?php if (isset($error)): ?>
        <div>
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>
</div>

<?php include_once __DIR__ . '/../Commons/base_footer.php'; ?>
