
  <script src="https://kit.fontawesome.com/388c1109a3.js" crossorigin="anonymous"></script>

<style>
    #myBtn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 12px;
    border: none;
    outline: none;
    background-color: #060e4d;
    color: white;
    cursor: pointer;
    padding: 15px;
    border-radius: 6px;
    box-shadow: 1px 1px 1px 1px #888888;
    
  }
  
  #myBtn:hover {
    background-color: #fff;
    color: #060e4d;
  }
  </style>
  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
  
  <script>
  // Get the button
  let mybutton = document.getElementById("myBtn");
  
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }
  
  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
  </script>