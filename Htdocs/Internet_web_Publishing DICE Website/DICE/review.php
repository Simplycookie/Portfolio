<?php include("Base.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICE Club - Leave a Review</title>

    <!-- 引入CSS -->
    <link rel="stylesheet" href="global.css ">
    <link rel="stylesheet" href="review.css ">


    <!-- 引入Google字体 -->
    <link
        href="https://fonts.googleapis.com/css24?family=Texturina:wght@700&family=Josefin+Sans:wght@400;600&display=swap "
        rel="stylesheet ">

    <!-- 引入Font Awesome图标 -->
    <link rel="stylesheet " href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css ">

</head>

<body style="margin-top: 20px;">
    <!-- NAVIGATION -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="logo">D.I.C.E.</a>
            <div class="nav-links">
                <a href="index.php#about_us">About Us</a>
                <a href="index.php#featured_events">Events</a>
                <a href="index.php#dice_registration">Club Registration</a>
                <a href="contact.php">Contact Us</a>
                <p>|</p>
                <div id="authStateButton"></div>
            </div>
        </div>
    </nav>
    <!-- 评论页面主要内容 -->




    <main class="review-container ">
        <!-- 页面标题 -->
        <div class="page-header ">
            <h1>Share Your Experience</h1>
            <p>Help us improve by sharing your thoughts on the event you attended. Your feedback is valuable to
                us!</p>
        </div>
        <!-- 评论表单 -->
        <div class="review-form-container ">
            <!-- 活动选择 -->
            <div class="section-header ">
                <h2>Event Selection</h2>
                <p>Select the event you want to review from your attended events.</p>
            </div>
            <div class="form-group"><label for="eventSelect" style="color:#FAFDFF;">Select Event
                    *</label><select id="eventSelect" name="eventSelect" required>
                    <option value=" ">Choose an event...</option>
                    <option value="event1">DICE League,
                        2026</option>
                    <option value="event2">DICE Society,
                        2026</option>
                    <option value="event3">Boardgames Hangout,
                        2026</option>
                </select></div>
            <!-- STAR RATE -->
            <div class="rating-section ">
                <div class="rating-header ">
                    <h3>Rate Your Experience</h3>
                    <p>Please rate the following aspects of the event (1=Poor, 5=Excellent)</p>
                </div>
                <div class="rating-categories ">
                    <!-- CONTENT QUALITY -->
                    <div class="rating-category"><span class="category-title">Content Quality</span>
                        <div class="star-rating star-rating-normal" id="contentRating"><input type="radio"
                                id="content5" name="content" value="5"><label for="content5"
                                title="Excellent">★</label><input type="radio" id="content4" name="content"
        " value="4 "><label for="content4" title="Good">★</label><input type="radio" id="content3" name="content"
                                value="3"><label for="content3" title="Average">★</label><input type="radio"
                                id="content2 " name="content" value="2"><label for="content2"
                                title="Fair">★</label><input type="radio" id="content1" name="content"
                                value="1"><label for="content1" title="Poor">★</label></div>
                        <div class="rating-labels"><span>Poor</span><span>Excellent</span></div>
                    </div>
                    <!-- Speaker/Instructor-->
                    <div class="rating-category"><span class="category-title">Speaker/Instructor</span>
                        <div class="star-rating star-rating-normal" id="speakerRating"><input type="radio"
                                id="speaker5" name="speaker" value="5"><label for="speaker5"
                                title="Excellent">★</label><input type="radio" id="speaker4" name="speaker"
                                value="4"><label for="speaker4" title="Good">★</label><input type="radio" id="speaker3" name="speaker"
                                value="3"><label for="speaker3" title="Average">★</label><input type="radio"
                                id="speaker2" name="speaker" value="2"><label for="speaker2"
                                title="Fair ">★</label><input type="radio " id="speaker1 " name="speaker "
                                value="1 "><label for="speaker1 " title="Poor ">★</label></div>
                        <div class="rating-labels "><span>Poor</span><span>Excellent</span></div>
                    </div>
                    <!-- Event Organization-->
                    <div class="rating-category"><span class="category-title">Event Organization</span>
                        <div class="star-rating star-rating-normal" id="organizationRating"><input type="radio"
                                id="organization5" name="organization" value="5"><label for="organization5"
                                title="Excellent">★</label><input type="radio" id="organization4"
                                name="organization" value="4"><label for="organization4" title="Good">★</label>
                            <input type="radio" id="organization3" name="organization" value="3"><label
                                for="organization3" title="Average">★</label><input type="radio" id="organization2"
                                name="organization" value="2"><label for="organization2"
        " title="Fair ">★</label>
                            <input type="radio" id="organization1" name="organization" value="1"><label
                                for="organization1" title="Poor">★</label>
                        </div>
                        <div class="rating-labels"><span>Poor</span><span>Excellent</span></div>
                    </div>
                    <!-- Venue & Facilities-->
                    <div class="rating-category"><span class="category-title">Venue & Facilities</span>
                        <div class="star-rating star-rating-normal" id="venueRating"><input type="radio" id="venue5"
                                name="venue" value="5"><label for="venue5" title="Excellent">★</label><input
                                type="radio" id="venue4" name="venue"
        " value="4 "><label for="venue4" title="Good">★</label><input type="radio" id="venue3" name="venue"
                                value="3"><label for="venue3" title="Average">★</label><input type="radio"
                                id="venue2" name="venue" value="2"><label for="venue2" title="Fair">★</label><input
                                type="radio" id="venue1" name="venue" value="1">
                            <label for="venue1" title="Poor">★</label>
                        </div>
                        <div class="rating-labels"><span>Poor</span><span>Excellent</span></div>
                    </div>
                </div>
                <!-- OVERALL RATE -->
                <div class="overall-rating ">
                    <h3>Overall Rating</h3>
                    <div class="overall-stars" id="overallStars">★★★★★</div>
                    <div class="overall-score" id="overallScore">0.0</div>
                    <div class="overall-text" id="overallText">Based on your ratings</div>
                </div>
            </div>
            <!-- --COMMENRT SECTION -- -->
            <div class="section-header ">
                <h2>Your Review</h2>
                <p>Share your detailed thoughts and experience about the event.</p>
            </div>
            <div class="form-group "><label for="reviewTitle">Review Title*</label><input type="text"
                    id="reviewTitle" name="reviewTitle" placeholder="e.g., Amazing workshop with great instructors!"
                    required></div>
            <div class="form-group"><label for="reviewContent">Detailed Review *</label><textarea id="reviewContent"
                    name="reviewContent"
                    placeholder="Tell us about your experience. What did you like? What could be improved?"
                    required></textarea></div>
            <!-- PHOTO ULOAD -->
            <div class="photo-upload-section ">
                <div class="section-header ">
                    <h2>Share Photos (Optional)</h2>
                    <p>Upload photos from the event to share with others.</p>
                </div>
                <div class="upload-container" id="photoUploadContainer">
                    <div class="upload-icon">📷</div>
                    <div class="upload-title">Upload Event Photos</div>
                    <div class="upload-instructions">Drag & drop your photos here or click to browse </div>
                    <button class="btn-upload" id="browsePhotos ">Browse Photos</button>
                    <div class="file-size-limit">Max 5 photos, 5MB each</div>
                </div><input type="file" id="photoInput" accept="image/*" multiple style="display: none;">
                <!-- PHOTO PREVIEW -->
                <div class="photo-preview" id="photoPreview">
                </div>
            </div>
            <!-- RECCOMMMEND OPTION -->
            <div class="form-group "><label style="margin-bottom: 15px; ">Would you recommend this event to
                    others?
                    *</label>
                <div style="display: flex; gap: 30px; "><label
                        style="display: flex; align-items: center; color: #FAFDFF; cursor: pointer;"><input
                            type="radio" name="recommend" value="yes" style="margin-right: 10px;" required>Yes,
                        definitely! </label><label
                        style="display: flex; align-items: center; color: #FAFDFF; cursor: pointer; "><input
                            type="radio" name="recommend" value="maybe" style="margin-right: 10px;">Maybe
                    </label><label style="display: flex; align-items:
        center; color: #FAFDFF; cursor: pointer;"><input type="radio" name="recommend" value="no"
                            style="margin-right: 10px;">Probably not </label></div>
            </div>
            <!-- SUBMT BUTTON-->
            <div class="review-actions "><a href="member-dashboard.html" class="btn-cancel">Cancel</a><button
                    class="btn-submit-review" id="submitReview">Submit Review</button></div>
        </div>
    </main>
    <!-- CART OP UP-->
    <div class="cart-overlay " id="cartOverlay "></div>
    <div class="cart-modal " id="cartModal ">
        <div class="cart-header ">
            <h2>My Cart</h2><button class="close-cart " id="closeCart ">&times;
            </button>
        </div>
        <div class="cart-items-container " id="cartItemsContainer ">
            <!--  -->
            <div class="cart-empty " id="cartEmpty ">
                <p>Your cart is empty</p><a href="events.html " class="btn-view-cart ">Browse Events</a>
            </div>
        </div>
        <div class="cart-summary " id="cartSummary " style="display: none; ">
            <div class="summary-row "><span>Subtotal:</span><span id="cartSubtotal ">RM 0.00</span></div>
            <div class="summary-row "><span>Service Fee:</span><span id="cartFee ">RM 0.00</span></div>
            <div class="summary-row total "><span>Total:</span><span id="cartTotal ">RM 0.00</span></div>
            <div class="cart-actions "><a href="cart.html " class="btn-view-cart ">View Full Cart</a><a
                    href="checkout.html " class="btn-checkout ">Proceed to Checkout</a></div>
        </div>
    </div>

    <div class="extras">
        <a class="extra-btn2" href="index.php">Return to Home</a>
    </div>

    <footer class="footer2">
        <p>&copy; 2026 D.I.C.E. MMU | Dive into Imagination for Creative Entertainment</p>
        <div class="social-links">
            <a href="https://www.instagram.com/mmu.dice/">Instagram</a> |
            <a href="https://discord.com/invite/pw47jQh">Discord</a> |
            <a href="mailto:d.i.c.e.mmu.cyber@gmail.com">Email</a>
        </div>
    </footer>


    <!-- JavaScript -->
   <script>
document.addEventListener('DOMContentLoaded', function () {
    // 获取 DOM 元素
    const contentRating = document.getElementById('contentRating');
    const speakerRating = document.getElementById('speakerRating');
    const organizationRating = document.getElementById('organizationRating');
    const venueRating = document.getElementById('venueRating');
    const overallStars = document.getElementById('overallStars');
    const overallScore = document.getElementById('overallScore');
    const overallText = document.getElementById('overallText');
    const photoUploadContainer = document.getElementById('photoUploadContainer');
    const photoInput = document.getElementById('photoInput');
    const browsePhotos = document.getElementById('browsePhotos');
    const photoPreview = document.getElementById('photoPreview');
    const submitReviewBtn = document.getElementById('submitReview');
    const eventSelect = document.getElementById('eventSelect');
    const reviewTitle = document.getElementById('reviewTitle');
    const reviewContent = document.getElementById('reviewContent');

    // 初始化 ratings
    let ratings = {
        content: 0,
        speaker: 0,
        organization: 0,
        venue: 0
    };
    let uploadedPhotos = [];

    // 更新总体评分
    function updateOverallRating() {
        let total = 0;
        let count = 0;
        for (const category in ratings) {
            if (ratings[category] > 0) {
                total += ratings[category];
                count++;
            }
        }
        const average = count > 0 ? total / count : 0;
        overallScore.textContent = average.toFixed(1);
        
        const fullStars = Math.floor(average);
        const halfStar = average - fullStars >= 0.5;
        let starsHTML = '';
        for (let i = 1; i <= 5; i++) {
            if (i <= fullStars) {
                starsHTML += '★';
            } else if (i === fullStars + 1 && halfStar) {
                starsHTML += '★';
            } else {
                starsHTML += '☆';
            }
        }
        overallStars.innerHTML = starsHTML;

        if (average === 0) {
            overallText.textContent = 'Based on your ratings';
        } else if (average < 2) {
            overallText.textContent = 'Poor';
        } else if (average < 3) {
            overallText.textContent = 'Fair';
        } else if (average < 4) {
            overallText.textContent = 'Good';
        } else if (average < 4.5) {
            overallText.textContent = 'Very Good';
        } else {
            overallText.textContent = 'Excellent';
        }
    }

    // 设置评分监听器
    function setupRatingListeners(ratingContainer, category) {
        if (!ratingContainer) return;
        const stars = ratingContainer.querySelectorAll('input[type="radio"]');
        stars.forEach(star => {
            star.addEventListener('change', function () {
                ratings[category] = parseInt(this.value);
                updateOverallRating();
            });
        });
    }

    setupRatingListeners(contentRating, 'content');
    setupRatingListeners(speakerRating, 'speaker');
    setupRatingListeners(organizationRating, 'organization');
    setupRatingListeners(venueRating, 'venue');

    // 照片上传逻辑
    if (browsePhotos && photoInput) {
        browsePhotos.addEventListener('click', function (e) {
            e.stopPropagation();
            photoInput.click();
        });
    }

    if (photoUploadContainer && photoInput) {
        photoUploadContainer.addEventListener('click', function (e) {
            if (e.target !== browsePhotos) {
                photoInput.click();
            }
        });

        photoUploadContainer.addEventListener('dragover', function (e) {
            e.preventDefault();
            photoUploadContainer.classList.add('drag-over');
        });

        photoUploadContainer.addEventListener('dragleave', function () {
            photoUploadContainer.classList.remove('drag-over');
        });

        photoUploadContainer.addEventListener('drop', function (e) {
            e.preventDefault();
            photoUploadContainer.classList.remove('drag-over');
            if (e.dataTransfer.files.length) {
                handlePhotos(e.dataTransfer.files);
            }
        });
    }

    if (photoInput) {
        photoInput.addEventListener('change', function (e) {
            if (e.target.files.length) {
                handlePhotos(e.target.files);
            }
        });
    }

    // 处理照片函数
    function handlePhotos(files) {
        if (!photoPreview) return;

        if (uploadedPhotos.length + files.length > 5) {
            alert('You can upload a maximum of 5 photos. Please remove some existing photos first.');
            return;
        }

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const maxSize = 5 * 1024 * 1024;
            if (file.size > maxSize) {
                alert(`Photo "${file.name}" exceeds 5 MB limit. Please choose a smaller file.`);
                continue;
            }
            if (!file.type.startsWith('image/')) {
                alert(`File "${file.name}" is not an image. Please upload image files only.`);
                continue;
            }

            const photoId = Date.now() + i;
            uploadedPhotos.push({ id: photoId, file: file });
            showPhotoPreview(photoId, file);
        }
        photoInput.value = '';
    }

    // 显示照片预览
    function showPhotoPreview(photoId, file) {
        if (!photoPreview) return;
        const reader = new FileReader();
        reader.onload = function (e) {
            const photoItem = document.createElement('div');
            photoItem.className = 'photo-item';
            photoItem.id = `photo-${photoId}`;
            photoItem.innerHTML = `<img src="${e.target.result}" alt="Event photo"> <button class="remove-photo" onclick="removePhoto(${photoId})">×</button>`;
            photoPreview.appendChild(photoItem);
        };
        reader.readAsDataURL(file);
    }

    // 移除照片（全局函数）
    window.removePhoto = function (photoId) {
        uploadedPhotos = uploadedPhotos.filter(photo => photo.id !== photoId);
        const photoElement = document.getElementById(`photo-${photoId}`);
        if (photoElement) {
            photoElement.remove();
        }
    };

    // 表单提交
    if (submitReviewBtn) {
        submitReviewBtn.addEventListener('click', function () {
            if (!eventSelect || !eventSelect.value) {
                alert('Please select an event to review.');
                eventSelect?.focus();
                return;
            }
            if (ratings.content === 0 && ratings.speaker === 0 && ratings.organization === 0 && ratings.venue === 0) {
                alert('Please rate at least one category.');
                return;
            }
            if (!reviewTitle || !reviewTitle.value.trim()) {
                alert('Please enter a review title.');
                reviewTitle?.focus();
                return;
            }
            if (!reviewContent || !reviewContent.value.trim()) {
                alert('Please enter your review content.');
                reviewContent?.focus();
                return;
            }
            const recommendSelected = document.querySelector('input[name="recommend"]:checked');
            if (!recommendSelected) {
                alert('Please select whether you would recommend this event.');
                return;
            }

            const currentUser = JSON.parse(localStorage.getItem('currentUser') || 'null');
            if (!currentUser) {
                alert('Please login to submit a review.');
                window.location.href = 'loginpage.html';
                return;
            }

            submitReviewBtn.disabled = true;
            submitReviewBtn.textContent = 'Submitting...';

            const reviewData = {
                id: Date.now(),
                eventId: eventSelect.value,
                eventName: eventSelect.options[eventSelect.selectedIndex].text,
                userId: currentUser.id,
                userName: currentUser.fullName,
                userInitial: currentUser.fullName ? currentUser.fullName.charAt(0).toUpperCase() : 'U',
                ratings: { ...ratings },
                overallRating: parseFloat(overallScore.textContent),
                title: reviewTitle.value.trim(),
                content: reviewContent.value.trim(),
                recommend: recommendSelected.value,
                date: new Date().toISOString(),
                photos: []  // 实际可存储图片 base64，但 optional 就不处理
            };

            if (uploadedPhotos.length > 0) {
                setTimeout(() => completeReviewSubmission(reviewData), 1500);
            } else {
                completeReviewSubmission(reviewData);
            }
        });
    }

    function completeReviewSubmission(reviewData) {
        const reviews = JSON.parse(localStorage.getItem('reviews') || '[]');
        reviews.push(reviewData);
        localStorage.setItem('reviews', JSON.stringify(reviews));
        alert('Thank you for your review! Your feedback has been submitted successfully.');
        window.location.href = 'index.php';
    }

    // 购物车数量更新（如果有 cartCount 元素）
    const cartCount = document.getElementById('cartCount');
    if (cartCount) {
        const cart = JSON.parse(localStorage.getItem('cart') || '[]');
        const totalItems = cart.reduce((total, item) => total + (item.quantity || 1), 0);
        cartCount.textContent = totalItems;
        cartCount.style.display = totalItems > 0 ? 'flex' : 'none';
    }

    // 初始更新总体评分
    updateOverallRating();
});
</script>
</body>

</html>