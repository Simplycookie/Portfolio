// confirmation.js
document.addEventListener('DOMContentLoaded', function() {
    // 1. 从 URL 获取 orderId
    const urlParams = new URLSearchParams(window.location.search);
    const orderId = urlParams.get('orderId');

    if (!orderId) {
        // 无订单 ID，尝试取最新订单
        const orders = JSON.parse(localStorage.getItem('orders') || '[]');
        if (orders.length > 0) {
            const latestOrder = orders[orders.length - 1];
            displayOrderDetails(latestOrder);
        } else {
            document.getElementById('orderDetails').innerHTML = '<p>No order information found. Please check your <a href="member-dashboard.html">dashboard</a>.</p>';
        }
        return;
    }

    // 2. 根据 orderId 查找订单
    const orders = JSON.parse(localStorage.getItem('orders') || '[]');
    const order = orders.find(o => o.id === orderId);

    if (order) {
        displayOrderDetails(order);
    } else {
        document.getElementById('orderDetails').innerHTML = '<p>Order not found. Please check your <a href="member-dashboard.html">dashboard</a>.</p>';
    }

    // 3. 渲染订单和客户信息
    function displayOrderDetails(order) {
        // 订单详情
        const orderHtml = `
            <div class="detail-row">
                <span class="detail-label">Order ID</span>
                <span class="detail-value">${order.id}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Event</span>
                <span class="detail-value">${order.eventName || 'DICE Event'}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Date</span>
                <span class="detail-value">${formatDate(order.eventDate) || 'TBA'}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Attendees</span>
                <span class="detail-value">${order.pax || 1} ${order.pax > 1 ? 'people' : 'person'}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Total Paid</span>
                <span class="detail-value highlight">RM ${(order.total || 0).toFixed(2)}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Status</span>
                <span class="detail-value" style="color: #2ecc71;">${order.status === 'paid' ? 'Paid' : 'Pending'}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Payment Ref</span>
                <span class="detail-value">${order.paymentReference || 'N/A'}</span>
            </div>
        `;
        document.getElementById('orderDetails').innerHTML = orderHtml;

        // 客户信息（优先使用订单中保存的 user 字段）
        if (order.user) {
            const customerHtml = `
                <div class="detail-row">
                    <span class="detail-label">Full Name</span>
                    <span class="detail-value">${order.user.fullName || 'N/A'}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">${order.user.email || 'N/A'}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Phone</span>
                    <span class="detail-value">${order.user.phone || 'N/A'}</span>
                </div>
            `;
            document.getElementById('customerDetails').innerHTML = customerHtml;
        } else {
            // 后备：从当前用户读取
            const currentUser = JSON.parse(localStorage.getItem('currentUser') || 'null');
            if (currentUser) {
                const users = JSON.parse(localStorage.getItem('users') || '[]');
                const userData = users.find(u => u.email === currentUser.email) || {};
                const customerHtml = `
                    <div class="detail-row">
                        <span class="detail-label">Full Name</span>
                        <span class="detail-value">${currentUser.fullName || userData.fullName || 'N/A'}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email</span>
                        <span class="detail-value">${currentUser.email || 'N/A'}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Phone</span>
                        <span class="detail-value">${userData.phone || 'N/A'}</span>
                    </div>
                `;
                document.getElementById('customerDetails').innerHTML = customerHtml;
            } else {
                document.getElementById('customerDetails').innerHTML = '<p>Customer information not available.</p>';
            }
        }
    }

    // 辅助函数：格式化日期
    function formatDate(dateStr) {
        if (!dateStr) return '';
        const date = new Date(dateStr);
        if (isNaN(date.getTime())) return dateStr;
        return date.toLocaleDateString('en-US', { day: 'numeric', month: 'long', year: 'numeric' });
    }

    // 更新购物车计数（保持导航栏一致）
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    const totalItems = cart.reduce((total, item) => total + (item.quantity || 0), 0);
    const cartCount = document.getElementById('cartCount');
    if (cartCount) {
        cartCount.textContent = totalItems;
        cartCount.style.display = totalItems > 0 ? 'flex' : 'none';
    }
});