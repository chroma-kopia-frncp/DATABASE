// ============ FORM VALIDATION ============
const contactForm = document.getElementById('contactForm');
const fullNameInput = document.getElementById('fullName');
const emailInput = document.getElementById('email');
const phoneInput = document.getElementById('phone');
const subjectInput = document.getElementById('subject');
const messageInput = document.getElementById('message');
const successMessage = document.getElementById('successMessage');

// Validation Functions
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validatePhone(phone) {
    const phoneRegex = /^[\d\s\-\+\(\)]{10,}$/;
    return phoneRegex.test(phone.replace(/\s/g, ''));
}

function showError(inputElement, errorElement) {
    inputElement.classList.add('error');
    errorElement.style.display = 'block';
}

function hideError(inputElement, errorElement) {
    inputElement.classList.remove('error');
    errorElement.style.display = 'none';
}

// Real-time validation
fullNameInput.addEventListener('blur', function() {
    if (this.value.trim() === '') {
        showError(fullNameInput, document.getElementById('nameError'));
    } else {
        hideError(fullNameInput, document.getElementById('nameError'));
    }
});

emailInput.addEventListener('blur', function() {
    if (!validateEmail(this.value)) {
        showError(emailInput, document.getElementById('emailError'));
    } else {
        hideError(emailInput, document.getElementById('emailError'));
    }
});

phoneInput.addEventListener('blur', function() {
    if (!validatePhone(this.value)) {
        showError(phoneInput, document.getElementById('phoneError'));
    } else {
        hideError(phoneInput, document.getElementById('phoneError'));
    }
});

subjectInput.addEventListener('blur', function() {
    if (this.value.trim() === '') {
        showError(subjectInput, document.getElementById('subjectError'));
    } else {
        hideError(subjectInput, document.getElementById('subjectError'));
    }
});

messageInput.addEventListener('blur', function() {
    if (this.value.trim() === '') {
        showError(messageInput, document.getElementById('messageError'));
    } else {
        hideError(messageInput, document.getElementById('messageError'));
    }
});

// Form Submission
contactForm.addEventListener('submit', function(e) {
    e.preventDefault();

    let isValid = true;

    // Validate all fields
    if (fullNameInput.value.trim() === '') {
        showError(fullNameInput, document.getElementById('nameError'));
        isValid = false;
    }

    if (!validateEmail(emailInput.value)) {
        showError(emailInput, document.getElementById('emailError'));
        isValid = false;
    }

    if (!validatePhone(phoneInput.value)) {
        showError(phoneInput, document.getElementById('phoneError'));
        isValid = false;
    }

    if (subjectInput.value.trim() === '') {
        showError(subjectInput, document.getElementById('subjectError'));
        isValid = false;
    }

    if (messageInput.value.trim() === '') {
        showError(messageInput, document.getElementById('messageError'));
        isValid = false;
    }

    if (isValid) {
        // Show success message
        successMessage.style.display = 'block';
        successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });

        // Reset form
        contactForm.reset();

        // Remove error styling
        [fullNameInput, emailInput, phoneInput, subjectInput, messageInput].forEach(input => {
            input.classList.remove('error');
        });

        // Hide success message after 5 seconds
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 5000);
    }
});

// ============ CHAT SYSTEM ============
const chatButton = document.getElementById('chatButton');
const chatBox = document.getElementById('chatBox');
const chatCloseBtn = document.getElementById('chatCloseBtn');
const chatInput = document.getElementById('chatInput');
const chatSendBtn = document.getElementById('chatSendBtn');
const chatMessages = document.getElementById('chatMessages');

let chatInitialized = false;

// Toggle Chat Box
chatButton.addEventListener('click', function() {
    chatBox.classList.toggle('active');

    // Initialize chat with greeting on first open
    if (!chatInitialized) {
        chatInitialized = true;
        setTimeout(() => {
            addBotMessage('Hello! Welcome to INFURNEST. How can we assist you today?');
        }, 300);
    }
});

// Close Chat Box
chatCloseBtn.addEventListener('click', function() {
    chatBox.classList.remove('active');
});

// Add Bot Message
function addBotMessage(text) {
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('chat-message', 'message-bot');
    messageDiv.innerHTML = <div class="message-text">${text}</div>;
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}
