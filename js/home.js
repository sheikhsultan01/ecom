// Cart functionality
let cartCount = 3;

function addToCart(productId) {
    cartCount++;
    document.querySelector('.cart-count').textContent = cartCount;

    // Add animation effect
    const button = event.target;
    button.innerHTML = '<i class="fas fa-check"></i> Added!';
    button.style.background = '#28a745';

    setTimeout(() => {
        button.innerHTML = '<i class="fas fa-cart-plus"></i> Add to Cart';
        button.style.background = '';
    }, 2000);
}

function toggleCart() {
    alert('Cart opened! Items in cart: ' + cartCount);
}

// Smooth scrolling for internal links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Add to cart animation
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function () {
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
            this.style.transform = '';
        }, 150);
    });
});

// Lazy loading effect for product cards
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function (entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Initialize lazy loading
document.addEventListener('DOMContentLoaded', function () {
    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});

// Footer section
// Newsletter subscription
function subscribeNewsletter(event) {
    event.preventDefault();
    const email = event.target.querySelector('input[type="email"]').value;

    // Simulate subscription
    alert(`Thank you for subscribing with email: ${email}`);
    event.target.reset();
}

// Back to top functionality
window.addEventListener('scroll', function () {
    const backToTop = document.querySelector('.back-to-top');
    if (window.pageYOffset > 300) {
        backToTop.classList.add('show');
    } else {
        backToTop.classList.remove('show');
    }
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Smooth scroll for footer links
document.querySelectorAll('.footer-links a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Social media link handlers
document.querySelectorAll('.social-link').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        const platform = this.title;
        alert(`Opening ${platform} page...`);
    });
});