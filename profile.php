<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; background: #f0f4eb; color: #1a2e0e; }

    /* Navbar */
    nav {
      background: #1a2e0e;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    nav span { color: white; font-size: 23px; font-weight: bold; }
    nav a {
      color: #c0dd97;
      text-decoration: none;
      border: 1px solid #c0dd97;
      padding: 10px 17px;
      border-radius: 8px;
      font-size: 15px;
    }

    /* Hero */
    .hero {
      background: #1a2e0e;
      text-align: center;
      padding: 40px 20px 80px;
    }
    .avatar {
      width: 120px; height: 120px;
      background: #639922;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 42px;
      font-weight: bold;
      color: white;
      margin-bottom: 12px;
    }
    .hero h1 { color: white; font-size: 30px; }
    .hero p  { color: #9aab88; font-size: 18px; margin-top: 5px; }

    /* Stats */
    .stats {
    display: flex;
    gap: 25px;
    max-width: 1400px;
    margin: -70px auto 35px;
    padding: 0 40px;
    }
    .stat-box {
      flex: 1;
      background: white;
      border: 1px solid #dde8cf;
      border-radius: 12px;
      padding: 18px;
      text-align: center;
    }
    .stat-box .num  { font-size: 36px; font-weight: bold; color: #1a2e0e; }
    .stat-box .lbl  { font-size: 15px; color: #7a9060; margin-top: 4px; }

    /* Layout */
    .layout {
    max-width: 1400px;
    margin: 0 auto 60px;
    padding: 0 40px;
    display: flex;
    gap: 30px;
    }
    /* Sidebar */
    .sidebar { width: 240px; flex-shrink: 0; }
    .sidebar button {
      display: block;
      width: 100%;
      padding: 12px 15px;
      text-align: left;
      background: white;
      border: 1px solid #dde8cf;
      border-left: 3px solid transparent;
      cursor: pointer;
      font-size: 18px;
      color: #4a5e38;
    }
    .sidebar button:hover   { background: #f4f9ee; }
    .sidebar button.active  { border-left-color: #639922; font-weight: bold; background: #f4f9ee; }
    .sidebar button:first-child { border-radius: 12px 12px 0 0; }
    .sidebar button:last-child  { border-radius: 0 0 12px 12px; }

    /* Panel */
    .panel { display: none; flex: 1; }
    .panel.active { display: block; }

    .card {
      background: white;
      border: 1px solid #dde8cf;
      border-radius: 12px;
      padding: 40px;
      margin-bottom: 15px;
      min-height: 360px;
    }
    .card h2 { font-size: 18px; margin-bottom: 18px; padding-bottom: 12px; border-bottom: 2px solid #f0f4eb; }

    /* Info grid */
    .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    .info-item {
      background: #f8faf5;
      border: 1px solid #dde8cf;
      border-radius: 10px;
      padding: 18px 20px;
    }
    .info-item .lbl { font-size: 11px; color: #7a9060; text-transform: uppercase; margin-bottom: 5px; }
    .info-item .val { font-size: 20px; font-weight: bold; }

    /* Form */
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px; }
    .form-row.full { grid-template-columns: 1fr; }
    label { display: block; font-size: 12px; font-weight: bold; color: #4a5e38; margin-bottom: 6px; text-transform: uppercase; }
    input[type=text], input[type=email], input[type=tel], input[type=password] {
      width: 100%;
      height: 46px;
      padding: 0 14px;
      border: 2px solid #dde8cf;
      border-radius: 10px;
      font-size: 15px;
      background: #f8faf5;
      outline: none;
    }
    input:focus { border-color: #639922; background: white; }

    /* Buttons */
    .btn-green {
      background: #639922;
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 10px;
      font-size: 15px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 15px;
    }
    .btn-green:hover { background: #3b6d11; }
    .btn-gray {
      background: white;
      color: #4a5e38;
      border: 2px solid #dde8cf;
      padding: 12px 24px;
      border-radius: 10px;
      font-size: 15px;
      cursor: pointer;
      margin-top: 15px;
      margin-right: 10px;
    }
    .btn-red {
      background: white;
      color: #a32d2d;
      border: 2px solid #f09595;
      padding: 12px 24px;
      border-radius: 10px;
      font-size: 15px;
      font-weight: bold;
      cursor: pointer;
      width: 100%;
      margin-top: 10px;
    }
    .btn-red:hover { background: #fcebeb; }

    /* Alert */
    .alert { padding: 12px 16px; border-radius: 10px; margin-bottom: 15px; font-size: 14px; font-weight: bold; }
    .alert.success { background: #eaf3de; border: 2px solid #97c459; color: #3b6d11; }
    .alert.error   { background: #fcebeb; border: 2px solid #f09595; color: #a32d2d; }

    /* Danger */
    .danger-card {
      background: #fff8f8;
      border: 2px solid #f09595;
      border-radius: 12px;
      padding: 25px;
    }
    .danger-card h2 { color: #a32d2d; }
    .danger-card p  { font-size: 14px; color: #6b7c5a; margin-top: 10px; line-height: 1.7; }

    @media (max-width: 600px) {
      .stats, .layout { flex-direction: column; }
      .sidebar { width: 100%; }
      .info-grid, .form-row { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav>
  <span>🛒 Online Grocery Store</span>
  <a href="dashboard.php">← Back to shop</a>
</nav>

<!-- Hero -->
<div class="hero">
  <div class="avatar">AD</div>
  <h1>Test User 👋</h1>
  <p>test.user@gmail.com</p>
</div>

<!-- Stats -->
<div class="stats">
  <div class="stat-box"><div class="num">12</div><div class="lbl">Orders</div></div>
  <div class="stat-box"><div class="num">3</div><div class="lbl">Reviews</div></div>
  <div class="stat-box"><div class="num">5</div><div class="lbl">Saved</div></div>
</div>

<!-- Main Layout -->
<div class="layout">

  <!-- Sidebar -->
  <div class="sidebar">
    <button class="active" onclick="show('view', this)">👤 My Profile</button>
    <button onclick="show('edit', this)">✏️ Edit Info</button>
    <button onclick="show('security', this)">🔒 Security</button>
  </div>

  <!-- Panels -->
  <div style="flex:1">

    <!-- View Panel -->
    <div class="panel active" id="panel-view">
      <div class="card">
        <h2>Your Info</h2>
        <div class="info-grid">
          <div class="info-item"><div class="lbl">Full Name</div><div class="val">Test User</div></div>
          <div class="info-item"><div class="lbl">Email</div><div class="val">test.user@gmail.com</div></div>
          <div class="info-item"><div class="lbl">Phone</div><div class="val">0123456789</div></div>
          <div class="info-item"><div class="lbl">Member Since</div><div class="val">January 2025</div></div>
        </div>
        <button class="btn-green" onclick="show('edit', document.querySelectorAll('.sidebar button')[1])">✏️ Edit Profile</button>
      </div>
    </div>

    <!-- Edit Panel -->
    <div class="panel" id="panel-edit">
      <div class="card">
        <h2>Edit your info</h2>
        <div id="msg"></div>
        <div class="form-row full">
          <div>
            <label>Full Name</label>
            <input type="text" id="name" value="Test User">
          </div>
        </div>
        <div class="form-row">
          <div>
            <label>Email</label>
            <input type="email" id="email" value="test.user@gmail.com">
          </div>
          <div>
            <label>Phone</label>
            <input type="tel" id="phone" value="0123456789">
          </div>
        </div>
        <div>
          <button class="btn-gray" onclick="show('view', document.querySelectorAll('.sidebar button')[0])">Cancel</button>
          <button class="btn-green" onclick="saveEdit()">💾 Save Changes</button>
        </div>
      </div>
    </div>

    <!-- Security Panel -->
    <div class="panel" id="panel-security">
      <div class="card">
        <h2>🔑 Change Password</h2>
        <div class="form-row full">
          <div>
            <label>Current Password</label>
            <input type="password" placeholder="Enter current password">
          </div>
        </div>
        <div class="form-row">
          <div>
            <label>New Password</label>
            <input type="password" id="pw1" placeholder="Min. 8 characters">
          </div>
          <div>
            <label>Confirm Password</label>
            <input type="password" id="pw2" placeholder="Same again">
          </div>
        </div>
        <div id="pw-msg"></div>
        <button class="btn-green" onclick="savePassword()">Update Password</button>
      </div>

      <div class="danger-card">
        <h2>⚠️ Danger Zone</h2>
        <p>Deleting your account removes <strong>everything</strong> — orders, reviews, saved items. This <strong>cannot be undone</strong>.</p>
        <button class="btn-red" onclick="if(confirm('Really delete your account? This cannot be undone!')) alert('Account deleted.')">🗑️ Delete My Account</button>
      </div>
    </div>

  </div>
</div>

<script>
  // Switch panel
  function show(name, btn) {
    document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.sidebar button').forEach(b => b.classList.remove('active'));
    document.getElementById('panel-' + name).classList.add('active');
    btn.classList.add('active');
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  // Save profile
  function saveEdit() {
  var name  = document.getElementById('name').value.trim();
  var email = document.getElementById('email').value.trim();
  var phone = document.getElementById('phone').value.trim();
  var msg   = document.getElementById('msg');

  if (!name || !email || !phone) {
    msg.innerHTML = '<div class="alert error">Please fill in all fields!</div>';
    return;
  }

  if (!email.includes('@')) {
    msg.innerHTML = '<div class="alert error">Email doesn\'t look right.</div>';
    return;
  }

  if (phone.length !== 10 || isNaN(phone)) {
    msg.innerHTML = '<div class="alert error">Phone must be exactly 10 digits.</div>';
    return;
  }

  // Update hero section
  document.querySelector('.hero h1').innerHTML = name + ' 👋';
  document.querySelector('.hero p').innerText = email;

  // Update profile view panel
  document.querySelector('#panel-view .info-item:nth-child(1) .val').innerText = name;
  document.querySelector('#panel-view .info-item:nth-child(2) .val').innerText = email;
  document.querySelector('#panel-view .info-item:nth-child(3) .val').innerText = phone;

  // Update avatar initials
  var initials = name.split(' ')
                     .map(word => word[0])
                     .join('')
                     .toUpperCase()
                     .substring(0, 2);

  document.querySelector('.avatar').innerText = initials;

  msg.innerHTML = '<div class="alert success">All saved! 🎉</div>';

  // Auto switch back to profile after 1 second
  setTimeout(() => {
    show('view', document.querySelectorAll('.sidebar button')[0]);
  }, 1000);
}
  function savePassword() {
  var oldPw = document.querySelector('#panel-security input[type="password"]').value;
  var pw1 = document.getElementById('pw1').value;
  var pw2 = document.getElementById('pw2').value;
  var msg = document.getElementById('pw-msg');

  if (oldPw !== currentPassword) {
    msg.innerHTML = '<div class="alert error">Current password is wrong.</div>';
    return;
  }

  if (pw1.length < 8) {
    msg.innerHTML = '<div class="alert error">Password needs at least 8 characters.</div>';
    return;
  }

  if (pw1 !== pw2) {
    msg.innerHTML = '<div class="alert error">Passwords don\'t match!</div>';
    return;
  }

  currentPassword = pw1;

  msg.innerHTML = '<div class="alert success">Password updated! 🔐</div>';

  document.getElementById('pw1').value = "";
  document.getElementById('pw2').value = "";
  document.querySelector('#panel-security input[type="password"]').value = "";
   g.innerHTML = '<div class="alert success">Password updated! 🔐</div>';
  }  
</script>

</body>
</html>