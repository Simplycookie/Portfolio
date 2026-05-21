document.addEventListener('DOMContentLoaded', function() {
            const currentUser = JSON.parse(localStorage.getItem('currentUser'));
            if (!currentUser) { window.location.href = 'loginpage.html'; return; }

            const users = JSON.parse(localStorage.getItem('users')) || [];
            const user = users.find(u => u.email === currentUser.email) || {};
            const profileHtml = `<div class="profile-card">
        <h3>${user.fullName || 'User'}</h3>
        <p>Email: ${user.email}</p>
        <p>Phone: ${user.phone || 'Not provided'}</p>
    </div>`;
            document.getElementById('profileCard').innerHTML = profileHtml;

            const orders = JSON.parse(localStorage.getItem('orders')) || [];
            const myOrders = orders.filter(o => o.userEmail === currentUser.email);
            const bookingsDiv = document.getElementById('bookingsList');
            if (myOrders.length === 0) {
                bookingsDiv.innerHTML = '<p>No bookings yet.</p>';
            } else {
                let html = '';
                myOrders.forEach(order => {
                            html += `<div class="booking-item">
                <strong>${order.eventName}</strong> - ${order.eventDate}<br>
                Pax: ${order.pax} | Total: RM ${order.total.toFixed(2)}<br>
                Status: <span class="status-${order.status}">${order.status}</span>
                ${order.status === 'pending' ? `<a href="payment.html?order=${order.id}" class="btn-pay">Pay Now</a>` : ''}
            </div>`;
        });
        bookingsDiv.innerHTML = html;
    }
});