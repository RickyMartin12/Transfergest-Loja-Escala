<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container" style="margin-left:0px;width:100%;padding-right: 20px;">
        <div class="navbar-header col-xs-10">
<h4 id="mycompany" class="w3-text-white"></h4>
        </div>
        <div class="pull-right col-xs-2" style="margin-top:13px;">
            <a href="logout.php" class="pull-right" style="color:white;font-size:20px;">
                <span class="glyphicon glyphicon-off"></span>
            </a>
        </div>
    </div>
</nav>
  <script>
      arr = JSON.parse(localStorage.getItem("shopDef"));
      document.getElementById("mycompany").innerHTML = arr[0].nome;
   </script>