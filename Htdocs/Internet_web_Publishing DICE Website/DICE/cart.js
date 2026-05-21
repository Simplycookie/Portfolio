document.addEventListener('DOMContentLoaded', function() {

    const cartModal = document.getElementById('cartModal');
    const cartOverlay = document.getElementById('cartOverlay');
    const cartIconBtn = document.getElementById('cartIconBtn');
    const closeCart = document.getElementById('closeCart');
    const cartItemsContainer = document.getElementById('cartItemsContainer');
    const cartEmpty = document.getElementById('cartEmpty');
    const cartSummary = document.getElementById('cartSummary');
    const cartCount = document.getElementById('cartCount');
    const cartSubtotal = document.getElementById('cartSubtotal');
    const cartFee = document.getElementById('cartFee');
    const cartTotal = document.getElementById('cartTotal');

    // Data of shoping cart
    let cart = JSON.parse(localStorage.getItem('cart')) || [];


    updateCartDisplay();
    updateCartCount();

    // Button to open shooping cart
    if (cartIconBtn) {
        cartIconBtn.addEventListener('click', openCart);
    }
    if (closeCart) {
        closeCart.addEventListener('click', closeCartModal);
    }
    if (cartOverlay) {
        cartOverlay.addEventListener('click', closeCartModal);
    }

    // closing shopping cart
    function closeCartModal() {
        if (cartModal) cartModal.classList.remove('active');
        if (cartOverlay) cartOverlay.classList.remove('active');
    }

    // OPEN SHOPPING CART
    function openCart() {
        if (cartModal) cartModal.classList.add('active');
        if (cartOverlay) cartOverlay.classList.add('active');
    }

    // UPDATE CART DISPLAY
    function updateCartDisplay() {
        // 确保DOM元素存在
        if (!cartItemsContainer || !cartEmpty || !cartSummary) return;

        // CLEAR CART ITEMS
        cartItemsContainer.innerHTML = '';

        if (cart.length === 0) {
            // LET SHOOPING CART BE EMPTY
            cartEmpty.style.display = 'block';
            cartSummary.style.display = 'none';
        } else {
            // ITEM DISPLAY 
            cartEmpty.style.display = 'none';
            cartSummary.style.display = 'block';
            let subtotal = 0;

            // ADD ITEMS TO CART DISPLAY
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;

                const cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.innerHTML = `
                    <img src="${item.image}" alt="${item.title}" class="cart-item-image">
                    <div class="cart-item-details">
                        <h4 class="cart-item-title">${item.title}</h4>
                        <p class="cart-item-date">${item.date}</p>
                        <p class="cart-item-price">RM ${item.price.toFixed(2)}</p>
                        <div class="cart-item-controls">
                            <button class="quantity-btn" onclick="updateQuantity('${item.id}', -1)">-</button>
                            <span class="quantity">${item.quantity}</span>
                            <button class="quantity-btn" onclick="updateQuantity('${item.id}', 1)">+</button>
                            <button class="remove-item" onclick="removeFromCart('${item.id}')">Remove</button>
                        </div>
                    </div>
                `;

                cartItemsContainer.appendChild(cartItem);
            });

            // CALCULATE
            const fee = 5.00; // 固定服务费
            const total = subtotal + fee;

            // TOTALIZE
            if (cartSubtotal) cartSubtotal.textContent = `RM ${subtotal.toFixed(2)}`;
            if (cartFee) cartFee.textContent = `RM ${fee.toFixed(2)}`;
            if (cartTotal) cartTotal.textContent = `RM ${total.toFixed(2)}`;
        }
    }

    // UPDATE CART COUNT
    function updateCartCount() {
        if (!cartCount) return;

        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        cartCount.textContent = totalItems;

        // IF NO ITEMS, HIDE COUNT
        if (totalItems === 0) {
            cartCount.style.display = 'none';
        } else {
            cartCount.style.display = 'flex';
        }
    }

    // SHOW NOTIFICATION
    function showNotification(message) {

        const notification = document.createElement('div');
        notification.className = 'cart-notification';
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 80px;
            right: 20px;
            background: linear-gradient(145deg, #272727, #1C1C1C);
            color: #FAFDFF;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            z-index: 1002;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transform: translateX(120%);
            transition: transform 0.3s ease-out;
        `;

        document.body.appendChild(notification);

        // SHOW NOTIFICATION
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 10);

        // 3 SECONDS LATER, HIDE NOTIFICATION
        setTimeout(() => {
            notification.style.transform = 'translateX(120%)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // ADD EVENT TO CART
    window.addToCart = function(eventId, eventTitle, eventDate, eventPrice, eventImage) {
        // 检查是否已存在
        const existingItem = cart.find(item => item.id === eventId);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({
                id: eventId,
                title: eventTitle,
                date: eventDate,
                price: eventPrice,
                image: eventImage || 'images/event-default.jpg',
                quantity: 1
            });
        }

        // ADD TO LOCAL STORAGE
        localStorage.setItem('cart', JSON.stringify(cart));

        // UPDATE DISPLAY
        updateCartDisplay();
        updateCartCount();

        // ADD SUCCESSFUL
        showNotification(`Added "${eventTitle}" to cart`);

        // AUTO OPEN CART
        openCart();
    };

    // UPDATE QUANTITY
    window.updateQuantity = function(eventId, change) {
        const item = cart.find(item => item.id === eventId);

        if (item) {
            item.quantity += change;

            if (item.quantity <= 0) {
                cart = cart.filter(item => item.id !== eventId);
            }


            localStorage.setItem('cart', JSON.stringify(cart));


            updateCartDisplay();
            updateCartCount();
        }
    };

    // DELETE ITEM FROM CART
    window.removeFromCart = function(eventId) {
        cart = cart.filter(item => item.id !== eventId);

        /
        localStorage.setItem('cart', JSON.stringify(cart));

        // 
        updateCartDisplay();
        updateCartCount();

        // 
        showNotification('Item removed from cart');
    };
});
window.updateCartCount = updateCartCount;