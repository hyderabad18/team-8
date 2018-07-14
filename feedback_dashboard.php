<?php  
session_start();  
?>  
<?php
$link = mysqli_connect('localhost', 'root' , '', 'jpmc');
if(!$link){
    die('error connection');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Feedback</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                    <style type="text/css">
                        .slidecontainer {
                            width: 50%;
                        }
                    
                    .slider {
                        -webkit-appearance: none;
                        width: 100%;
                        height: 15px;
                        border-radius: 5px;
                        background: #d3d3d3;
                        outline: none;
                        opacity: 0.7;
                        -webkit-transition: .2s;
                        transition: opacity .2s;
                    }
                    
                    .slider:hover {
                        opacity: 1;
                    }
                    
                    .slider::-webkit-slider-thumb {
                        -webkit-appearance: none;
                        appearance: none;
                        width: 25px;
                        height: 25px;
                        border-radius: 50%;
                        background: #2196F3;
                        cursor: pointer;
                    }
                    
                    .slider::-moz-range-thumb {
                        width: 25px;
                        height: 25px;
                        border-radius: 50%;
                        background: #2196F3;
                        cursor: pointer;
                    }
                    input[type=text]:focus, input[type=password]:focus {
                        background-color: #ddd;
                        outline: none;
                    }
                    .slider-value {
                        padding-left: 2vh;
                        font-weight: bold;
                    }
                    hr {
                        border: 1px solid #f1f1f1;
                        margin-bottom: 25px;
                    }
                    /* Set a style for all buttons */
                    button {
                        background-color: #4CAF50;
                        color: white;
                        padding: auto;
                        height: 6vh;
                        border: none;
                        cursor: pointer;
                        width: 100%;
                        opacity: 0.9;
                    }
                    button:hover {
                        opacity:1;
                    }
                    .cancelbtn {
                        padding: auto;
                        background-color: #f44336;
                    }
                    
                    /* Float cancel and signup buttons and add an equal width */
                    .cancelbtn, .signupbtn {
                        float: left;
                        width: 50%;
                    }
                    .container {
                        padding: 14px 14px 6px 14px;
                    }
                    
                    /* Clear floats */
                    .clearfix::after {
                        content: "";
                        clear: both;
                        display: table;
                    }
                    
                    /* Change styles for cancel button and signup button on extra small screens */
                    @media screen and (max-width: 300px) {
                        .cancelbtn, .signupbtn {
                            width: 100%;
                        }
                    }
                    ul {
                        li: right;
                    }
                    
                    .navbar-default .navbar-nav > li > a {
                        color: black;
                        font-weight: bold;
                        margin: 0;
                    }
                    
                    .navbar-header > a {
                        color: black;
                        font-weight: bold;
                    }
                    
                    .navbar {
                        margin:0;
                    }
                    
                        </style>
                    </head>
    <body onresize="w3_close()" onload="fillContent()">
        <!--Collapsible sidebar-->
        <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width: 17%;" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
            <!--User profile-->
            <div style="width:100%; height:15%; display:flex;">
                <div style="width:40%; display:flex; justify-content:flex-end; align-items:center;">
                    <img src="images/femaleUser.png" style="border-radius:50%; width:60%; margin-right:4%;"/>
                </div>
                <div style="width:60%; display:flex; flex-direction:column; justify-content:center; font-size:12px; color:#4285F4;">
                   <p style="margin:0;"> <?php
                                   $value1= $_SESSION["email"] ;
                                   $query = "select * from `individual_signup` where email='$value1' ";
                                    $result = mysqli_query($link,$query);
                                    $row = mysqli_fetch_assoc($result);
                                    $_SESSION["email"] = "$value1";
                                    echo "Name: " .$row["name"]. " ";
                                   ?> </p>
                    <p style="margin:0;"> <?php    $value1= $_SESSION["email"] ;
                                   $query = "select * from `individual_signup` where email='$value1' ";
                                    $result = mysqli_query($link,$query);
                                    $row = mysqli_fetch_assoc($result);
                                    $_SESSION["email"] = "$value1";
                                    echo "Mobile: " .$row["mobile"]. " ";
                                   ?></p>
                    <p style="margin:0;"> <?php    $value1= $_SESSION["email"] ;
                                   $query = "select * from `individual_signup` where email='$value1' ";
                                    $result = mysqli_query($link,$query);
                                    $row = mysqli_fetch_assoc($result);
                                    $_SESSION["email"] = "$value1";
                                    echo "College: " .$row["colgname"]. " ";
                                   ?></p>
                </div>
            </div>
            <!--Navigation Items-->
            <div id="sidebarItemModel" style="width:100%; height:8%; display:flex; border:1px solid #E6EBF1;">
                <div style="width:2%; height:100%; background:#4285F4"></div>
                <div style="width:93%; height:100%; display:flex; justify-content:flex-start; align-items:center; font-size:12px; padding-left:16%; color:#74838B;"></div>
                <div style="width:5%; height:100%; display:flex; justify-content:flex-start; align-items:center; font-size:12px; padding-right:12%; color:#74838B;">&gt;</div>
            </div>
            <div style="height:13%;"></div>
            <div style="width:100%; height:8%; display:flex; border:1px solid #E6EBF1;">
                <div style="width:2%; height:100%; background:#FFF"></div>
                <div style="width:93%; height:100%; display:flex; justify-content:flex-start; align-items:center; font-size:12px; padding-left:16%; color:#74838B;">Sign Out</div>
                <div style="width:5%; height:100%; display:flex; justify-content:flex-start; align-items:center; font-size:12px; padding-right:12%; color:#FFF;">&gt;</div>
            </div>
        </div>
        <!--Heading-->
        <div class="w3-main" style="margin-left:17%; height:100vh;">
            <div style="height:15vh; display:flex; align-items:center; background:#4285F4;">
                <button class="w3-button w3-xlarge w3-hide-large" style="width:5%; color:#FFF;" onclick="w3_open()">&#9776;</button>
                <!--Logo & Branding-->
                <div style="width:100%; height:100%; display:flex; flex-direction:row; align-items:center;">
                    <div style="margin-left:4%;">
                        <a class = "navbar-brand" href = "index.html" style = "padding: 0;"> <img src = "images/logo_name_h.jpg" height = 60px style = "float: left;"></a>
                    </div>
                    
                </div>
            </div>
            
            <!--Content-->
            <h1 style="text-align: center;">Feedback</h1>
            <center>
                
                <div class = "container-fluid" style="margin-top: 10vh;">
                    <div class="slidecontainer">
                        <label>How would you rate your over-all experience? <span class = "slider-value" id = "q1-value"></span></label><br>
                        <input type="range" min="1" max="5" value="3" class="slider" id="overall" oninput="update(this)">
                            </div>
                    <br>
                    
                    <div class="slidecontainer">
                        <label>How likely are you to recommend us to others?<span class = "slider-value" id = "q2-value"></span></label><br>
                        <input type="range" min="1" max="5" value="3" class="slider" id="q2" oninput="update(this)">
                            </div>
                    <br>
                    
                    <div class="slidecontainer">
                        <label>How easily were you able to find information on this website?<span class = "slider-value" id = "q3-value"></span></label><br>
                        <input type="range" min="1" max="5" value="3" class="slider" id="q2" oninput="update(this)">
                            </div>
                    <br>
                    
                    <div class="slidecontainer">
                        <label>How valuable was the information you found?<span class = "slider-value" id = "q4-value"></span></label><br>
                        <input type="range" min="1" max="5" value="3" class="slider" id="q2" oninput="update(this)">
                            </div>
                    <br>
                    
                    <div class="slidecontainer">
                        <label>How easy is it to navigate our website?<span class = "slider-value" id = "q5-value"></span></label><br>
                        <input type="range" min="1" max="5" value="3" class="slider" id="q2" oninput="update(this)">
                            </div>
                    <br>
                    
                    <label>Other comments: </label><br>
                    <textarea name = "comments" rows = "6" cols = "100" placeholder="Your comments..."></textarea>
                </div>
            </center>
            <script type="text/javascript">
                var remarks = ["Terrible", "Bad", "Average", "Good", "Very good"]
                var mySlideContainerList = document.getElementsByClassName("slidecontainer");
                var i = 0;
                for (i = 0; i < mySlideContainerList.length; i++)
                {
                    var mySlider = mySlideContainerList[i].getElementsByClassName("slider")[0];
                    var myOutput =  mySlideContainerList[i].getElementsByTagName("label")[0].getElementsByTagName("span")[0];
                    var myValue = (mySlideContainerList[i].getElementsByClassName("slider")[0].value);
                    myOutput.innerHTML = "\t"+remarks[myValue-1];
                }
            function update(elem)
            {
                elem.parentNode.getElementsByTagName("span")[0].innerHTML = remarks[elem.value-1];
            }
            
                </script>
                    </div>
        
        <script>
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("mySidebar").style.width = "70%";
            }
        
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("mySidebar").style.width = "17%";
        }
        
        function fillContent() {
            populateSidebar();
        }
        
        function populateSidebar() {
            var items = ["Dashboard", "Account Settings", "Self Assessment",  "Feedback", "Resources", "FAQs"];
            var links = ["#", "acctsettings.html", "dashboard_individual.php","feedback_dashboard.php", "resources.html", "faqs.html"];
            
            var sidebarItemModel = document.getElementById("sidebarItemModel");
            for(itemNo in items) {
                var item = items[itemNo];
                sidebarItemModel.children[0].style.visibility = "hidden";
                sidebarItemModel.children[1].innerHTML = "<a href='"+links[itemNo]+"'>"+item+"</a>";
                if(document.title == item) {
                    sidebarItemModel.children[0].style.visibility = "visible";
                    sidebarItemModel.children[1].style.color = "#000";
                    sidebarItemModel.children[2].style.visibility = "visible";
                }
                else
                sidebarItemModel.children[2].style.visibility = "hidden";
                sidebarItemModel.parentElement.insertBefore(sidebarItemModel.cloneNode(true), sidebarItemModel);
            }
            sidebarItemModel.remove();
        }
        </script>
    </body>
</html>
