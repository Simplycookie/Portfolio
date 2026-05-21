document.addEventListener('DOMContentLoaded', updateAuthButton);

function updateAuthButton() {
    const container = document.getElementById('authStateButton');
    if (!container) return;
    const users = JSON.parse(localStorage.getItem('users') || '[]');
    const currentUser = JSON.parse(localStorage.getItem('currentUser') || 'null');
    let html = '',
        cls = '',
        href = '';

    if (currentUser && users.some(u => u.email === currentUser.email)) {
        const initial = currentUser.fullName ? currentUser.fullName.charAt(0).toUpperCase() : 'U';
        html = `<div class="avatar-dropdown">
                    <div class="avatar-icon">${initial}</div>
                    <div class="dropdown-content">
                        <div class="user-info"><strong>${currentUser.fullName || 'User'}</strong></div>
                        <a href="dashboard.php?id=${currentUser.id || 0}">Dashboard</a>
                        <a href="#" id="logoutBtn">Logout</a>
                    </div>
                </div>`;
        cls = 'auth-btn avatar-state';
    } else if (users.length > 0) {
        cls = 'auth-btn';
        html = 'Login';
        href = 'loginpage.php';
    } else {
        cls = 'auth-btn';
        html = 'Login';
        href = 'loginpage.php';
    }
    container.innerHTML = `<a href="${href}" class="${cls}">${html}</a>`;
}


function logout() {
    localStorage.removeItem('currentUser');
    window.location.href = 'index.php';
};

// 
document.addEventListener('click', function(e) {
    if (e.target.id === 'logoutBtn' || e.target.closest('#logoutBtn')) {
        e.preventDefault();
        logout();
    }
});