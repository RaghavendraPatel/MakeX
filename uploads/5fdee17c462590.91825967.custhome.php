<?php
 include_once "../php/conn.php";
 session_start();
 if (!isset($_SESSION['userid'])) {
   header("Location: login.html?login=nologon");
 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <link rel="stylesheet" href="..\css\home.css">
        <link rel="shortcut icon" href="..\assets\icon.png">
        <title>Home&nbsp;| MakeX</title>  
    </head>
    <body>
        <script src="..\js\custhome.js"></script>
        <div class="outer">
            <div class="left">
                <a href="landing.php">
                   <img src="..\assets\logo.png" width= 150 height= 65 style="margin-left:75px ;">
                </a>

                <div onclick="openPage('daash', this);dash()"  id="item1"  class="dash-ele ">
                    <i class="fas fa-2x fa-tachometer-alt"></i>
                    <span class="dash-name">Dashboard</span>
                </div>

                <div onclick="openPage('projects', this);project()" id="item2" class="dash-ele"> 
                    <i class="fas fa-2x fa-cubes"></i>
                    <span class="dash-name">Projects</span>
                </div>

                <div onclick="openPage('plans', this);plans()"  id="item3" class="dash-ele">
                    <i class="fas fa-2x fa-paper-plane"></i>
                    <span class="dash-name">Plans</span>
                </div>

                <div onclick="openPage('setting', this);settings()"  id="item4" class="dash-ele">
                    <i class="fas fa-2x fa-sliders-h"></i>
                    <span class="dash-name">Settings</span>
                </div>

                <div onclick="window.location.href='../php/logout.php'" type="submit" class="dash-ele">
                    <i class="fas fa-2x fa-sign-out"></i>
                    <span class="dash-name">Logout</span>
                </div>
                <div class="sp"></div>
                <div class="dash-usr" onclick="window.location.href='profile.php'">
                    <div><i class="fas fa-3x fa-user-circle"></i></div>
                    <div class="dash-name" style="font-size:24px">
                        <?php
                            $name=$_SESSION['fname']." ".$_SESSION['lname'];
                            echo"$name";
                        ?>
                        <p style="font-size:12px">Customer</p>
                    </div>
                </div> 
            </div>
            <div class="center">
                <div class="center-usr">
                    <div><i class="fas fa-4x fa-user-circle"></i></div>
                    <div class="dash-name" style="font-size:28px ;margin-top:-6px;">
                        <?php
                            $name="Hello, ".$_SESSION['fname'];
                            echo"$name";
                        ?>
                        <p style="font-size:16px;">Have a nice Day!!</p>
                    </div>
                </div>
                <div class="center-content">
                    <div id="daash" class="tabcontent" style="width:100%; height:110%;overflow-y:scroll;">
                        <p>1Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus ullam aliquid doloremque, necessitatibus corrupti natus quae facilis, perferendis rem doloribus dolor excepturi alias! Ipsam, maiores animi vero molestiae qui facilis!</p>
                        <p>A wiki (/ˈwɪki/ (About this soundlisten) WIK-ee) is a hypertext publication collaboratively edited and managed by its own audience directly using a web browser. A typical wiki contains multiple pages for the subjects or scope of the project and may be either open to the public or limited to use within an organization for maintaining its internal knowledge base.

                            Wikis are enabled by wiki software, otherwise known as wiki engines. A wiki engine, being a form of a content management system, differs from other web-based systems such as blog software, in that the content is created without any defined owner or leader, and wikis have little inherent structure, allowing structure to emerge according to the needs of the users.[1] Wiki engines usually allow content to be written using a simplified markup language and sometimes edited with the help of a rich-text editor.[2] There are dozens of different wiki engines in use, both standalone and part of other software, such as bug tracking systems. Some wiki engines are open source, whereas others are proprietary. Some permit control over different functions (levels of access); for example, editing rights may permit changing, adding, or removing material. Others may permit access without enforcing access control. Other rules may be imposed to organize content.

                            The online encyclopedia project Wikipedia is the most popular wiki-based website, and is one of the most widely viewed sites in the world, having been ranked in the top ten since 2007.[3] Wikipedia is not a single wiki but rather a collection of hundreds of wikis, with each one pertaining to a specific language. In addition to Wikipedia, there are hundreds of thousands of other wikis in use, both public and private, including wikis functioning as knowledge management resources, notetaA wiki (/ˈwɪki/ (About this soundlisten) WIK-ee) is a hypertext publication collaboratively edited and managed by its own audience directly using a web browser. A typical wiki contains multiple pages for the subjects or scope of the project and may be either open to the public or limited to use within an organization for maintaining its internal knowledge base.

                            Wikis are enabled by wiki software, otherwise known as wiki engines. A wiki engine, being a form of a content management system, differs from other web-based systems such as blog software, in that the content is created without any defined owner or leader, and wikis have little inherent structure, allowing structure to emerge according to the needs of the users.[1] Wiki engines usually allow content to be written using a simplified markup language and sometimes edited with the help of a rich-text editor.[2] There are dozens of different wiki engines in use, both standalone and part of other software, such as bug tracking systems. Some wiki engines are open source, whereas others are proprietary. Some permit control over different functions (levels of access); for example, editing rights may permit changing, adding, or removing material. Others may permit access without enforcing access control. Other rules may be imposed to organize content.

                            The online encyclopedia project Wikipedia is the most popular wiki-based website, and is one of the most widely viewed sites in the world, having been ranked in the top ten since 2007.[3] Wikipedia is not a single wiki but rather a collection of hundreds of wikis, with each one pertaining to a specific language. In addition to Wikipedia, there are hundreds of thousands of other wikis in use, both public and private, including wikis functioning as knowledge management resources, notetaking tools, community websites, and intranets. The English-language Wikipedia has the largest collection of articles: as of February 2020, it has over 6 million articles. Ward Cunningham, the developer of the first wiki software, WikiWikiWeb, originally described wiki as "the simplest online database that could possibly work."[4] "Wiki" (pronounced [ˈwiki][note 1]) is a Hawaiian word meaning "quick."[5][6][7]A wiki (/ˈwɪki/ (About this soundlisten) WIK-ee) is a hypertext publication collaboratively edited and managed by its own audience directly using a web browser. A typical wiki contains multiple pages for the subjects or scope of the project and may be either open to the public or limited to use within an organization for maintaining its internal knowledge base.

                            Wikis are enabled by wiki software, otherwise known as wiki engines. A wiki engine, being a form of a content management system, differs from other web-based systems such as blog software, in that the content is created without any defined owner or leader, and wikis have little inherent structure, allowing structure to emerge according to the needs of the users.[1] Wiki engines usually allow content to be written using a simplified markup language and sometimes edited with the help of a rich-text editor.[2] There are dozens of different wiki engines in use, both standalone and part of other software, such as bug tracking systems. Some wiki engines are open source, whereas others are proprietary. Some permit control over different functions (levels of access); for example, editing rights may permit changing, adding, or removing material. Others may permit access without enforcing access control. Other rules may be imposed to organize content.

                            The online encyclopedia project Wikipedia is the most popular wiki-based website, and is one of the most widely viewed sites in the world, having been ranked in the top ten since 2007.[3] Wikipedia is not a single wiki but rather a collection of hundreds of wikis, with each one pertaining to a specific language. In addition to Wikipedia, there are hundreds of thousands of other wikis in use, both public and private, including wikis functioning as knowledge management resources, notetaking tools, community websites, and intranets. The English-language Wikipedia has the largest collection of articles: as of February 2020, it has over 6 million articles. Ward Cunningham, the developer of the first wiki software, WikiWikiWeb, originally described wiki as "the simplest online database that could possibly work."[4] "Wiki" (pronounced [ˈwiki][note 1]) is a Hawaiian word meaning "quick."[5][6][7]A wiki (/ˈwɪki/ (About this soundlisten) WIK-ee) is a hypertext publication collaboratively edited and managed by its own audience directly using a web browser. A typical wiki contains multiple pages for the subjects or scope of the project and may be either open to the public or limited to use within an organization for maintaining its internal knowledge base.

                            Wikis are enabled by wiki software, otherwise known as wiki engines. A wiki engine, being a form of a content management system, differs from other web-based systems such as blog software, in that the content is created without any defined owner or leader, and wikis have little inherent structure, allowing structure to emerge according to the needs of the users.[1] Wiki engines usually allow content to be written using a simplified markup language and sometimes edited with the help of a rich-text editor.[2] There are dozens of different wiki engines in use, both standalone and part of other software, such as bug tracking systems. Some wiki engines are open source, whereas others are proprietary. Some permit control over different functions (levels of access); for example, editing rights may permit changing, adding, or removing material. Others may permit access without enforcing access control. Other rules may be imposed to organize content.

                            The online encyclopedia project Wikipedia is the most popular wiki-based website, and is one of the most widely viewed sites in the world, having been ranked in the top ten since 2007.[3] Wikipedia is not a single wiki but rather a collection of hundreds of wikis, with each one pertaining to a specific language. In addition to Wikipedia, there are hundreds of thousands of other wikis in use, both public and private, including wikis functioning as knowledge management resources, notetaking tools, community websites, and intranets. The English-language Wikipedia has the largest collection of articles: as of February 2020, it has over 6 million articles. Ward Cunningham, the developer of the first wiki software, WikiWikiWeb, originally described wiki as "the simplest online database that could possibly work."[4] "Wiki" (pronounced [ˈwiki][note 1]) is a Hawaiian word meaning "quick."[5][6][7]king tools, community websites, and intranets. The English-language Wikipedia has the largest collection of articles: as of February 2020, it has over 6 million articles. Ward Cunningham, the developer of the first wiki software, WikiWikiWeb, originally described wiki as "the simplest online database that could possibly work."[4] "Wiki" (pronounced [ˈwiki][note 1]) is a Hawaiian word meaning "quick."[5][6][7]
                        </p>
                    </div>

                    <div id="projects" class="tabcontent" style="width:100%; height:100%; ">
                        <div class="empty shadow" id="empty">
                            <p class="em"style="font-size:50px;">Nothing In Here</p>
                            <p class="em"style="font-size:30px;margin-bottom: 70px;">Try creating a new project</p>
                            <div class="create-btn" onclick="<?php if(!isset($_SESSION['plan'])){echo "openPage('plans', this);plans()";}else{echo "next('empty')";}?>;">
                                <i class="fas fa-1x fa-plus"></i>
                                <span style="font-size:20px;">&nbsp Create Project</span> 
                            </div>
                        </div>
                        <div class="step1" id="step1">
                            <span style="font-size:40px">Tell us what you need done.</span>
                            <div class="prog">
                                <span>It'll Just Take A Few Steps</span>
                                <div style="display:flex;margin-top:10px">
                                    <div style="background:#6089FF; width:250px; height:10px;margin-right:3px"></div>
                                    <div style="background:#efefef; width:250px; height:10px; margin-right:3px"></div>
                                    <div style="background:#efefef; width:250px; height:10px;"></div>
                                </div>
                            </div>
                            <div class="step-content">
                                <span style="font-size:24px">Choose a name for your project<br></span>
                                <input type="text" placeholder="eg. MakeX" class="inp">
                                <span style="font-size:24px">Tell us about project<br></span>
                                <span style="font-size:18px">Select platform<br></span>
                                <select name="" id="" class="inp">
                                    <option value="" selected hidden disabled>Nothing Selected</option>
                                    <option value="Android">Android</option>
                                    <option value="IOS">IOS</option>
                                    <option value="Mac Os">Mac Os</option>
                                    <option value="Windows">Windows</option>
                                    <option value="Linux">Linux</option>
                                    <option value="CrossPlatform">CrossPlatform</option>
                                </select>
                                <span style="font-size:18px">Select Domain<br></span>
                                <select name="" id="" class="inp">
                                    <option value="" selected hidden disabled>Nothing Selected</option>
                                    <option value="Website">Website</option>
                                    <option value="Web Application">Web Application</option>
                                    <option value="Native Software">Native Software</option>
                                    <option value="CrossPlatform Software">CrossPlatform Software</option>
                                </select>
                                <textarea name="" id="" style="padding:5px;resize:none;"placeholder="Describe your project here..."></textarea>
                                <div class="upload">
                                    <div>
                                        <button><i class="fas fa-1x fa-plus"></i> Upload</button>
                                    </div>
                                    <div>
                                        <span style="font-size:18px">
                                             Drag & drop any images or documents that might be helpful in <br>explaining your brief here (Max file size: 25 MB).
                                        </span>
                                    </div>
                                </div>
                                <button onclick="next('step1')">Next</button>
                            </div>
                        </div>
                        <div id="step2" style="height:120%">
                            <span style="font-size:40px">Tell us when you need it done.</span>
                            <div class="prog">
                                <Span>Almost Done</Span>
                                <div style="display:flex;margin-top:10px">
                                    <div style="background:#6089FF; opacity:.5;width:250px; height:10px;margin-right:3px"></div>
                                    <div style="background:#6089FF; width:250px; height:10px; margin-right:3px"></div>
                                    <div style="background:#efefef; width:250px; height:10px;"></div>
                                </div>
                            </div>
                            <div class="step-content">
                                <div class="s2-plan">
                                    <?php
                                        if($_SESSION['plan']=='Basic'){
                                            echo '<div style="display:flex"><img class="plan-img" src="..\assets\basic.png" alt=""><span style="font-size:18px;">Your current plan has a minimum delivery time of 1 month
                                            <br>We recommend upgrading your plan for faster delivery.</span></div>';

                                        }
                                        else if($_SESSION['plan']=='Standard'){
                                            echo '<div style="display:flex"><img class="plan-img" src="..\assets\standard.png" alt=""><span style="font-size:18px;">Your current plan has a minimum delivery time of 2 weeks 
                                            <br>We recommend upgrading your plan for faster delivery.</span></div>';

                                        }
                                        else if ($_SESSION['plan']=='Premium'){
                                            echo '<div style="display:flex"><img class="plan-img" src="..\assets\premium.png" alt=""><span style="font-size:18px;">Your current plan has a minimum delivery time of 1 month
                                            <br>We recommend upgrading your plan for faster delivery.</span></div>';

                                        }
                                    ?>
                                </div>
                                <span style="font-size:24px">Select a deadline <br></span>
                                <span>There might be some variation in delivery time, we'll try our best to deliver within the deadline <br></span>
                                <input type="date" style="width:240px;height:40px;margin:10px 0px 15px 0px;"><br>
                                <div style="display flex">
                                    <button onclick="next('step2')">Next</button>
                                    <button onclick="prev('step1')" style="margin-left:558px">Previous</button>
                                </div>
                            </div>
                        </div>
                        <div id="step3">
                            <span style="font-size:40px">Terms Of Use</span>
                            <div class="prog">
                                <Span>Final Step</Span>
                                <div style="display:flex;margin-top:10px">
                                    <div style="background:#6089FF; opacity:.5;width:250px; height:10px;margin-right:3px"></div>
                                    <div style="background:#6089FF; opacity:.5;width:250px; height:10px;margin-right:3px"></div>
                                    <div style="background:#6089FF; width:250px; height:10px; margin-right:3px"></div>
                                </div>
                            </div>
                            <div class="step-content">
                                <div style="display flex">
                                    <button onclick="submit()">Submit</button>
                                    <button onclick="prev('step2')" style="margin-left:558px">Previous</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="plans" class="tabcontent" style="width:100%; height:100%;">
                        <div style="margin-bottom:40px">
                            <H1>Plans that fit your needs</H1>
                            <p>No matter the size of your budget, MakeX has a plan that’s right for you.</p>
                            <hr>
                        </div>
                        <?php if(!isset($_SESSION['plan'])){
                            echo'<div style="display:flex">
                                <div class="basic sel-plan mr-3" style="background:white;width:266px;border-radius:10px" onclick="window.location.href=\'../php/basic.php\'">
                                    <img src="..\assets\basic.png" width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px">
                                    <div style="padding:15px 20px">
                                        <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspDelivery by 4 Weeks</h5>
                                        <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbsp1 Concurrent project</h5>
                                        <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspMaximum 4 project</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspGeneral Support</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspVerified Developers</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspPriority Response</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspVIP Support</h5>
                                    </div>
                                </div>
                                <div class="standard  sel-plan mr-3" style="background:white;width:266px;border-radius:10px" onclick="window.location.href=\'../php/standard.php\'">
                                    <img src="..\assets\standard.png" width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px">
                                    <div style="padding:15px 20px">
                                        <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspDelivery by 2 Weeks</h5>
                                        <h5 class="text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i>&nbsp2 Concurrent projects</h5>
                                        <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspMaximum 8 project</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspGeneral Support</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspVerified Developers</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspPriority Response</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspVIP Support</h5>
                                    </div>
                                </div>
                                <div class="premium sel-plan" style="background:white;width:266px;border-radius:10px">
                                    <img src="..\assets\premium.png"width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px" onclick="window.location.href=\'../php/premium.php\'">
                                    <div style="padding:15px 20px">
                                        <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspDelivery by 1 Weeks</h5>
                                        <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbsp4 Concurrent project</h5>
                                        <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspMaximum 15 project</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspGeneral Support</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVerified Developers</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspPriority Response</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVIP Support</h5>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:20px;font-size:11px">
                                    <hr>
                                    <p>Prices do not include applicable taxes, which are determined according to your billing address.
                                    The final price can be seen on the purchase page, before payment is completed. Plans are subject to the <a href="#">Terms of Use </a>please read the terms carefully.</p>
                            </div>';
                        }
                        else{
                            if($_SESSION['plan']=='Basic'){
                                echo '<div style="display:flex;margin-left:50px;margin-top:20px;">
                                        <div>
                                            <div class="basic sel-plan mr-3" style="background:white;width:266px;border-radius:10px">
                                                <img src="..\assets\basic.png" width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px">
                                                <div style="padding:15px 70px;">
                                                    <h3 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="font-weight:100"></i> &nbspActive</h3>
                                                </div>
                                            </div>
                                            <button id="upgrade">Upgrade</button>
                                        </div>
                                        <div style="background:white;width:400px;border-radius:10px;margin-left:20px">
                                            <div style="padding:40px 70px">
                                                <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspDelivery by 4 Weeks</h5>
                                                <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbsp1 Concurrent project</h5>
                                                <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspMaximum 4 project</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspGeneral Support</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspVerified Developers</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspPriority Response</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspVIP Support</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top:150px;font-size:11px">
                                        <hr>
                                        <p>Prices do not include applicable taxes, which are determined according to your billing address.
                                        The final price can be seen on the purchase page, before payment is completed. Plans are subject to the <a href="#">Terms of Use </a>please read the terms carefully.</p>
                                    </div>';
                            }
                            else if($_SESSION['plan']=='Standard'){
                                echo '<div style="display:flex;margin-left:50px;margin-top:20px;">
                                        <div>
                                            <div class="basic sel-plan mr-3" style="background:white;width:266px;border-radius:10px">
                                                <img src="..\assets\standard.png" width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px">
                                                <div style="padding:15px 70px;">
                                                    <h3 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="font-weight:100"></i> &nbspActive</h3>
                                                </div>
                                            </div>
                                            <button id="upgrade">Upgrade</button>
                                        </div>
                                        <div style="background:white;width:400px;border-radius:10px;margin-left:20px">
                                            <div style="padding:40px 70px">
                                                <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspDelivery by 2 Weeks</h5>
                                                <h5 class="text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i>&nbsp2 Concurrent projects</h5>
                                                <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspMaximum 8 project</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspGeneral Support</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspVerified Developers</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspPriority Response</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspVIP Support</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top:150px;font-size:11px">
                                        <hr>
                                        <p>Prices do not include applicable taxes, which are determined according to your billing address.
                                        The final price can be seen on the purchase page, before payment is completed. Plans are subject to the <a href="#">Terms of Use </a>please read the terms carefully.</p>
                                    </div>';

                            }
                            else if ($_SESSION['plan']=='Premium'){
                                echo '<div style="display:flex;margin-left:50px;margin-top:20px;">
                                        <div>
                                            <div class="basic sel-plan mr-3" style="background:white;width:266px;border-radius:10px">
                                                <img src="..\assets\premium.png" width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px">
                                                <div style="padding:15px 70px;">
                                                    <h3 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="font-weight:100"></i> &nbspActive</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="background:white;width:400px;border-radius:10px;margin-left:20px">
                                            <div style="padding:40px 70px">
                                                <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspDelivery by 1 Weeks</h5>
                                                <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbsp4 Concurrent project</h5>
                                                <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspMaximum 15 project</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspGeneral Support</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVerified Developers</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspPriority Response</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVIP Support</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top:150px;font-size:11px">
                                        <hr>
                                        <p>Prices do not include applicable taxes, which are determined according to your billing address.
                                        The final price can be seen on the purchase page, before payment is completed. Plans are subject to the <a href="#">Terms of Use </a>please read the terms carefully.</p>
                                    </div>';
                            }
                        }?>
                        
                    </div>

                    <div id="setting" class="tabcontent" style="width:100%; height:100%;">
                        <p>4Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quidem ullam perspiciatis assumenda possimus, ipsum dicta excepturi voluptatum voluptatem laboriosam fugiat, nihil reiciendis iusto qui nulla quia aliquid modi adipisci.</p>
                    </div>
                </div>
            </div>
            <div class="right"></div>   
        </div>
    </body>
</html>







