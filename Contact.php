<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - INFURNEST</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="CSS/Contact.css">
</head>
<body>

    <!-- ============ HEADER ============ -->
    <div class="header">
        <h1>INFURNEST</h1>
    </div>

    <!-- ============ MAIN SECTION - CONTACT FORM ============ -->
    <div class="main-container">
        <div class="contact-form-container">
            <h2>Contact Us</h2>
            
            <div class="success-message" id="successMessage">
                <strong>Success!</strong> Your message has been sent successfully. We'll get back to you soon!
            </div>

            <form id="contactForm" novalidate>
                <!-- Full Name -->
                <div class="form-group">
                    <label for="fullName">Full Name *</label>
                    <input 
                        type="text" 
                        id="fullName" 
                        name="fullName" 
                        placeholder="Enter your full name"
                        required
                    >
                    <div class="error-text" id="nameError">Please enter your full name</div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Enter your email address"
                        required
                    >
                    <div class="error-text" id="emailError">Please enter a valid email address</div>
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        placeholder="Enter your phone number"
                        required
                    >
                    <div class="error-text" id="phoneError">Please enter a valid phone number</div>
                </div>

                <!-- Subject -->
                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <input 
                        type="text" 
                        id="subject" 
                        name="subject" 
                        placeholder="Enter subject of your inquiry"
                        required
                    >
                    <div class="error-text" id="subjectError">Please enter a subject</div>
                </div>

                <!-- Message -->
                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea 
                        id="message" 
                        name="message" 
                        placeholder="Type your message here..."
                        required
                    ></textarea>
                    <div class="error-text" id="messageError">Please enter your message</div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i> Send Message
                </button>
            </form>
        </div>
    </div>

    <!-- ============ FLOATING CHAT BUTTON ============ -->
    <button class="chat-button" id="chatButton" title="Open Chat">
        <i class="fas fa-comments"></i>
    </button>

    <!-- ============ CHAT BOX ============ -->
    <div class="chat-box" id="chatBox">
        <div class="chat-header">
            <h3>Customer Service - INFURNEST</h3>
            <button class="chat-close-btn" id="chatCloseBtn" title="Close Chat">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="chat-messages" id="chatMessages"></div>
        <div class="chat-input-container">
            <input 
                type="text" 
                class="chat-input" 
                id="chatInput" 
                placeholder="Type your message..."
                autocomplete="off"
            >
            <button class="chat-send-btn" id="chatSendBtn" title="Send Message">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>

    <!-- ============ FOOTER ============ -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-grid">
                <!-- Address Section -->
                <div class="footer-section">
                    <h4><i class="fas fa-map-marker-alt"></i> Address</h4>
                    <p>123 Furniture Street<br>Design District<br>New York, NY 10001<br>United States</p>
                </div>

                <!-- Phone Section -->
                <div class="footer-section">
                    <h4><i class="fas fa-phone"></i> Phone</h4>
                    <p><a href="tel:+15551234567">+1 (555) 123-4567</a><br>
                    <a href="tel:+15559876543">+1 (555) 987-6543</a></p>
                </div>

                <!-- Email Section -->
                <div class="footer-section">
                    <h4><i class="fas fa-envelope"></i> Email</h4>
                    <p><a href="mailto:info@infurnest.com">info@infurnest.com</a><br>
                    <a href="mailto:support@infurnest.com">support@infurnest.com</a></p>
                </div>

                <!-- Business Hours Section -->
                <div class="footer-section">
                    <h4><i class="fas fa-clock"></i> Business Hours</h4>
                    <p>Monday - Friday: 9:00 AM - 6:00 PM<br>
                    Saturday: 10:00 AM - 4:00 PM<br>
                    Sunday: Closed</p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2026 INFURNEST. All Rights Reserved. | Professional Furniture Solutions</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Your custom JS -->
    <script src="main.js"></script>
</body>
</html>
