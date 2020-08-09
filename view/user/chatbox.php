<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form action="" class="form-container">
    <h3><span style="color: white;text-align: center;">Admin</span></h3>

    <div class="chatlog">
		<div class="chatbox darker">
		  <img src="public/img/admin.png" alt="Avatar" class="right">
		  <p>Xin Chào Anh/Chị</p>
		  <span class="time-left">11:01</span>
		</div>

		<div class="chatbox">
		  <img src="public/img/user.png" alt="Avatar">
		  <p>Sweet! So, what do you wanna do today?</p>
		  <span class="time-right">11:02</span>
		</div>

		<div class="chatbox darker">
		  <img src="public/img/admin.png" alt="Avatar" class="right">
		  <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
		  <span class="time-left">11:05</span>
		</div>
		<div class="chatbox darker">
		  <img src="public/img/admin.png" alt="Avatar" class="right">
		  <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
		  <span class="time-left">11:05</span>
		</div>
    </div>
    <textarea placeholder="Nhập nội dung.." name="msg" required></textarea>
    
    
    <div class="row btn-chat">
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    		<button type="button" class="btn cancel" onclick="closeForm()">Close</button>		
    	</div>
    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
    		<button type="submit" class="btn">Send</button>
    	</div>
    </div>
  </form>
</div>