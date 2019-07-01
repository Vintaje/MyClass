<button onclick="topFunction()" id="myBtn" title="Go to top"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></button>
<?php
conexion::desconectarBD();
?>
<script>
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>
<br>
<div class="footer">
    <p class="text-center rights" style="color: #fff;">MyClass © | <a href="https://twitter.com/MyClassCEOs">'Twitter'</a> |</p>
</div>


<script src="js/bootstrap.js"></script>
</body>

</html>