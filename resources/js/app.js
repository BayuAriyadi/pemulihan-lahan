import './bootstrap';

document.addEventListener('DOMContentLoaded', (event) => {
    const thumbnails = document.querySelectorAll('.thumbnail');
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', () => {
            if (thumbnail.classList.contains('large')) {
                thumbnail.classList.remove('large');
            } else {
                // Remove 'large' class from all thumbnails first
                thumbnails.forEach(thumb => thumb.classList.remove('large'));
                // Add 'large' class to the clicked thumbnail
                thumbnail.classList.add('large');
            }
        });
    });
});

