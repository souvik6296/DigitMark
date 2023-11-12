<?php 
    
    error_reporting(0);

    $id= $_COOKIE["userid"];
    if($id!=null){

        include 'connection.php';
        
        $got_image= FALSE;
        $avatar_url="";
        $profile_name="";

        $query= "SELECT `name`, `email`, `password`, `userid`, `avatar` FROM `user-login`";
        $response= mysqli_query($connect, $query);


        while($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {
            if($row["userid"]==$id){
                    
                $avatar_url= $row["avatar"]."";
                $profile_name= $row["name"]."";
                $userid= $row["userid"]."";

                session_start();
                $_SESSION["avatar"]= $avatar_url;
                $_SESSION["name"]= $profile_name;
                    
                    

                $got_image= TRUE;
            }

        }
    }
    if(isset($_POST["send-msg"])){
        $name= $_POST["name"];
        $email= $_POST["email"];
        $msg= $_POST["msg"];
        $subject= $_POST["subject"];
        $header= "From: souvikguptabusiness@gmail.com";

        ini_set("SMTP", "smtp.gmail.com");
        ini_set("smtp_port",587);
        ini_set("sendmail_from", "souvikguptabusiness@gmail.com");
        // ini_set("sendmail_path",  "\\'C:\\xampp\\sendmail\\sendmail.exe\\' -t");
        
        
        if(mail($email, $subject, $msg, $header)){
            echo("<script>console.log('mail sent successfully...');</script>");
        }else{

            echo("<script>console.log('not send');</script>");
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitMark</title>

    <link rel="stylesheet" href="style0.css">
    <script src="./script1.js"></script>
</head>

<body>

    <header>
        <nav>
            <span class="logo" id="digit">Digit</span>
            <span class="logo" id="mark">Mark</span>
            <span id="gap0"></span>
            <div id="option-holder">

                <a class="options" href="#">Home</a>
                <a class="options" href="#">Services</a>
                <a class="options" href="#">Project</a>
                <a class="options" href="#">About Us</a>
                <a class="options" href="#">Blog</a>
                <a class="options" href="#">Contact Us</a>
                <div class="btn-primary" id="get-started"><a href="./signup.php">Get Started</a></div>
                <div id="profile-holder">
                    <img id="user-img-src" src="./images/avatars/avatar0.png">
                    <a href="#" id="user-name" onclick="showOptions()">User Name</a>
                </div>
                <div id="extra-options">
                    <a href="./signin.php">
                        <div id="switch-account" class="options-ex">Switch Account</div>
                    </a>
                    <a href="./logout.php">
                        <div id="log-out" class="options-ex">Log out</div>
                    </a>
                </div>
                <?php 
                    if($got_image){
                        echo("<script>document.getElementById('get-started').style.visibility='hidden';
                        document.getElementById('profile-holder').style.visibility='visible';
                        document.getElementById('user-name').innerText='".$profile_name."';
                        document.getElementById('user-img-src').src='".$avatar_url."';
                        let width= document.getElementById('profile-holder').offsetWidth;
                        let width0= width+10;
                        let width1= width0+'px';
                        document.getElementById('option-holder').style.marginRight=width1;
                        </script>");
                    }
                    else{
                        echo("<script>document.getElementById('get-started').style.visibility = 'visible';
                            document.getElementById('profile-holder').style.visibility = 'hidden';</script>");

                    }
                ?>
            </div>


        </nav>

    </header>
    <!-- //////////////////////////////////////////////////// -->

    <main>
        <div id="first-container">
            <div id="first-block" class="innerdiv">
                <div id="inner0">
                    <p>Digital Marketing Website</p>
                </div>
                <div id="inner1">
                    <p>We Are Available For Marketing
                    </p>
                </div>
                <div id="inner2">
                    <p>This Website has been Designed for the Project
                        Work Of CSE 326 which is a Website of Marketing..
                    </p>
                </div>
                <div id="inner3">
                    <div class="btn-primary"><a href="#">Get Started</a></div>
                </div>

            </div>
            <span id="gap2"></span>
            <div id="second-block" class="innerdiv">
                <img src="./images/hero-banner.png" id="banner-img">
            </div>
        </div>

        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <div id="second-container">
            <p id="heading">Services We Provide...</p>
            <ul id="service-container">
                <li class="service-holder">
                    <div class="icon-holder" style="background-color: #13c4a1;">
                        <img src="./images/chat.png" alt="" srcset="">
                    </div>
                    <a class="title" href="./livechat.php">Live Chat</a>
                    <p class="description">Just Chat like a chatter box and forget that You are in Class.</p>
                </li>
                <li class="service-holder">
                    <div class="icon-holder" style="background-color: #6610f2;">
                        <img src="./images/marketing.png" alt="" srcset="">
                    </div>
                    <a class="title" href="#">Digital Marketing</a>
                    <p class="description">I just know that Digital Marketing is Selling Digitally..</p>
                </li>
                <li class="service-holder">
                    <div class="icon-holder" style="background-color: #ffb700;">
                        <img src="./images/analytics.png" alt="" srcset="">
                    </div>
                    <a class="title" href="#">Market Research</a>
                    <p class="description">As of now We haven't done any market research because we didn't knew where
                        market was..</p>
                </li>
                <li class="service-holder">
                    <div class="icon-holder" style="background-color: #fc3549;">
                        <img src="./images/keyword.png" alt="" srcset="">
                    </div>
                    <a class="title" href="#">Keyword Targeting</a>
                    <p class="description">Our Targets Are Youth just go and Attract Them...</p>
                </li>
                <li class="service-holder">
                    <div class="icon-holder" style="background-color: #00d280;">
                        <img src="./images/marketing.png" alt="" srcset="">
                    </div>
                    <a class="title" href="#">Email Marketing</a>
                    <p class="description">We Actually do not have a bulk messsage sender...</p>
                </li>
                <li class="service-holder">
                    <div class="icon-holder" style="background-color: #ff612f;">
                        <img src="./images/governance.png" alt="" srcset="">
                    </div>
                    <a class="title" href="#">Marketing & Reporting</a>
                    <p class="description">Like we don't market we also don't Report</p>
                </li>
            </ul>
        </div>

        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <div id="third-container">
            <h1 class="heading001">Our Recent Projects</h1>
            <p class="heading002">Nothing to<br>show here</p>
            <div id="big-view-container">
                <div class="secondary-holder">
                    <figure class="primary-holder">
                        <img src="./images/project-1.jpg" class="bg-img">
                    </figure>
                    <div class="description-holder">
                        <p class="title01">Optimizing</p>
                        <p class="description01">Designing a better cinema experience</p>
                        <button class="btn-primary">View Details</button>
                    </div>
                </div>
                <div class="secondary-holder">

                    <figure class="primary-holder">
                        <img src="./images/project-2.jpg" class="bg-img">
                    </figure>
                    <div class="description-holder">
                        <p class="title01">Digital Marketing</p>
                        <p class="description01">Building design process within teams</p>
                        <button class="btn-primary">View Details</button>
                    </div>
                </div>
                <div class="secondary-holder">

                    <figure class="primary-holder">
                        <img src="./images/project-3.jpg" class="bg-img">
                    </figure>
                    <div class="description-holder">
                        <p class="title01">KeyWord Targeting</p>
                        <p class="description01">How intercom brings play into their design process</p>
                        <button class="btn-primary">View Details</button>
                    </div>
                </div>
                <div class="secondary-holder">

                    <figure class="primary-holder">
                        <img src="./images/project-4.jpg" class="bg-img">
                    </figure>
                    <div class="description-holder">
                        <p class="title01">Email Marketing</p>
                        <p class="description01">Stuck with to-do list, I created a new app for</p>
                        <button class="btn-primary">View Details</button>
                    </div>
                </div>
                <div class="secondary-holder">

                    <figure class="primary-holder">
                        <img src="./images/project-5.jpg" class="bg-img">
                    </figure>
                    <div class="description-holder">
                        <p class="title01">Marketing & Reporting</p>
                        <p class="description01">Examples of different types of sprints</p>
                        <button class="btn-primary">View Details</button>
                    </div>
                </div>
                <div class="secondary-holder">

                    <figure class="primary-holder">
                        <img src="./images/project-6.jpg" class="bg-img">
                    </figure>
                    <div class="description-holder">
                        <p class="title01">Development</p>
                        <p class="description01">Redesigning the Hindustan Times app</p>
                        <button class="btn-primary">View Details</button>
                    </div>
                </div>
                <script>

                    let container = document.querySelector(".bg-img");
                    container.addEventListener('mouseenter', () => console.log("working"));
                </script>
            </div>
        </div>

        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <div id="fourth-container">
            <div id="left">
                <video id="video-view" src="./images/videoplayback.mp4" height="525px" loop
                    onclick="pausevideo()"></video>
                <img id="about-img" src="./images/about-banner.jpg">
                <div id="play-btn" onclick="playvideo()"><img src="./images/play-button-arrowhead.png"></div>
            </div>
            <div id="right">
                <h1 class="sect-header m">About Us</h1>
                <p class="sect-body m">Well About us there is nothing that you don't know but we are leading Experts of
                    Marketing Industry we do all the work with Quality Experience Only.</p>
                <h3 class="sect-header m">Who We Are</h3>
                <p class="sect-body m">We are the leading Industry Experts of Dital marketing Era and We didn't stop
                    there we are still Growing.</p>
                <h3 class="sect-header m">Our Success</h3>
                <ul>
                    <li class="sect-body m n">This page is simply dummy text of the printing and typesetting industry.
                    </li>
                    <li class="sect-body m n">It is a long established fact that a reader will be distracted by the
                        readable content of a page when looking at its layout.</li>
                    <li class="sect-body m n">This is not simply random text. It has roots in a piece of classical Indian
                        literature.</li>
                </ul>
                <h3 class="sect-header m">Our Mission</h3>
                <p class="sect-body m">Our one an only mission is to do something greater and reach out to more people.
                </p>
            </div>
        </div>

        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <div id="fifth-container">
            <img src="./images/cta-bg.jpg" id="stylish-img">


        </div>

        <div id="sixth-container">
            <div id="inner-cont05">
                
                <h1 class="heading001">Latest Articles Updated Weekly</h1>
                <p class="heading002" style="text-align: center;">We Regularly update our articles and there we talk about Everything you are<br>interested in Atleast we hope so.</p>
                <ul>
                    <li id="big-li">
                        <div class="card-holder" id="bigone">
                            <div class="holder08">
                                <img src="./images/blog-1.jpg" class="big-img">
                            </div>
                            <div class="bigger">
                                <p class="small-heading">October 6, 2023</p>
                                <p class="description02">How to become a successful entry level UX desginer</p>
                            </div>
                        </div>
                    </li>

                    <li id="li-one">
                        <div class="min-card-holder">
                            <div class="holder09">
                                <img src="./images/blog-2.jpg" class="img">
                            </div>
                            <div class="description-holder01 smaller">
                                <p class="small-heading">October 6, 2023</p>
                                <h3 class="description02">2022: The Year of Everywhere</h3>
                            </div>
                        </div>
                    </li>

                    <li id="li-two">
                        <div class="min-card-holder">
                            <div class="holder09">
                                <img src="./images/blog-3.jpg" class="img">
                            </div>
                            <div class="description-holder01 smaller">
                                <p class="small-heading">October 6, 2023</p>
                                <p class="description02">The Guide to Running a Client Discovery Process</p>
                            </div>
                        </div>
                    </li>

                    <li id="li-three">
                        <div class="min-card-holder">
                            <div class="holder09">
                                <img src="./images/blog-4.jpg" class="img">
                            </div>
                            <div class="description-holder01 smaller">
                                <p class="small-heading">October 6, 2023</p>
                                <p class="description02">3 Ways to Get Client Approval for Scope Changes</p>
                            </div>
                        </div>
                    </li>

                    <li id="li-four">
                        <div class="min-card-holder">
                            <div class="holder09">
                                <img src="./images/blog-5.jpg" class="img">
                            </div>
                            <div class="description-holder01 smaller">
                                <p class="small-heading">October 6, 2023</p>
                                <p class="description02">Top 21 Must-Read Blogs For Creative Agencies</p>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

        <div id="seventh-container">
            <div id="form-container">
                <div id="upper-portion">
                    <h1 class="heading001" style="color: black; margin:0px;">Let's Contact With Us</h1>
                    <p class="heading002" style="text-align: center;margin:0px;">Well we are Every where Do search and connect with us !</p>
                </div>
                <form method="post">
                    <div class="input-holder">
                    <input type="text" name="name" id="name" class="input" placeholder="Your Name**">
                    <input type="text" name="email" id="email" class="input" placeholder="Your Email**">
                    </div>
                    <div class="input-holder">
                    <input type="text" name="subject" id="subject" class="input" placeholder="Subject">
                    <input type="text" name="phone" id="phone" class="input" placeholder="Phone Number">
                    </div>

                    <textarea name="msg" id="msg" class="input msg" cols="30" rows="10" placeholder="enter your message..."></textarea>
                    <input type="checkbox" name="accept" id="accept">
                    <p>Accept <a href="#">Terms of Services</a> and <a href="#">Privacy Policy</a></p>
                    
                    <div class="btn-primary" id="send-msg"><input type="submit" value="send message" name="send-msg"></div>

                </form>
            </div>
        </div>
        

    </main>
    <!-- /////////////////////////////////////////////////// -->
    <footer>

    </footer>
</body>

</html>