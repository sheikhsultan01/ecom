$(document).ready(function () {
    // Initialize AOS animation library
    AOS.init({
        duration: 800,
        once: true
    });

    // Number counter animation
    function animateValue(obj, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);

            // Format the number with commas for thousands
            const formattedValue = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            if (value > 999) {
                // For numbers over 1000, use K notation
                if (value >= 1000 && value < 1000000) {
                    obj.innerHTML = (value / 1000).toFixed(0) + 'K+';
                } else {
                    obj.innerHTML = formattedValue + '+';
                }
            } else {
                obj.innerHTML = formattedValue + '%';
            }

            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    // Function to start animation when element is in view
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    let animated = false;

    $(window).scroll(function () {
        if (!animated) {
            const statsSection = document.querySelector('.stats-number');
            if (statsSection && isInViewport(statsSection)) {
                animated = true;

                // Start animation for each stat number
                document.querySelectorAll('.stats-number').forEach(function (el) {
                    const endValue = parseInt(el.getAttribute('data-count'));
                    animateValue(el, 0, endValue, 2000);
                });
            }
        }
    });

    // Timeline animation enhancements
    $('.timeline-item').hover(function () {
        $(this).find('.timeline-content').css('transform', 'scale(1.05)');
    }, function () {
        $(this).find('.timeline-content').css('transform', 'scale(1)');
    });
});