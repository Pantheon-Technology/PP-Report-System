<footer class="w3-container footercolour w3-padding-16">
  <div class= "w3-center">
    <h3>Centre Socials</h3>
    <a href="https://www.facebook.com/PositiveProgressTuition" target="blank"><i class="fa fa-facebook-official w3-hover-opacity w3-xlarge"></i></a>
    <a href="https://www.instagram.com/positiveprogresstuition/" target="blank"><i class="fa fa-instagram w3-hover-opacity w3-xlarge"></i></a>
    <a href="https://twitter.com/PositiveTuition" target="blank"><i class="fa fa-twitter w3-hover-opacity w3-xlarge"></i></a>
  <p class="w3-center">Software created by Pantheon Technology</p>
</div>
</footer>

<script src="index.js"></script>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
<script src ="index.js"></script>