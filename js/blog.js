
//slider
  document.addEventListener("DOMContentLoaded", () => {
    const img = document.querySelector(".slide-image");
    // Page load zalyavar delay ne effect
    setTimeout(() => {
      img.classList.add("show");
    }, 200); 
  });

  // Load Instagram Embed Script dynamically
(function() {
  var script = document.createElement("script");
  script.src = "https://www.instagram.com/embed.js";
  script.async = true;
  document.body.appendChild(script);
})();

