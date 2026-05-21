// Main JavaScript for basketball events website

// Form validation for registration
function validateRegistrationForm() {
    const form = document.getElementById('registration-form');
    if (form) {
        form.addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                event.preventDefault();
                return false;
            }
            
            // Additional validation can be added here
            return true;
        });
    }
}

// Form validation for login
function validateLoginForm() {
    const form = document.getElementById('login-form');
    if (form) {
        form.addEventListener('submit', function(event) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            if (!email || !password) {
                alert('Please fill in all required fields');
                event.preventDefault();
                return false;
            }
            
            // In a real application, you would validate credentials with server
            // For this project, we'll use a simple check
            if (email === 'admin@hoopshub.com' && password === 'admin123') {
                // Redirect to admin dashboard
                window.location.href = 'admin-dashboard.html';
                event.preventDefault();
            } else if (email && password) {
                // Redirect to user dashboard for regular users
                window.location.href = 'user-dashboard.html';
                event.preventDefault();
            }
            
            return true;
        });
    }
}

// Shopping cart functionality
let cart = [];

function addToCart(eventId, eventName, price) {
    const item = {
        id: eventId,
        name: eventName,
        price: price,
        quantity: 1
    };
    
    // Check if item already exists in cart
    const existingItem = cart.find(item => item.id === eventId);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push(item);
    }
    
    updateCartDisplay();
    saveCartToLocalStorage();
    alert(`${eventName} added to cart!`);
}

function updateCartDisplay() {
    const cartCount = document.getElementById('cart-count');
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    
    if (cartCount) {
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        cartCount.textContent = totalItems;
    }
    
    if (cartItems && cartTotal) {
        cartItems.innerHTML = '';
        let total = 0;
        
        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.name}</td>
                <td>$${item.price.toFixed(2)}</td>
                <td>
                    <button onclick="updateQuantity(${item.id}, -1)">-</button>
                    ${item.quantity}
                    <button onclick="updateQuantity(${item.id}, 1)">+</button>
                </td>
                <td>$${itemTotal.toFixed(2)}</td>
                <td><button onclick="removeFromCart(${item.id})" class="btn-remove">Remove</button></td>
            `;
            cartItems.appendChild(row);
        });
        
        cartTotal.textContent = `$${total.toFixed(2)}`;
    }
}

function updateQuantity(itemId, change) {
    const item = cart.find(item => item.id === itemId);
    if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
            removeFromCart(itemId);
        } else {
            updateCartDisplay();
            saveCartToLocalStorage();
        }
    }
}

function removeFromCart(itemId) {
    cart = cart.filter(item => item.id !== itemId);
    updateCartDisplay();
    saveCartToLocalStorage();
}

function saveCartToLocalStorage() {
    localStorage.setItem('basketballCart', JSON.stringify(cart));
}

function loadCartFromLocalStorage() {
    const savedCart = localStorage.getItem('basketballCart');
    if (savedCart) {
        cart = JSON.parse(savedCart);
        updateCartDisplay();
    }
}

// Event countdown timer
function startCountdown(endDate, elementId) {
    const countdownElement = document.getElementById(elementId);
    if (!countdownElement) return;
    
    function updateCountdown() {
        const now = new Date().getTime();
        const distance = endDate - now;
        
        if (distance < 0) {
            countdownElement.innerHTML = "Event has started!";
            return;
        }
        
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        countdownElement.innerHTML = `
            <div class="countdown-item">
                <span class="countdown-number">${days}</span>
                <span class="countdown-label">Days</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number">${hours}</span>
                <span class="countdown-label">Hours</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number">${minutes}</span>
                <span class="countdown-label">Minutes</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number">${seconds}</span>
                <span class="countdown-label">Seconds</span>
            </div>
        `;
    }
    
    updateCountdown();
    setInterval(updateCountdown, 1000);
}

// Initialize functions when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize form validations
    validateRegistrationForm();
    validateLoginForm();
    
    // Load cart from local storage
    loadCartFromLocalStorage();
    
    // Set up countdown timers for events
    const event1Date = new Date('March 15, 2026 09:00:00').getTime();
    startCountdown(event1Date, 'countdown-1');
    
    const event2Date = new Date('April 1, 2026 10:00:00').getTime();
    startCountdown(event2Date, 'countdown-2');
    
    // Setup event booking buttons
    document.querySelectorAll('.book-event-btn').forEach(button => {
        button.addEventListener('click', function() {
            const eventId = this.getAttribute('data-event-id');
            const eventName = this.getAttribute('data-event-name');
            const eventPrice = parseFloat(this.getAttribute('data-event-price'));
            addToCart(eventId, eventName, eventPrice);
        });
    });
    
    // Contact form submission
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });
    }
    
    // Feedback form submission
    const feedbackForm = document.getElementById('feedback-form');
    if (feedbackForm) {
        feedbackForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Get rating
            const rating = document.querySelector('input[name="rating"]:checked');
            if (!rating) {
                alert('Please select a rating');
                return;
            }
            
            alert('Thank you for your feedback!');
            this.reset();
        });
    }
});