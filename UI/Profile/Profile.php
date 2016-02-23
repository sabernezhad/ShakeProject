<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Untitled Page</title>
    <link rel=Stylesheet href="UI/Profile/master.css" type="text/css" />
    <link rel=Stylesheet href="UI/Profile/css.css" type="text/css" />
 
    <link rel=Stylesheet href="UI/Profile/friends.css" type="text/css" />
   <link rel=Stylesheet href="UI/Profile/chat.css" type="text/css" />
    <link rel=Stylesheet href="UI/Profile/share-chat.css" type="text/css" />
    <script type="text/javascript" src="UI/Profile/jquery.js"></script>
    <script type="text/javascript" src="UI/Profile/scripts.js"></script>


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
                	<img src="UI/Profile/images/search-corner.png" id="header-search-corner">
               
                	<input type=text id="UI/Profile/header-search-text" value="Enter Search Here..." />
                
                	<img src="UI/Profile/images/btn-search.png" title="Search" id="header-search-button">
            	</div>
           
	     </div><!--end of orange line-->
	   </div><!--end of shell div -->

        </div><!--end of header-->

	 <div   style="clear:both"></div>

	<div id="panelss" class="shell">
        <div id="item1Panel" class="panel" style="background-image:url('UI/Profile/images/panel-b.png');top:80px;"> <a href="#"><img style="margin-left:41px;margin-top:-15px;" src="UI/Profile/images/messageBox.png" title="Message Box"/> </a></div>
        <div id="item2Panel" class="panel" style="background-image:url('UI/Profile/images/panel-r.png');top:100px;"> <a href="#"><img style="margin-left:39px;margin-top:-15px;" src="UI/Profile/images/friends.png" title="Friends" /> </a> </div>
        <div id="item3Panel" class="panel" style="background-image:url('UI/Profile/images/panel-b.png');top:120px;"> <a href=""><img style="margin-left:42px;margin-top:-15px;" src="UI/Profile/images/archive.png" title="Archive" /> </a></div>
        <div id="item4Panel" class="panel" style="background-image:url('UI/Profile/images/panel-r.png');top:140px;"> <a href=""><img style="margin-left:45px;margin-top:-15px;" src="UI/Profile/images/forum.png" title="Forum" /> </a></div>
	<div id="item5Panel" class="panel" style="background-image:url('UI/Profile/images/panel-b.png');top:160px;"> <a href=""><img style="margin-left:45px;margin-top:-15px;" src="UI/Profile/images/setting.png" title="Setting" />  </a></div>
	
	</div> <!--end of panelss-->
 <div style="clear:both"></div>  

	 <div id="content" class="shell">



         <div id="profile-avatar" src="UI/Profile/images/profile-avatar.jpg" alt="Profile Picture" ></div>
           <img id="edit-coverPhoto" src="UI/Profile/images/edit-icon.png" title="change photo" />
	 <div id="PersonInfo">
                <div id="PersonInfo-ID">FName LName</div>
                <div id="PersonInfo-Status">
                    <img id="PersonInfo-Status-Picture" src="UI/Profile/images/PersonInfo-pic.png" />
                    <div id="PersonInfo-Status-Text">Looking for job</div>
                </div>
                <div id="PersonInfo-MoreInfo" title="More Info">More Info</div>
		<img id="PersonInfo-edit" src="UI/Profile/images/user_edit.png" title="edit info"/>
            </div>


            <div id="share-chat">
                 
                    <img id="avatar"  src="UI/Profile/images/avatar.png" />

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
                        <img id="ShareOpen" src="UI/Profile/images/uploadIcon.png" alt="Upload" title="Upload"/>
                        <img id="ShareWrite" src="UI/Profile/images/textIcon.png" alt="Write" title="Write"/>
                    </div>

                 
                    <div id="RecentPosts">

                  	  <div style="margin-left:30px;float:left;margin-top:10px;">
				<b><span style="color:#b0ce08">Your Wall Posts</span></b>
			    </div>

                 	   <img src="UI/Profile/images/arrowDown.png" alt="shift" title="Open" style="cursor:pointer;float:right;margin-right:20px;" />
                    </div>

                    <div id="seprator">
                    </div>

		<!--****************************************-->
 		<div id="recent-post">
                        <div id="post">
                            <div id="chat" class=border-out>
                                <div id="chat-date">
                                    <div id="chat-date-day">
                       			 25
                        		</div>
                                    <div id="chat-date-month">
                        		 Sep
                        	     </div>
                                </div> <!--end of chat date-->
  
                                <div id="chat-body" class=border-in>
				 
                                   <div id="chat-identity">
                                      <img id="chat-avatar"  src="UI/Profile/images/avatar.png"/>
				   </div>

					<table id="postproperty">
						<tr>
							<td>
 							   <div id="chat-id">
                                      			     Friend'sName Lname
                                  		           </div>
							</td>
						</tr>
						<tr>
							<td>
   								<div id="chat-status">
                                 				     Looking for Job
                                 			        </div>
							</td>
						</tr>
						<tr>
							<td>
  								<div id="chat-time">
                                       					<img id="chat-clock" src="UI/Profile/images/chat-clock.png" />
                                       					<div id="chat-digital-time">
                                          					11:24 PM
                                       					</div>
                                   				</div>
							</td>
						</tr>
					</table>
                                    
                                   <div id="chat-txt">
                                      salam be hamegiiiii<br>

                                      khubin???<br> 
                                      :))))))))))))))))
                                   </div>
                                   <div id="chatmenu" class="Menus" >
                               		<img id="chat-comment-pic" src="UI/Profile/images/commentIcon.png" title="Comment" />
                               		<img id="chat-like-pic" src="UI/Profile/images/starIcon.png" title="Like" />
                               		<img id="chat-block-pic" src="UI/Profile/images/ignorIcon.png" title="Block" />
                            	   </div> 
                        	</div><!--end of chat-body-->
                     	   </div><!--end of chat-->



			   <div id="chat-comment">     
                                <div id="comment-old">
                                    <div id="comment-old-post">
                                        <img id="comment-old-post-avatar" />
                                        <div id="comment-old-post-ID">Friend'sFName LName: </div>
                                        <div id="comment-old-post-body">
                                        SalAAaaaaAAAAm :))))
                                        </div>
                                    </div>
                                </div>
                                <div id="comment-new">
                                    <img id="comment-new-avatar" />
                                    <div id="comment-new-ID">FName LName:</div>
                                    <div id="comment-new-body">
                                       <textarea id="comment-new-txt"> Enter new comment here...</textarea>
                                       <img id="comment-new-send-btn" src="UI/Profile/images/send-comment.png" title="send" />
                                       <img id="comment-new-cancel-btn" src="UI/Profile/images/cancel-comment.png" title="block" />
                                    </div>
                                    
                                </div>
                            </div><!--end of chat comment-->

			</div><!--end of post-->


			<div id="morepost" align="center">
				<div id="leftLine" class="greenline" ></div>
				<div id="greenBtn">
					<p> see more </p>
					<img src="UI/Profile/images/arrowdown2.png"/>
				</div>
				<div id="rightLine" class="greenline"></div>
			</div>
		     </div><!--end of recent-post-->


		<!--****************************************-->
                
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
                <div id="chat-menu" class=Menus>
                    <div id="friends-count"><a  style="text-decoration:none ; color:gray" href="#" >See all <span id="numOfFriends" style="color:#ff9000" > 4 </span> friends</a></div>
                </div>
                
            </div><!--end of friends list-->

            <div id="chat-list" class="border-out">
                <div id="chatbody" class="border-in">
				<h3 >Online friends</h3></tr>
                    <table id="chat-table" class="tables">   
		
                        <tr>
                            <td>
                                <img src="UI/Profile/images/shape.png" />
                            </td>
                            <td>
                                <p>friend1</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Profile/images/shape.png" />
                            </td>
                            <td>
                                <p>friend2</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Profile/images/shape.png" />
                            </td>
                            <td>
                                <p>friend3</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Profile/images/shape.png" />
                            </td>
                            <td>
                                <p>friend4</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Profile/images/shape.png" />
                            </td>
                            <td>
                                <p>friend5</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Profile/images/shape.png" />
                            </td>
                            <td>
                                <p>friend6</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="UI/Profile/images/shape.png" />
                            </td>
                            <td>
                                <p>friend7</p>
                            </td>
                        </tr>
                    </table>
                </div><!--end of chat body -->

                <div id="chatmenu2" class="Menus">

			<img id="shape" src="images/shape.png" title="Comment" />
			<div id="PersonName" >FName</div>
                        <a href="#"> <img id="setting" src="UI/Profile/images/settingIcon.png" title="Block" />
                        </a>   	
         
                </div>
            </div><!--end of chatlist-->

        </div><!--end of content-->
	

<div id="fulFooter" style="margin-top:-14px">
<div id="footerBack"></div>
        <div id="footer" >
	    <div class="shell" style="height:200px">
	      <div id="orangeLine2" >
		<div id="paras">
               		<p>© All Rights Reserved by</p>
			<img src="UI/Profile/images/footerlogo.png"/>
			<p>Company 2012</p>
           	</div>
	       <table style="margin-right:90px;">
                <row>
                     <td><a href="#">Home</a></td>
                     <td><a href="#" style="border-left:1px solid black;border-right:1px solid black;">Profile</a></td>
                     <td><a href="#">Sign Out</a></td>
                 </row>
            	</table>
  	      </div><!--end of orangeLine-->
	    </div><!--end of shell div -->


	</div><!--end of footer-->
</div><!--end of fulFooter-->
    </div><!--end of main-->
</body>
</html>
