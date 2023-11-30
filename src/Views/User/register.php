<?php include_once __DIR__ . '/../Commons/base_header.php'; ?>

<h2>Register</h2>

<form action="/register" method="post">
    <div>
        <label>
            Email:
            <input type="email" name="email" required <?php if (isset($userForm['email'])): ?>value='<?= htmlspecialchars($userForm['email']) ?>' <?php endif; ?> />
        </label>
    </div>
    <div>
        <label>
            Password:
            <input type="password" name="password" id="pwd" required />
            <div class="password-icon" id="eye">
                <!--                 <i data-feather="eye"></i>
                <i data-feather="eye-off"></i> -->
                <img id="eyePwd" src="/img/eyeOff.jpg">
            </div>
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
            Password confirmation:
            <input type="password" name="password_confirm" id="pwdConfirm" required />
            <div class="password-icon">
                <!--                 <i data-feather="eye"></i>
                <i data-feather="eye-off"></i> -->
                <img id="eyePwdConfirm" src="/img/eyeOff.jpg">
            </div>
        </label>
    </div>
    <p id="pwdConfirmLog"></p>
    <div>
        <label>
            Lastname:
            <input type="text" name="lastname" required <?php if (isset($userForm['lastname'])): ?>value='<?= htmlspecialchars($userForm['lastname']) ?>' <?php endif; ?> />
        </label>
    </div>
    <div>
        <label>
            Firstname:
            <input type="text" name="firstname" required <?php if (isset($userForm['firstname'])): ?>value='<?= htmlspecialchars($userForm['firstname']) ?>' <?php endif; ?> />
        </label>
    </div>
    <div>
        <button type="submit">Register</button>
    </div>
</form>

<div>
    <?php if (isset($error)): ?>
        <div>
            <?php foreach ($error as $e): ?>
                <div>
                    <?= htmlspecialchars($e) ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <div>
            <?= htmlspecialchars($success) ?>
        </div>
    <?php endif; ?>
</div>

<script src="/js/password.js"></script>

<?php include_once __DIR__ . '/../Commons/base_footer.php'; ?>