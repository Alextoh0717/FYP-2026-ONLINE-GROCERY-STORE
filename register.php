<?php

$errors = [];
$fullname = $email = $phone = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$fullname         = trim($_POST['fullname']);
$email            = trim($_POST['email']);
$phone            = trim($_POST['phone']);
$password         = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (empty($fullname)) {
    $errors[] = "Full name is required.";
}

if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

if (empty($phone)) {
    $errors[] = "Phone number is required.";
} elseif (!preg_match('/^\d{10}$/', $phone)) {
    $errors[] = "Phone number must be 10 digits.";
}

if (empty($password)) {
    $errors[] = "Password is required.";
} elseif (strlen($password) < 8) {
    $errors[] = "Password must be at least 8 characters long.";
}

if ($password !== $confirm_password) {
    $errors[] = "Passwords do not match.";
}

}

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Registration</title>
    
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
 
        .reg-wrap {
            width: 100%;
            max-width: 500px;
        }
 
        .reg-card {
            background: #ffffff;
            border: 1px solid #e2e8da;
            border-radius: 16px;
            padding: 2.25rem 2rem;
        }
 
        /* Header */
        .reg-header {
            text-align: center;
            margin-bottom: 1.75rem;
        }
 
        .reg-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background-color: #eaf3de;
            margin-bottom: 0.875rem;
        }
 
        .reg-logo svg {
            width: 30px;
            height: 30px;
        }
 
        .reg-header h1 {
            font-size: 30px;
            font-weight: 600;
            color: #1a2e0e;
            margin-bottom: 4px;
        }
 
        .reg-header p {
            font-size: 14px;
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
            font-size: 13px;
            font-weight: 600;
            color: #a32d2d;
            margin-bottom: 6px;
        }
 
        .error-box ul {
            padding-left: 18px;
        }
 
        .error-box li {
            font-size: 13px;
            color: #a32d2d;
            line-height: 1.6;
        }
 
        /* Success box */
        .success-box {
            background: #eaf3de;
            border: 1px solid #97c459;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 1.25rem;
            font-size: 14px;
            color: #3b6d11;
            font-weight: 500;
        }
 
        /* Required note */
        .req-note {
            font-size: 12px;
            color: #9aab88;
            margin-bottom: 1rem;
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
            padding: 0 15px 0 36px;
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
 
        /* Divider */
        .divider {
            border: none;
            border-top: 1px solid #e8ede0;
            margin: 1.5rem 0;
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
            margin-top: 0.5rem;
            letter-spacing: 0.01em;
        }
 
        .btn-submit:hover {
            background-color: #3b6d11;
        }
 
        .btn-submit:active {
            transform: scale(0.99);
        }
 
        /* Footer */
        .reg-footer {
            text-align: center;
            margin-top: 1.25rem;
            font-size: 13px;
            color: #6b7c5a;
        }
 
        .reg-footer a {
            color: #3b6d11;
            text-decoration: none;
            font-weight: 600;
        }
 
        .reg-footer a:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>

<div class="reg-wrap">
    <div class="reg-card">

    <div class="reg-header">
    <div class="reg-logo">
        <svg viewBox="0 0 24 24" fill="none" stroke="#3b6d11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <path d="M16 10a4 4 0 01-8 0"/>
                </svg>
    </div>
     <h3>🛒 Online Grocery Store</h3>
    <p>Create your account</p>

    </div>

      <?php if (!empty($success)): ?>
            <div class="success-box">
                &#10003; Your account has been created successfully! <a href="login.php" style="color:#3b6d11; font-weight:600;">Log in here</a>.
            </div>
        <?php endif; ?>
 
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
 
        <p class="req-note">Fields marked * are required</p>

    <form method="post" action="register.php">
     
        <div class="form-group">
                <label for="fullname">Full name *</label>
                <div class="input-icon-wrap">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="8" r="4"/>
                        <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                    </svg>
                    <input type="text" id="fullname" name="fullname"
                           placeholder="Enter your full name"
                           value="<?php echo htmlspecialchars($fullname); ?>"
                           <?php if (in_array("Full name is required.", $errors)) echo 'class="input-error"'; ?>>
                </div>
            </div>
 
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email address *</label>
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
 
            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone number *</label>
                <div class="input-icon-wrap">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2A19.79 19.79 0 013.1 5.18 2 2 0 015.09 3h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L9.09 10.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
                    </svg>
                    <input type="tel" id="phone" name="phone"
                           placeholder="0123456789"
                           value="<?php echo htmlspecialchars($phone); ?>"
                           <?php if (in_array("Phone number is required.", $errors) || in_array("Phone number must be 10 digits.", $errors)) echo 'class="input-error"'; ?>>
                </div>
            </div>
 
            <hr class="divider">
 
            <!-- Password -->
            <div class="form-group">
                <label for="password">Password *</label>
                <div class="input-icon-wrap">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0110 0v4"/>
                    </svg>
                    <input type="password" id="password" name="password"
                           placeholder="Minimum 8 characters"
                           <?php if (in_array("Password is required.", $errors) || in_array("Password must be at least 8 characters long.", $errors)) echo 'class="input-error"'; ?>>
                </div>
            </div>
 
            <!-- Confirm Password -->
            <div class="form-group">
                <label for="confirm_password">Confirm password *</label>
                <div class="input-icon-wrap">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0110 0v4"/>
                        <polyline points="9 16 11 18 15 14"/>
                    </svg>
                    <input type="password" id="confirm_password" name="confirm_password"
                           placeholder="Re-enter your password"
                           <?php if (in_array("Passwords do not match.", $errors)) echo 'class="input-error"'; ?>>
                </div>
            </div>
 
      
      <button type="submit" class="btn-submit">Create account</button>

    </form>

    <p class="reg-footer">
      Already have an account? <a href="login.php">Log in</a>
    </p>

    </div>
  </div>
</body>
</html>
     
      


 
