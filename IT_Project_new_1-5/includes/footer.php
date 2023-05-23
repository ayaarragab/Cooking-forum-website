
<div class="container footer">
        <footer>
          <div class="footer-content">
            <p>&copy; 2023 Let's Cook. All rights reserved.</p>
              <ul>
                <li><a href="privacy-policy.php">Privacy Policy</a></li>
                <li><a href="terms-of-Use.php">Terms of Use</a></li>
                <li><a href="contact_us.php">Contact us</a></li>
              </ul>
          </div>
        </footer>
    </div>
    <script>
    const shareButton = document.querySelector('.share-a-post-now');
  const shareFormContainer = document.querySelector('.div-share-your-experience');

  shareButton.addEventListener('click', function() {
    shareFormContainer.style.display = 'block';
  });
  shareFormContainer.style.display = 'none';

shareButton.addEventListener('click', function() {
  shareFormContainer.style.display = 'block';
});

shareForm.addEventListener('submit', function(event) {
  event.preventDefault();
  shareFormContainer.style.display = 'none';
});
document.addEventListener("DOMContentLoaded", function() {
    const discardButton = document.querySelector("button.discard");
    const shareYourExperienceForm = document.querySelector("form.share-your-experience-form");

    discardButton.addEventListener("click", function(event) {
      event.preventDefault(); 
      shareYourExperienceForm.style.display = "none"; 
    });
  });
function hidePostForm() {
  document.getElementById("post-form-container").style.display = "none";
}
</script>
</body>
</html>