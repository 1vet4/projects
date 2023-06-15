document.addEventListener('DOMContentLoaded', function() {
    const reviewRating = document.getElementById('review-rating');
    if (reviewRating) {
      const stars = reviewRating.getElementsByClassName('star');
  
      for (let i = 0; i < stars.length; i++) {
        stars[i].addEventListener('mouseover', function() {
          for (let j = 0; j <= i; j++) {
            stars[j].classList.add('active');
          }
        });
  
        stars[i].addEventListener('mouseout', function() {
          for (let j = 0; j <= i; j++) {
            stars[j].classList.remove('active');
          }
        });
      }
    }
  });

  document.getElementById('like-button').addEventListener('click', function() {
    alert('You liked the review!');
});

document.getElementById('dislike-button').addEventListener('click', function() {
    alert('You disliked the review!');
});

document.getElementById('back-button').addEventListener('click', function() {
    window.history.back();
});