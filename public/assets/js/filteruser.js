const select = document.getElementById('category-select');
const items = document.querySelectorAll('.donation-item');

select.addEventListener('change', () => {
  const category = select.value;
  items.forEach((item) => {
    if (category === '' || item.dataset.category === category) {
      item.classList.remove('hide');
    } else {
      item.classList.add('hide');
    }
  });
});


/* hahaha*/

const filterButtons = document.querySelectorAll('.filter-options .btn');
const filterItems = document.querySelectorAll('.filter-items .item');

filterButtons.forEach((button) => {
  button.addEventListener('click', () => {
    const filterValue = button.getAttribute('data-filter');
    filterItems.forEach((item) => {
      if (item.classList.contains(filterValue) || filterValue === 'all') {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
    });
});


/* carousel*/
// Inisialisasi Swiper

document.addEventListener('DOMContentLoaded', function() {
    new Splide('.splide', {
      type: 'loop',
      perPage: 3,
      breakpoints: {
        600: {
          perPage: 1,
        }
      }
    }).mount();
  });





