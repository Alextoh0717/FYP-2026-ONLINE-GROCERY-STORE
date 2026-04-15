<?php


$errors = [];
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        
        }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Online Grocery Store</title>
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f4f6f0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .login-wrap {
            width: 100%;
            max-width: 460px;
        }

        .login-card {
            background: #ffffff;
            border: 1px solid #e2e8da;
            border-radius: 16px;
            padding: 2.25rem 2rem;
        }

        /* Header */
        .login-header {
            text-align: center;
            margin-bottom: 1.75rem;
        }

        .login-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background-color: #eaf3de;
            margin-bottom: 0.875rem;
        }

        .login-logo svg {
            width: 26px;
            height: 26px;
        }

        .login-header h1 {
            font-size: 25px;
            font-weight: 600;
            color: #1a2e0e;
            margin-bottom: 4px;
        }

        .login-header p {
            font-size: 16px;
            color: #6b7c5a;
        }

        /* Error box */
        .error-box {
            background: #fcebeb;
            border: 1px solid #f09595;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 1.25rem;
        }

        .error-box p {
            font-size: 16px;
            font-weight: 600;
            color: #a32d2d;
            margin-bottom: 6px;
        }

        .error-box ul {
            padding-left: 18px;
        }

        .error-box li {
            font-size: 16px;
            color: #a32d2d;
            line-height: 1.6;
        }

        /* Form groups */
        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            font-size: 18px;
            font-weight: 500;
            color: #4a5e38;
            margin-bottom: 6px;
        }

        .input-icon-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 11px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: #9aab88;
            pointer-events: none;
        }

        .form-group input {
            width: 100%;
            height: 42px;
            padding: 0 12px 0 36px;
            border: 1px solid #d4dfc8;
            border-radius: 10px;
            background-color: #f9faf7;
            color: #1a2e0e;
            font-size: 14px;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s, background-color 0.15s;
        }

        .form-group input::placeholder {
            color: #b5c4a4;
        }

        .form-group input:focus {
            border-color: #639922;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(99, 153, 34, 0.12);
        }

        .form-group input.input-error {
            border-color: #e24b4a;
            background-color: #fffafa;
        }

        /* Forgot password */
        .forgot-row {
            display: flex;
            justify-content: flex-end;
            margin-top: -4px;
            margin-bottom: 1rem;
        }

        .forgot-row a {
            font-size: 15px;
            color: #639922;
            text-decoration: none;
        }

        .forgot-row a:hover {
            text-decoration: underline;
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-top: 1px solid #e8ede0;
        }

        .divider span {
            font-size: 12px;
            color: #9aab88;
        }

        /* Submit button */
        .btn-submit {
            width: 100%;
            height: 44px;
            background-color: #639922;
            border: none;
            border-radius: 10px;
            color: #f0f8e6;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.15s, transform 0.1s;
            letter-spacing: 0.01em;
        }

        .btn-submit:hover {
            background-color: #3b6d11;
        }

        .btn-submit:active {
            transform: scale(0.99);
        }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 1.25rem;
            font-size: 13px;
            color: #6b7c5a;
        }

        .login-footer a {
            color: #3b6d11;
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        /* Welcome back badge */
        .welcome-badge {
            display: inline-block;
            background: #eaf3de;
            color: #3b6d11;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            margin-bottom: 0.75rem;
        }
    </style>
</head>
<body>

<div class="login-wrap">
    <div class="login-card">

        <!-- Header -->
        <div class="login-header">
            <div class="login-logo">
                <svg viewBox="0 0 24 24" fill="none" stroke="#3b6d11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <path d="M16 10a4 4 0 01-8 0"/>
                </svg>
            </div>
            <span class="welcome-badge">Welcome back</span>
            <h1>Online Grocery Store</h1>
            <p>Sign in to your account</p>
        </div>

        <!-- Error messages -->
        <?php if (!empty($errors)): ?>
            <div class="error-box">
                <p>Please fix the following:</p>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" action="login.php">

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email address</label>
                <div class="input-icon-wrap">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="2" y="4" width="20" height="16" rx="2"/>
                        <path d="M2 7l10 7 10-7"/>
                    </svg>
                    <input type="email" id="email" name="email"
                           placeholder="example@gmail.com"
                           value="<?php echo htmlspecialchars($email); ?>"
                           <?php if (in_array("Email is required.", $errors) || in_array("Invalid email format.", $errors)) echo 'class="input-error"'; ?>>
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-icon-wrap">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0110 0v4"/>
                    </svg>
                    <input type="password" id="password" name="password"
                           placeholder="Enter your password"
                           <?php if (in_array("Password is required.", $errors)) echo 'class="input-error"'; ?>>
                </div>
            </div>

            <!-- Forgot password -->
            <div class="forgot-row">
                <a href="forgot_password.php">Forgot password?</a>
            </div>

            <button type="submit" class="btn-submit">Sign in</button>

        </form>
    
        <div class="divider"><span>or</span></div>

        <p class="login-footer">
            Don't have an account? <a href="register.php">Create one</a>
        </p>

    </div>
</div>

</body>
</html>