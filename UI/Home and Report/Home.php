<?php 
include_once 'function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Shake - Home</title>
    <link rel=Stylesheet href="UI/Home and Report/master.css" type="text/css" />
    <link rel=Stylesheet href="UI/Home and Report/css.css" type="text/css" />
 
    <link rel=Stylesheet href="UI/Home and Report/friends.css" type="text/css" />
   <link rel=Stylesheet href="UI/Home and Report/chat.css" type="text/css" />
    <link rel=Stylesheet href="UI/Home and Report/share-chat.css" type="text/css" />
    <script type="text/javascript" src="UI/Home and Report/jquery.js"></script>
    <script type="text/javascript" src="UI/Home and Report/scripts.js"></script>
	<script type="text/javascript" src="UI/Home and Report/ajax.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		
			$('#chat-comment').hide();
			
			$('#signouttab').hover(
			function(){$('#hometab').css('z-index','0').css;$(this).css('z-index','10').css('background-color','#EFF809');}
			,function(){$('#hometab').css('z-index','2');$(this).css('z-index','0').css('background-color','#C6E132');}
			);
			$('#profiletab').hover(
			function(){$('#hometab').css('z-index','0');$(this).css('z-index','10').css('background-color','#EFF809');},
			function(){$('#hometab').css('z-index','2');$(this).css('z-index','1').css('background-color','#C6E132');}
			);
			$('#hometab').hover(
			function(){$('#hometab').css('z-index','0');$(this).css('z-index','10').css('background-color','#EFF809');},
			function(){$('#hometab').css('z-index','2');$(this).css('z-index','2').css('background-color','#C6E132');}
			);
			
			$('#chat-comment-pic').click(
				function()
				{
					$('#chat-comment').slideToggle("slow");
				}
			);
			
		});
	</script>



</head>
<body>

    <div id="main">

				<!--********************* header *********************-->


	<div id="headerBack" ></div>
        <div id="header"  >
		
	  <div class="shell" style="height:400px">
 	    <div id="tabs" style="margin-bottom:-100px;margin-right:-30px">
                <div id="signouttab">
                    <p>Sign Out</p>
                </div>
                
                <div id="profiletab">
                    <p>Profile</p>
                </div>
                <div id="hometab">
                    <p>Home</p>
                </div>
             </div><!--end of tabs-->

	    <div id="orangeLine">
                <div id="logo"></div>

            	<div id="header-search">
                	<img src="UI/Home and Report/images/search-corner.png" id="header-search-corner">
               
                	<input type=text id="header-search-text" value="Enter Search Here..." />
                
                	<img src="UI/Home and Report/images/btn-search.png" title="Search" id="header-search-button">
            	</div>
           
	     </div><!--end of orange line-->
	   </div><!--end of shell div -->

        </div><!--end of header-->


				<!--********************* header *********************-->


				<!--****************** left panels *********************-->

	 <div   style="clear:both"></div>

	<div id="panelss" class="shell">
               <div id="item1Panel" class="panel" style="background-image:url('UI/Home and Report/images/panel-b.png');top:80px;"> <a href="#"><img style="margin-left:41px;margin-top:-15px;" src="UI/Home and Report/images/messageBox.png" title="Message Box"/> </a></div>
        <div id="item2Panel" class="panel" style="background-image:url('UI/Home and Report/images/panel-r.png');top:100px;"> <a href="#"><img style="margin-left:39px;margin-top:-15px;" src="UI/Home and Report/images/friends.png" title="Friends" /> </a> </div>
        <div id="item3Panel" class="panel" style="background-image:url('UI/Home and Report/images/panel-b.png');top:120px;"> <a href=""><img style="margin-left:42px;margin-top:-15px;" src="UI/Home and Report/images/archive.png" title="Archive" /> </a></div>
        <div id="item4Panel" class="panel" style="background-image:url('UI/Home and Report/images/panel-r.png');top:140px;"> <a href=""><img style="margin-left:45px;margin-top:-15px;" src="UI/Home and Report/images/forum.png" title="Forum" /> </a></div>
	<div id="item5Panel" class="panel" style="background-image:url('UI/Home and Report/images/panel-b.png');top:160px;"> <a href=""><img style="margin-left:45px;margin-top:-15px;" src="UI/Home and Report/images/setting.png" title="Setting" />  </a></div>
 	</div> <!--end of panelss-->
 	<div style="clear:both"></div>  

				<!--****************** left panels *********************-->


				<!--******************** content *********************-->

	 <div id="content" class="shell">


				<!--******************** share *********************-->

            <div id="share-chat">
                    <h1 id="personID">
                        <?php PrintUserNameAndFamily(0);?>
                    </h1>

                    <img id="avatar"  src="UI/Home and Report/images/<?php PrintUserAvatar(0);?>" />

                    <div id="share" class="border-out">
                        <div id="share-background" class="border-in">
                            <div id="share-body">
                                <textarea id="txtShareBody" class="ShareEmpty">Share what ever you want...</textarea>
                            </div>
                         </div>
                    </div>

                    <div id="btnShare" title="Share">
                     <p>Share</p>
                    </div> 

                    <div id="ShareMenu" class="Menus" style="margin-top:-20px">
                        <img id="ShareOpen" src="UI/Home and Report/images/uploadIcon.png" alt="Upload" title="Upload"/>
                        <img id="ShareWrite" src="UI/Home and Report/images/textIcon.png" alt="Write" title="Write"/>
                    </div>

				<!--******************** green line *********************-->
                 
                    <div id="RecentPosts">

                  	  <div style="margin-left:30px;float:left;margin-top:10px;">
				<b><span style="color:#b0ce08">Recent Posts From Your Friends</span></b>
			    </div>

                 	   <img src="UI/Home and Report/images/arrowDown.png" alt="shift" title="Open" style="cursor:pointer;float:right;margin-right:20px;" />
                    </div>

                    <div id="seprator">
                    </div>

				<!--******************** green line *********************-->



				<!--********************* wall posts *******************-->

 		<div id="recent-post">
 		<script>

		window.onload=fivelastpost(0) ; 
		</script>
          <div id="post">
		<div id="chat" class=border-out>
		<div id="chat-date">
		<div id="chat-date-day">5</div>
		<div id="chat-date-month">Jan</div>
		</div>
		<!--end of chat date-->
		
		<div id="chat-body" class=border-in>
		
		<div id="chat-identity">
		<img id="chat-avatar" src="UI/Home and Report/images/'.PrintUserAvatar(1).'" />
		</div>
		
		<table id="postproperty">
		<tr>
		<td>
		<div id="chat-id">Fname Lname</div>
		</td>
		</tr>
		<tr>
		<td>
		<div id="chat-status">Employee</div>
		</td>
		</tr>
		<tr>
		<td>
		<div id="chat-time">
		<img id="chat-clock"
		src="UI/Home and Report/images/chat-clock.png" />
		<div id="chat-digital-time">11:24 PM</div>
		</div>
		</td>
		</tr>
		</table>
		
		<div id="chat-txt">
		salaaaam
		</div>
		<div id="chatmenu" class="Menus">
		<img id="chat-comment-pic"
		src="UI/Home and Report/images/commentIcon.png" title="Comment" />
		<img id="chat-like-pic" src="UI/Home and Report/images/starIcon.png"
		title="Like" /> <img id="chat-block-pic"
		src="UI/Home and Report/images/ignorIcon.png" title="Block" />
		</div>
		</div>
		</div>
		
		
		
		</div>          

			
				<!--******************** see more button *********************-->

			<div id="morepost" align="center">
				<div id="leftLine" class="greenline" ></div>
				<div id="greenBtn">
					<p> see more </p>
					<img src="UI/Home and Report/images/arrowdown2.png"/>
				</div>
				<div id="rightLine" class="greenline"></div>
			</div>


				<!--******************** see more button *********************-->


		     </div><!--end of recent-post-->


		<!--****************************************-->
                

				<!--******************** friends list *********************-->
            </div>
            <div id="friends-list" class=border-out>
                <div id="friendsbody" class=border-in>
			<h2 >Friends</h2></tr>
                    <table id="friends-table" class="tables" style="margin-top:-35px;">      
                        <tr>
                            <td>
                                <img />
                            </td>
                            <td>
                                 <p>friend1</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img  />
                            </td>
                            <td>
                                <p>friend2</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img  />
                            </td>
                            <td>
                                <p>friend3</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img  />
                            </td>
                            <td>
                                <p>friend4</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img />
                            </td>
                            <td>
                                <p>friend5</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img />
                            </td>
                            <td>
                                <p>friend6</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img />
                            </td>
                            <td>
                                <p>friend7</p>
                            </td>
                        </tr>
                    </table>
                </div><!--end of friends body-->


				<!--******************** friends menu *********************-->

                <div id="chat-menu" class=Menus>
                    <div id="friends-count"><a  style="text-decoration:none ; color:gray" href="#" >See all <span id="numOfFriends" style="color:#ff9000" > 4 </span> friends</a></div>
                </div>

                		<!--******************** friends menu *********************-->

            </div><!--end of friends list-->


				<!--******************** friends list ( right ) *********************-->


				<!--******************** chat ( right ) *********************-->


            <div id="chat-list" class="border-out">
                <div id="chatbody" class="border-in">
				<h3 >Online friends</h3></tr>
                    <table id="chat-table" class="tables">   
		
                        <tr>
                            <td>
                                <img src="UI/Home and Report/images/shape.png" />
                            </td>
                            <td>
                                <p>friend1</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Home and Report/images/shape.png" />
                            </td>
                            <td>
                                <p>friend2</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Home and Report/images/shape.png" />
                            </td>
                            <td>
                                <p>friend3</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Home and Report/images/shape.png" />
                            </td>
                            <td>
                                <p>friend4</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Home and Report/images/shape.png" />
                            </td>
                            <td>
                                <p>friend5</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Home and Report/images/shape.png" />
                            </td>
                            <td>
                                <p>friend6</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Home and Report/images/shape.png" />
                            </td>
                            <td>
                                <p>friend7</p>
                            </td>
                        </tr>
                    </table>
                </div><!--end of chat body -->

				<!--******************** chat menu *********************-->

                <div id="chatmenu2" class="Menus">

			<img id="shape" src="UI/Home and Report/images/shape.png" title="Comment" />
			<div id="PersonName" >FName</div>
                        <a href="#"> <img id="setting" src="UI/Home and Report/images/settingIcon.png" title="Block" />
                        </a>   	
         
                </div>

				<!--******************** chat menu *********************-->

            </div><!--end of chatlist-->

				<!--******************** chat ( right ) *********************-->

        </div><!--end of content-->

				<!--******************** content *********************-->




				<!--******************** footer *********************-->
	

<div id="fulFooter" style="margin-top:-14px">
<div id="footerBack"></div>
        <div id="footer" >
	    <div class="shell" style="height:200px">
	      <div id="orangeLine2" > 
		<div id="paras">
               		<p>© All Rights Reserved by</p>
			<img src="UI/Home and Report/images/footerlogo.png"/>
			<p>M.R Sabernezhad</p>
           	</div>
	        <table style="margin-right:90px;">
                <row>
                     <td><a href="#">Home</a></td>
                     <td><a href="" id="profilefooter"style="border-left:1px solid black;border-right:1px solid black;">Profile</a></td>
                     <td><a href="" style="border-right:1px solid black;">Report</a></td>
                     <td><a href="" id="signoutfooter">Sign Out</a></td>
                 </row>
            </table>
  	      </div><!--end of orangeLine-->
	    </div><!--end of shell div -->


	</div><!--end of footer-->
</div><!--end of fulFooter-->


				<!--******************** footer *********************-->

    </div><!--end of main-->
</body>
</html>
