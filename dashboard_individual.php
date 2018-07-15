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
        <title>Test Assessment</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                    <style>
                        body{
                            font-family: Arial, Helvetica, sans-serif;
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
                    
                    .myRadio {
                        display: block;
                        position: relative;
                        cursor: pointer;
                        padding-left: 5vh;
                        margin: 2vh;
                        font-weight: normal;
                    }
                    
                    .myRadio input {
                        position: absolute;
                        opacity: 0;
                        cursor: pointer;
                    }
                    
                    .checkmark {
                        position: absolute;
                        top: 0;
                        left: 0;
                        height: 20px;
                        width: 20px;
                        background-color: #eee;
                        border-radius: 50%;
                    }
                    
                    .myRadio:hover input ~ .checkmark {
                        background-color: #ccc;
                    }
                    
                    .myRadio input:checked ~ .checkmark {
                        background-color: #2196F3;
                    }
                    
                    .checkmark:after {
                        content: "";
                        position: absolute;
                        display: none;
                    }
                    
                    .myRadio input:checked ~ .checkmark:after {
                        display: block;
                    }
                    
                    .question {
                        font-weight: bold;
                        background: #ECF0F1;
                        padding: 2vh;
                    }
                    
                    #submit-button {
                        margin: 4vh auto 2vh auto;
                        padding: 2vh;
                        background-color: #2196F3;
                        text-align: center;
                        color: white;
                        display: block;
                        width: 20vw;
                        opacity: 0.9;
                        border: none;
                    }
                    
                    
                    #submit-button:hover {
                        opacity:1;
                    }
                    
                    #result {
                        display: none;
                        background: #ECF0F1;
                        padding: 3vh;
                        border-radius: 10px;
                        
                    }
                    
                    #consult-button {
                        margin: 4vh auto 2vh auto;
                        padding: 2vh;
                        background-color: #2196F3;
                        text-align: center;
                        color: white;
                        display: block;
                        width: 20vw;
                        opacity: 0.9;
                        border: none;
                    }
                    
                    
                    #consult-button:hover {
                        opacity:1;
                    }
                    
                    @media screen and (max-width: 700px) {
                        #consult-button {
                            width: 50vw;
                        }
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
            <form action="dashboard.html">
            <div class = "container">
                <h1 style="text-align: center;">Self-Assessment </h1>
                <p style="text-align: justify;">To help you familiarise with standard aptitude tests, and assess how well you are likely to do in real ones, we have designed a number of short online aptitude tests that you can practise for free:</p>
                <section id = "test" style="padding-top: 3vh">
                    <p>Pick the answer.</p>
                    <div id = "q1">
                        <p class = "question">1. A train running at the speed of 60 km/hr crosses a pole in 9 seconds. What is the length of the train?</p>
                        <label class = "myRadio">120 metres
                            <input type="radio" value="1" name="q1">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">180 metres
                            <input type="radio" value="2" name="q1">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">324 metres
                            <input type="radio" value="3" name="q1">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">150 metres
                            <input type="radio" value="4" name="q1">
                                <span class="checkmark"></span>
                                </label>
                      
                    </div>
                    
                    <div id = "q2">
                        <p class = "question">2. A train 125 m long passes a man, running at 5 km/hr in the same direction in which the train is going, in 10 seconds. The speed of the train is:</p>
                        <label class = "myRadio">45 km/hr
                            <input type="radio" value="1" name="q2">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">50 km/hr
                            <input type="radio" value="2" name="q2">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">54 km/hr
                            <input type="radio" value="3" name="q2">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">55 km/hr
                            <input type="radio" value="4" name="q2">
                                <span class="checkmark"></span>
                                </label>
                       
                    </div>
                    
                    <div id = "q3">
                        <p class = "question">3. The length of the bridge, which a train 130 metres long and travelling at 45 km/hr can cross in 30 seconds, is:</p>
                        <label class = "myRadio">200 m
                            <input type="radio" value="1" name="q3">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">225 m

                            <input type="radio" value="2" name="q3">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">245 m
                            <input type="radio" value="3" name="q3">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">250 m
                            <input type="radio" value="4" name="q3">
                                <span class="checkmark"></span>
                                </label>
                        
                    </div>
                    
                    <div id = "q4">
                        <p class = "question">4. Feeling very upset when something reminded you of
                        a stressful experience from the past?</p>
                        <label class = "myRadio">Never
                            <input type="radio" value="1" name="q4">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">Rarely
                            <input type="radio" value="2" name="q4">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">Sometimes
                            <input type="radio" value="3" name="q4">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">Often
                            <input type="radio" value="4" name="q4">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">Very often
                            <input type="radio" value="5" name="q4">
                                <span class="checkmark"></span>
                                </label>
                    </div>
                    
                    <div id = "q5">
                        <p class = "question">5. Two trains running in opposite directions cross a man standing on the platform in 27 seconds and 17 seconds respectively and they cross each other in 23 seconds. The ratio of their speeds is:</p>
                        <label class = "myRadio">1 : 3
                            <input type="radio" value="1" name="q5">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">3 : 2
                            <input type="radio" value="2" name="q5">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">3 : 4
                            <input type="radio" value="3" name="q5">
                                <span class="checkmark"></span>
                                </label>
                        <label class = "myRadio">None of these
                            <input type="radio" value="4" name="q5">
                                <span class="checkmark"></span>
                                </label>
                        
                    </div>
                    
                  
                    
                    
                    <div>
                        <input type = "submit" value = "Submit" id = "submit-button" onclick = "calculate()">
                            </div>
                </section>
                <section id = "result">
                    <h3 id = "result-type" style="text-align: center;"></h3>
                    <p style="text-align: justify;"></p>
                    <div>
                        <input type = "button" value = "Consult a psychiatrist" id = "consult-button">
                            </div>
                </section>
                </div>
            </form>
                <script type="text/javascript">
                    function calculate()
                    {
                        var ans_array = [];
                        var i = 1;
                        var ans = 0;
                        var count = 0;
                        for(i = 1; i <= 6; i++)
                        {
                            var q = document.getElementsByName("q"+i.toString());
                            var j = 0;
                            for(j = 0; j < 5; j++)
                            {
                                if(q[j].checked)
                                {
                                    count++;
                                    ans_array[i-1] = q[j].value;
                                    ans += parseInt(q[j].value);
                                }
                            }
                        }
                        if(count!=5)
                        {
                            alert("Please answer all questions.");
                            return false;
                        }
                        console.log(ans);
                        
                        // var modalresult = document.getElementById("resultModal");
                        // modalresult.style.display = "block";
                        // document.getElementsByTagName("body")[0].style.background = "blue";
                        
                        var diag;
                        
                        if(ans <=9&&ans>=0) diag = "Poor"
                        else if(ans<=13 &&ans>=10) diag = "Good"
                        else if(ans>=14)  diag = "Excellent"
                        
                        document.getElementById("test").style.display = "none";
                        document.getElementById("result-type").innerHTML = diag;
                        document.getElementById("result").style.display = "block";
                        
                        return true;
                        
                    }
                
                    </script>
            </div>
          
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
            var links = ["#", "acctsettings.html", "self-assessment.html",  "feedback_dashboard.php", "resources.html", "faqs.html"];
            
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
