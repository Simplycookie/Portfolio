<?php include("Base.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICE Club Registration</title>
    <link rel="stylesheet" href="global.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap" rel="stylesheet">
    
    <style>
        /* 密码小眼睛 */

        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-wrapper input {
            width: 100%;
            padding-right: 45px;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #272727;
            font-size: 1.2rem;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: #000;
        }

        .password-toggle i {
            pointer-events: none;
        }

        .password-hint {
            color: #666;
            font-size: 0.8rem;
            margin-top: 5px;
            font-style: italic;
        }

        /* ----- 单选按钮组（年龄二选一）----- */

        .radio-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .radio-group input[type="radio"] {
            width: 18px;
            height: 18px;
            margin: 0;
            accent-color: #272727;
            flex-shrink: 0;
            cursor: pointer;
        }

        .radio-group label {
            color: #1C1C1C;
            font-size: 0.95rem;
            line-height: 1.5;
            word-break: break-word;
            flex: 1;
            cursor: pointer;
        }

        /* ----- 复选框（Discord）----- */

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin: 0;
            accent-color: #272727;
            flex-shrink: 0;
            cursor: pointer;
        }

        .checkbox-group label {
            color: #1C1C1C;
            font-size: 0.95rem;
            line-height: 1.5;
            word-break: break-word;
            flex: 1;
            cursor: pointer;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #272727;
            color: #FAFDFF;
            border: none;
            border-radius: 6px;
            font-family: 'Texturina', serif;
            font-size: 1.4rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            background: #B4B6B9;
            color: #272727;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #1C1C1C;
        }

        .login-link a {
            color: #272727;
            font-weight: 600;
            text-decoration: underline;
        }

        .success-message {
            background: rgba(39, 39, 39, 0.95);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            color: #FAFDFF;
            margin-top: 30px;
        }

        .btn-success {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: #B4B6B9;
            color: #272727;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        @media (max-width: 600px) {
            .registration-container {
                max-width: 100% !important;
                margin: 20px;
                padding: 30px 20px;
            }

            .form-header h1 {
                font-size: 1.8rem;
            }

            .radio-group,
            .checkbox-group {
                gap: 8px;
                margin-bottom: 16px;
            }
        }
    </style>
</head>

<body>

    <main class="login-container">
        <h1>DICE Club Registration</h1>
            <div class="login-description">
                Join us and become one of our members of D.I.C.E!
            </div>
            

            <h2 class="section-title">Personal Information</h2>

            <form id="loginForm" method="POST" action="Insert_user.php" target="_blank">
                <!-- 姓名 -->
                <div class="form-group">
                    <label for="fullName">Full Name *</label>
                    <input type="text" id="fullName" name="fullName" placeholder="John Doe" required>
                    <div class="error-message" id="nameError"></div>
                </div>

                <!-- 邮箱 -->
                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" placeholder="johndoe@gmail.com" required>
                    <div class="error-message" id="emailError"></div>
                </div>

                <!-- 电话 -->
                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="tel" id="phone" name="phone" placeholder="+60 12 345 6789" required>
                    <div class="error-message" id="phoneError"></div>
                </div>

                <!-- 密码 + 小眼睛 -->
                <div class="form-group">
                    <label for="password">Password *</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" placeholder="8 alphanumerical characters"
                            required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
                            title="At least 8 characters with letters and numbers">
                        <button type="button" class="password-toggle" data-target="password">
                            <i class="fa-regular fa-eye-slash"></i>
                        </button>
                    </div>
                    <div class="password-hint">Minimum 8 characters, including letters and numbers</div>
                    <div class="error-message" id="passwordError"></div>
                </div>

                <!-- 确认密码 + 小眼睛 -->
                <div class="form-group">
                    <label for="confirmPassword">Re-Enter Password *</label>
                    <div class="password-wrapper">
                        <input type="password" id="confirmPassword" name="confirmPassword"
                            placeholder="Re-enter your password" required>
                        <button type="button" class="password-toggle" data-target="confirmPassword">
                            <i class="fa-regular fa-eye-slash"></i>
                        </button>
                    </div>
                    <div class="error-message" id="confirmPasswordError"></div>
                </div>

                <!-- ========== 年龄二选一（单选按钮）= 互斥 ========= -->
                <div class="radio-group">
                    <input type="radio" id="ageAbove" name="ageConsent" value="1" required>
                    <label for="ageAbove">I am 18 years old and above</label>
                </div>
                <div class="radio-group">
                    <input type="radio" id="ageBelow" name="ageConsent" value="0">
                    <label for="ageBelow">I am below the age of 18, and the consent form has been completed by my
                        guardian</label>
                </div>

                <!-- Discord 复选框（必选） -->
                <div class="checkbox-group">
                    <input type="checkbox" id="discordCheck" name="discordCheck" required>
                    <label for="discordCheck">I have joined the D.I.C.E. MMU Discord server</label>
                </div>

                <!-- 统一的错误提示区 -->
                <div class="error-message" id="termsError"></div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit" name="submit-btn" id="submit-btn">Register</button>
                </div>
                <input type="hidden" id="ID" name="ID" value="-1">
                <input type="hidden" id="regdate" name="regdate" value="-1">
                <input type="hidden" id="hasGuardianConsent" name="hasGuardianConsent" value="">
            </form>
            <div id="response"></div>

            <!-- 注册成功提示 -->
            <div id="successMessage" class="success-message" style="display: none;">
                <h3>Registration Successful! 🎉</h3>
                <p>Welcome to D.I.C.E.! Your account has been created successfully.</p>
                <a href="loginpage.html" class="btn-success">Proceed to Login</a>
            </div>
            <div class="extras">
                <a class="extra-btn" href="loginpage.php">Already have an account? Log In here</a>
            </div>
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

    <!-- ========== 纯原生注册逻辑 ========== -->


    <script>

        "use strict";

        // 密码可见性切换
        function initPasswordToggle() {
            document.querySelectorAll('.password-toggle').forEach(btn => {
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

        function clearErrors() {
            document.querySelectorAll('.error-message').forEach(el => el.innerHTML = '');
        }

        function showError(fieldId, message) {
            const el = document.getElementById(fieldId);
            if (el) el.innerHTML = message;
        }

        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function handleSubmit(e) {
            e.preventDefault();
            const fullName = document.getElementById('fullName').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            alert("hit")
            <?php
            echo "let user_email = [];\n";
            $result = mysqli_query($connect, "Select * From website_user");
            while ($row = mysqli_fetch_assoc($result)) {
                $email = $row["User_Email"];
                echo "\t\t\t\tuser_email.push('$email');\n";
            }
            ?>



            // 年龄单选：是否选中了任意一项？
            const ageSelected = document.querySelector('input[name="ageConsent"]:checked');
            // Discord 复选框
            const discordChecked = document.getElementById('discordCheck').checked;

            clearErrors();

            let isValid = true;

            if (!fullName) {
                showError('nameError', 'Full name is required');
                isValid = false;
            }
            if (!email) {
                showError('emailError', 'Email address is required');
                isValid = false;
            } else if (!isValidEmail(email)) {
                showError('emailError', 'Please enter a valid email address');
                isValid = false;
            }
            if (!phone) {
                showError('phoneError', 'Phone number is required');
                isValid = false;
            }
            if (!password) {
                showError('passwordError', 'Password is required');
                isValid = false;
            } else if (password.length < 8) {
                showError('passwordError', 'Password must be at least 8 characters');
                isValid = false;
            } else if (!/[A-Za-z]/.test(password) || !/\d/.test(password)) {
                showError('passwordError', 'Password must contain both letters and numbers');
                isValid = false;
            }
            if (!confirmPassword) {
                showError('confirmPasswordError', 'Please confirm your password');
                isValid = false;
            } else if (password !== confirmPassword) {
                showError('confirmPasswordError', 'Passwords do not match');
                isValid = false;

            }

            // 年龄验证：必须二选一
            if (!ageSelected) {
                showError('termsError', 'Please select your age status (18+ or with guardian consent)');
                isValid = false;
            }
            // Discord 必须勾选
            if (!discordChecked) {
                showError('termsError', 'You must join the Discord server to register');
                isValid = false;
            }

            if (!isValid) return;

            /* 保存用户数据
            const users = JSON.parse(localStorage.getItem('users') || '[]');
            if (users.some(u => u.email === email)) {
                showError('emailError', 'This email is already registered');
                return;
            }*/
            let index = 0;
            while (index < user_email.length) {
                if (email == user_email[index]) {
                    showError('emailError', 'This email is already registered');
                    return;
                }
                index++;
            }


            alert("hit");
            let name = document.getElementById("fullName")
            openPostInNewTab('Insert_user.php', {
                fullName: fullName,
                email: email,
                phone: phone,
                password: password, // 实际应加密
                registrationDate: new Date().toISOString(),
                ageConsent: ageSelected.value === 'above18' ? 'above18' : 'below18',
                hasGuardianConsent: ageSelected.value === 'below18',
                discordJoined: true
            });
            end()
        }


        function end() {
            // 显示成功，隐藏表单
            document.getElementById('registrationForm').style.display = 'none';
            document.getElementById('successMessage').style.display = 'block';

            // 3秒后跳转登录页
            setTimeout(() => {
                window.location.href = 'loginpage.html';
            }, 3000);
        }

        function init() {
            initPasswordToggle();
            const form = document.getElementById('registrationForm');
            const butn = document.getElementById('submit-btn');
            form.addEventListener('submit', handleSubmit);
            butn.addEventListener('submit', handleSubmit)
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
        } else {
            init();
        }

        function openPostInNewTab(url, data) {
            // Create a form element
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = url;
            form.target = '_blank'; // Open in new tab

            // Add hidden inputs for each data field
            for (const key in data) {
                if (Object.prototype.hasOwnProperty.call(data, key)) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key;
                    input.value = data[key];
                    form.appendChild(input);
                }
            }

            // Append form to body, submit, then remove
            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }
    </script>

    <script src="auth-state.js"></script>


</body>

</html>