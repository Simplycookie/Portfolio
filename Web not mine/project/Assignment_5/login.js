// login.js - 保留姓名字段，但不参与验证
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    if (!loginForm) return;

    // 检查是否有"记住我"的保存信息
    const rememberedEmail = localStorage.getItem('rememberedEmail');
    if (rememberedEmail) {
        const emailInput = document.getElementById('loginEmail');
        const rememberCheckbox = document.getElementById('rememberMe');
        if (emailInput) emailInput.value = rememberedEmail;
        if (rememberCheckbox) rememberCheckbox.checked = true;
    }

    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // 获取表单值
        const loginName = document.getElementById('loginName').value.trim(); // 保留但不使用
        const loginEmail = document.getElementById('loginEmail').value.trim();
        const password = document.getElementById('loginPassword').value;
        const rememberMe = document.getElementById('rememberMe').checked;

        // 清除之前的错误消息
        clearErrors();

        let isValid = true;

        // 只验证邮箱和密码，不验证姓名
        if (!loginEmail) {
            showError('loginEmail', 'Email address is required');
            isValid = false;
        } else if (!isValidEmail(loginEmail)) {
            showError('loginEmail', 'Please enter a valid email address');
            isValid = false;
        }

        if (!password) {
            showError('loginPassword', 'Password is required');
            isValid = false;
        }

        if (isValid) {
            // 从localStorage获取用户数据
            const users = JSON.parse(localStorage.getItem('users') || '[]');

            // 仅匹配邮箱和密码（姓名不参与认证）
            const matchedUser = users.find(user =>
                user.email === loginEmail && user.password === password
            );

            if (matchedUser) {
                // 保存当前用户信息到localStorage
                localStorage.setItem('currentUser', JSON.stringify({
                    fullName: matchedUser.fullName,
                    email: matchedUser.email,
                    id: matchedUser.id
                }));

                // 处理"记住我"选项
                if (rememberMe) {
                    localStorage.setItem('rememberedEmail', loginEmail);
                } else {
                    localStorage.removeItem('rememberedEmail');
                }

                // 显示成功消息
                showSuccessMessage();

                // 更新右上角按钮状态
                if (window.updateAuthButton) window.updateAuthButton();

                // 2秒后跳转到首页
                setTimeout(() => {
                    window.location.href = 'index.html';
                }, 2000);
            } else {
                showError('loginPassword', 'Invalid email or password.');
            }
        }
    });

    // 辅助函数
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        if (field && field.parentNode) {
            const errorDiv = document.createElement('div');
            errorDiv.className = 'error-message';
            errorDiv.textContent = message;
            field.parentNode.appendChild(errorDiv);
        }
    }

    function showSuccessMessage() {
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.id = 'loginSuccess';
        successDiv.innerHTML = `
            <h3>Login Successful!</h3>
            <p>Redirecting to homepage...</p>
        `;
        loginForm.parentNode.insertBefore(successDiv, loginForm.nextSibling);
        loginForm.style.display = 'none';
    }

    function clearErrors() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(error => error.remove());
        const successMsg = document.getElementById('loginSuccess');
        if (successMsg) successMsg.remove();
    }
});