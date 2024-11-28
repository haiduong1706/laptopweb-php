// Khi cuộn trang xuống, hiển thị nút
window.onscroll = function() {
    var btn = document.getElementById("scrollToTopBtn");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      btn.style.display = "block";
    } else {
      btn.style.display = "none";
    }
  };
  
  // Khi nhấp vào nút, cuộn trang lên đầu
  document.getElementById("scrollToTopBtn").onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };
  