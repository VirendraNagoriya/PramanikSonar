// Currently no extra JS is required since the CSS handles auto sliding.
// You can add pause-on-hover or manual controls here if needed.

// Example: Stop animation on hover
const slider = document.querySelector('.slider');

slider.addEventListener('mouseover', () => {
  slider.style.animationPlayState = 'paused';
});

slider.addEventListener('mouseout', () => {
  slider.style.animationPlayState = 'running';
});


//call section
    document.getElementById("contactForm").addEventListener("submit", function(e) {
      e.preventDefault();

      // Collect form values
      const name = document.getElementById("name").value;
      const email = document.getElementById("email").value;
      const contact = document.getElementById("contact").value;
      const address = document.getElementById("address").value;
      const message = document.getElementById("message").value;

      // Here you can add AJAX call if needed
      alert("Thank you, " + name + "! Your message has been sent successfully.");
      this.reset();
    });
  
