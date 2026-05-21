<?php include("base.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICE Club - Website Login</title>
    <link rel="stylesheet" href="global.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <main class="login-container">
        <h1>Website Login</h1>
        <div class="login-description">
            Welcome to our D.I.C.E. Club website! Please sign in to manage your bookings and explore exclusive events.
        </div>

            <h2 class="section-title">Personal Information</h2>

            <form id="loginForm">
                <!-- Full Name (无小眼睛) -->
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" placeholder="John Doe">
                    <div class="error-message" id="nameError"></div>
                </div>

                <!-- Email Address (无小眼睛) -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="johndoe@gmail.com">
                    <div class="error-message" id="emailError"></div>
                </div>

                <!-- Password + 小眼睛 -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" placeholder="8 alphanumerical characters">
                        <button type="button" class="password-toggle" data-target="password">
                            <i class="fa-regular fa-eye-slash"></i>
                        </button>
                    </div>
                    <div class="error-message" id="passwordError"></div>
                </div>

                <div class="error-message" id="formError"></div>

                <button type="submit" class="btn-signin">Sign-In</button>
            </form>
            <div class="extras">
                <a class="extra-btn" href="registerrpage.php">Don't have an account? Register here</a>
            </div>
    </main>
    <div class="extras">
        <a class="extra-btn2" href="index.php">Return to Home</a>
    </div>

    <footer class="footer2">
        <p>&copy; 2026 D.I.C.E. MMU | Dive into Imagination for Creative Entertainment</p>
        <div class="social-links">
            <a href="#">Instagram</a> |
            <a href="#">Discord</a> |
            <a href="#">Email</a>
        </div>
    </footer>

    <!-- ========== 密码可见性切换 + 登录验证 ========== -->
    <script>
        (function () {
            "use strict";

            // ----- 小眼睛切换（独立函数，保证登录页可用）-----
            function initPasswordToggle() {
                const toggles = document.querySelectorAll('.password-toggle');
                toggles.forEach(btn => {
                    btn.addEventListener('click', function (e) {
                        e.preventDefault();
                        const targetId = this.getAttribute('data-target');
                        const input = document.getElementById(targetId);
                        if (!input) return;
                        const icon = this.querySelector('i');
                        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                        input.setAttribute('type', type);
                        if (icon) {
                            if (type === 'text') {
                                icon.classList.remove('fa-eye-slash');
                                icon.classList.add('fa-eye');
                            } else {
                                icon.classList.remove('fa-eye');
                                icon.classList.add('fa-eye-slash');
                            }
                        }
                    });
                });
            }

            // ----- 邮箱验证 -----
            function isValidEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }

            function clearErrors() {
                document.querySelectorAll('.error-message').forEach(el => el.innerHTML = '');
            }

            function showError(fieldId, message) {
                const el = document.getElementById(fieldId);
                if (el) el.innerHTML = message;
            }

            // ----- 表单提交 -----
            const loginForm = document.getElementById('loginForm');
            if (loginForm) {
                loginForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const email = document.getElementById('email').value.trim();
                    const password = document.getElementById('password').value;

                    clearErrors();

                    let isValid = true;

                    if (!email) {
                        showError('emailError', 'Email address is required');
                        isValid = false;
                    } else if (!isValidEmail(email)) {
                        showError('emailError', 'Please enter a valid email address');
                        isValid = false;
                    }

                    if (!password) {
                        showError('passwordError', 'Password is required');
                        isValid = false;
                    }

                    if (!isValid) return;
                    let tempuser = [[], [], [], []];
                    <?php
                    $result = mysqli_query($connect, "Select * From website_user");
                    while ($row = mysqli_fetch_assoc($result)) {
                        $email = $row["User_Email"];
                        $password = $row["User_Password"];
                        $id = $row["User_ID"];
                        $fullname = $row["User_Name"];
                        echo "\n\t\t\t\t\ttempuser[0].push('$email');\n";
                        echo "\t\t\t\t\ttempuser[1].push('$password');\n";
                        echo "\t\t\t\t\ttempuser[2].push('$id');\n";
                        echo "\t\t\t\t\ttempuser[3].push('$fullname');\n";
                        echo "\t\t\t\t\ttempuser[4].push('$number');\n";
                    }
                    ?>
                    let index = 0;
                    let matchedUser = false;
                    while (index < tempuser[0].length) {
                        if (tempuser[0][index] == email && tempuser[1][index] == password) {
                            matchedUser = {
                                fullname: tempuser[3][index],
                                email: tempuser[0][index],
                                id: tempuser[2][index],
                                password: tempuser[1][index]
                                phone: tempuser[4][index]

                            }
                            break;
                        }
                        index++;
                    }
                    if (matchedUser != false) {
                        localStorage.setItem('currentUser', JSON.stringify({
                            fullName: matchedUser.fullName,
                            email: matchedUser.email,
                            id: matchedUser.id
                        }));

                        alert('Login successful! Redirecting to homepage...');
                        window.location.href = 'index.php';
                    } else {
                        showError('formError', 'Invalid email or password.');
                    }
                });
            }

            // 初始化小眼睛
            initPasswordToggle();
        })();
    </script>

    <script src="auth-state.js"></script>
</body>

</html>