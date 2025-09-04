
  function showOffer(message) {
    document.getElementById("popupTitle").innerText = message;
    document.getElementById("offerPopup").style.display = "block";
  }

  function closeOffer() {
    document.getElementById("offerPopup").style.display = "none";
  }
