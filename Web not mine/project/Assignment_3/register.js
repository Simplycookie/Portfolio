// register.js - 真正的注册逻辑
document.addEventListener('DOMContentLoaded', function() {
    const registrationForm = document.getElementById('registrationForm');
    const successMessage = document.getElementById('successMessage');

    registrationForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // 获取表单值
        const fullName = document.getElementById('fullName').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        // 获取其他字段（可选）
        const affiliation = document.getElementById('affiliation').value;
        const studentId = document.getElementById('studentId').value.trim();
        const faculty = document.getElementById('faculty').value;
        const course = document.getElementById('course').value;

        // 获取复选框状态
        const ageCheck = document.getElementById('ageCheck').checked;
        const guardianCheck = document.getElementById('guardianCheck').checked;
        const discordCheck = document.getElementById('discordCheck').checked;

        // 清除之前的错误消息
        clearErrors();

        let isValid = true;

        // 验证必填字段
        if (!fullName) {
            showError('fullName', 'Full name is required');
            isValid = false;
        }

        if (!email) {
            showError('email', 'Email address is required');
            isValid = false;
        } else if (!isValidEmail(email)) {
            showError('email', 'Please enter a valid email address');
            isValid = false;
        }

        if (!phone) {
            showError('phone', 'Phone number is required');
            isValid = false;
        }

        if (!password) {
            showError('password', 'Password is required');
            isValid = false;
        } else if (password.length < 8) {
            showError('password', 'Password must be at least 8 characters');
            isValid = false;
        } else if (!/[A-Za-z]/.test(password) || !/\d/.test(password)) {
            showError('password', 'Password must contain both letters and numbers');
            isValid = false;
        }

        if (!confirmPassword) {
            showError('confirmPassword', 'Please confirm your password');
            isValid = false;
        } else if (password !== confirmPassword) {
            showError('confirmPassword', 'Passwords do not match');
            isValid = false;
        }

        // 验证条款
        if (!ageCheck && !guardianCheck) {
            showError('termsError', 'You must be 18+ OR have guardian consent');
            isValid = false;
        }

        if (!discordCheck) {
            showError('termsError', 'You must join the Discord server to register');
            isValid = false;
        }

        // 如果验证通过，保存用户数据
        if (isValid) {
            // 从localStorage获取现有用户
            const users = JSON.parse(localStorage.getItem('users') || '[]');

            // 检查邮箱是否已被注册
            const emailExists = users.some(user => user.email === email);
            if (emailExists) {
                showError('email', 'This email is already registered');
                return;
            }

            // 创建新用户对象
            const newUser = {
                id: Date.now(), // 简单ID生成
                fullName: fullName,
                email: email,
                phone: phone,
                password: password, // 注意：实际项目中密码应该加密
                affiliation: affiliation,
                studentId: studentId,
                faculty: faculty,
                course: course,
                registrationDate: new Date().toISOString(),
                hasGuardianConsent: guardianCheck
            };

            // 添加到用户列表
            users.push(newUser);
            localStorage.setItem('users', JSON.stringify(users));

            // 显示成功消息
            registrationForm.style.display = 'none';
            successMessage.style.display = 'block';

            // 注册成功后，尝试更新右上角按钮状态
            setTimeout(() => {
                // 尝试调用更新认证按钮的函数
                if (typeof updateAuthButton === 'function') {
                    updateAuthButton();
                }

                // 也可以重新加载auth脚本
                const authScript = document.querySelector('script[src*="auth-state"]');
                if (authScript) {
                    const newScript = document.createElement('script');
                    newScript.src = 'auth-state.js';
                    document.body.appendChild(newScript);
                }
            }, 500);

            // 自动跳转到登录页面 - 使用正确的文件名
            setTimeout(() => {
                window.location.href = 'loginpage.html'; // 已修改为 loginpage.html
            }, 3000);
        }
    });

    // 辅助函数
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        if (!field) {
            // 对于termsError，它可能是一个单独的div
            const errorDiv = document.getElementById(fieldId) || document.createElement('div');
            errorDiv.id = fieldId;
            errorDiv.className = 'error-message';
            errorDiv.textContent = message;

            // 如果是termsError，插入到合适的位置
            if (fieldId === 'termsError') {
                const lastCheckbox = document.querySelector('.checkbox-group:last-of-type');
                if (lastCheckbox) {
                    lastCheckbox.parentNode.insertBefore(errorDiv, lastCheckbox.nextSibling);
                }
            }
            return;
        }

        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;

        // 在输入框后插入错误消息
        if (field.parentNode) {
            field.parentNode.appendChild(errorDiv);
        }
    }

    function clearErrors() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(error => error.remove());
    }
});