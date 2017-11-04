
    <html>
    <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
    <body style="background-image:url('image/doctor.jpg');background-repeat:no-repeat;background-size:cover">
    <div class="container">
    <form action="" method="post" name="login">
        <br>
        <br>

      <div class="jumbotron">
        <center><h2 style="color:#195ad1">Search for Diseases</h2>      
        </center>
      </div>
        <br>
            <div class="col-xs-4 col-sm-4 col-md-4"></div>
            <div class="col-xs-4 col-md-4 col-sm-4">
                <div class="input-group">
                    <div class="input-group-btn search-panel">

                    </div>        
                    <input type="text" class="form-control" name="diesease" placeholder="Search for disease">
                    <br>
                    <div class="input-group-btn search-panel">
                        <button class="btn btn-primary" name="submit" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </div>
                </div>
            </div>
          <div class="col-xs-4 col-sm-4 col-md-4"></div>


        </form>
        </div>
        <br>
        <br>
        <div class="container">
        <div class="jumbotron">
        <center><h2 style="z-index:4;hover:opacity:1;color:#195ad1">Doctors</h2>      
        </center>
            </div>
        </div>

        <?php
        session_start();

        if ($_SERVER['REQUEST_METHOD'] =='POST'){


            $dieseas=stripslashes($_POST['diesease']);;



            $conn = mysqli_connect("localhost","root","","doctors");
            $dieseas = mysqli_real_escape_string($conn,$dieseas);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE diesease='".($dieseas)."'";
    $result = mysqli_query($conn,$sql);



        }
        echo "<br><br><center><div class='container'>";
        echo "<label>";
        echo "<select id='international' onchange='temp()'>";
            if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {

            echo "<option  value='" . $row['Doctors'] ."'>" . $row['Doctors']."</option>";
        }
    } else {
        echo "<option  value='No results found'>No Results found</option>";
    }
    echo "</select>";
        echo "</label>";
        echo "</div></center>";
    mysqli_close($conn);
        Session_destroy();
        ?>


    <script>
        function temp(){
            var s=document.getElementById('international');
            alert("Thanks for choosing "+s.options[s.selectedIndex].value);

        }</script>






    </body>
        <style>
    select {
        padding:0.5em 0.5em;
        margin: 0;
        background: #fff;
        color:#195ad1;
        border:none;
        outline:none;
        display: inline-block;
        -webkit-appearance:none;
        -moz-appearance:none;
        appearance:none;
        cursor:pointer;
        width: auto;
        height: auto;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 10px;

    }

    @media screen and (-webkit-min-device-pixel-ratio:0) {
        select {padding-right:18px}
    }

    label {position:relative}
    label:after {
        content:"\f078";   
        font-family: "FontAwesome";
        font-size: auto;
        color:#aaa;
        right:auto; top:auto;
        padding:0 0 2px;
        position:relative;
        pointer-events:none;
    }
    label:before {
        content:'';
        right:4px; top:0px;
        width:auto; height:auto;
        background:#fff;
        position:relative;
        pointer-events:none;
        display:block;
    }
    </style>
    </html>

