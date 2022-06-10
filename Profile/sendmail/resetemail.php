<html> 
	<body style="color: #000; font-size: 16px; text-decoration: none; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #efefef;">
		
		<div id="wrapper" style="max-width: 600px; margin: auto auto; padding: 20px;">
				
			<div id="content" style="font-size: 16px; padding: 25px; background-color: #fff;
				moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px; -khtml-border-radius: 10px;
				border-color: #A3D0F8; border-width: 4px 1px; border-style: solid;">

            <div id="logo" style="">
				<center><h1 style="margin: 0px;"><a href="{SITE_ADDR}" target="_blank" style='color:black; text-decoration:none;' >{EMAIL_LOGO}</a></h1></center>
			</div>
				<span style="color : #000">
				<p style="color : #000" >Hello {TO_NAME},</p>
				<p style="color : #000" >{EMAIL_TITLE}</p>
				<p style="color : #000" >If you haven't send resend code just ignore it.</p>

        </span>
				<p style="display: flex; justify-content: center; margin-top: 10px; color : #000;"><center>
					<a href="{CUSTOM_URL}" target="_blank" style="border: 1px solid #0561B3; background-color: #238CEA; 
					color: #fff; text-decoration: none; font-size: 18px; padding: 10px 20px;">Reset Password</a>
				</center></p>

				<p style="color : #000" > If above button is not working then click below VERIFICATION LINK.</p>

				<a href="{CUSTOM_URL}" target="_blank" >{CUSTOM_URL}</a>
				
			</div>

			<div id="footer" style="margin-bottom: 20px; padding: 0px 8px; text-align: center;">
				<a href="http://www.bimash.com.np" target="_blank" style="text-decoration: none; color: #238CEA;"> © Shangxin</a>, all right reserved.
			</div>
		</div>
	</body>
</html>	