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
function hidePostForm() {
  document.getElementById("post-form-container").style.display = "none";
}
// Listen for clicks on reaction buttons

var reactionButtons = document.querySelectorAll('.reaction-button');
for (var i = 0; i < reactionButtons.length; i++) {
  reactionButtons[i].addEventListener('click', function(event) {
    var reaction = this.getAttribute('data-reaction');
    var postId = this.closest('.post').getAttribute('data-id');
    var countElement = this.nextElementSibling;

    // Send an AJAX request to store the reaction
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'store_reaction.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Update the reaction count
        var counts = JSON.parse(xhr.responseText);
        countElement.textContent = counts[reaction];
      }
    };
    xhr.send('reaction=' + encodeURIComponent(reaction) + '&id_e=' + encodeURIComponent(postId));
  });
}