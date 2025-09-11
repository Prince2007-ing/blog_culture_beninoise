<footer>
      <div class="newsletter">
         <h3>Benintôché</h3>
         <p>Préservons et partageons la richesse culturelle du Bénin</p>
      </div>

      <div class="footer-bottom">
        <p>&copy; 2025 Benintôché. Tous droits réservés.</p>
      </div>
      <div class="social-icons">
         <a href="https://www.facebook.com/tonprofil" target="_blank" aria-label="Facebook">
            <i class="fab fa-facebook-f"></i>
         </a>
         <a href="https://www.linkedin.com/in/tonprofil" target="_blank" aria-label="LinkedIn">
            <i class="fab fa-linkedin-in"></i>
         </a>
         <a href="https://twitter.com/tonprofil" target="_blank" aria-label="twitter">
            <i class="fab fa-x-twitter"></i>
          </a>
         <a href="https://youtube.com/tonprofil" target="_blank"aria-label="youtube">
            <i class="fab fa-youtube"></i>
          </a>
       </div>

</footer>
<!-- Scripts Bootstrap + dépendances -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function toggleMenu() {
    const nav = document.querySelector('.navigation');
    nav.classList.toggle('show');
}
</script>
<script>
    // Disparition automatique après 5s
    setTimeout(() => {
        let msg = document.getElementById("flash-message");
        if(msg){ msg.style.display = "none"; }
    }, 5000);

    // Disparition si clic sur la barre de navigation
    document.querySelector("nav")?.addEventListener("click", () => {
        let msg = document.getElementById("flash-message");
        if(msg){ msg.style.display = "none"; }
    });
</script>

</body>
</html>