<?php
  $posted=false;
    if(isset($_POST['submit']))
    {
	    $posted=true;
    	//The form has been submitted, prep a nice thank you message
    	$output = '<h1>Thanks for your file and message!</h1>';
    	//Set the form flag to no display (cheap way!)
    	$flags = 'style="display:none;"';
        $emailId='kowshick@kowshick.5gbfree.com';
    	//Deal with the email
    	$to = 'b.kowshick@gmail.com';
    	$subject = 'a file for you';
        $Name = strip_tags($_POST['Name']);
    	$message = strip_tags($_POST['message']);
		$FromEmailId = strip_tags($_POST['FromEmailId']);
    	$attachment = chunk_split(base64_encode(@file_get_contents($_FILES['file']['tmp_name'])));
		$filename = 'No File';
    	$filename = $_FILES['file']['name'];

    	$boundary =md5(date('r', time())); 

    	$headers = "From:".$FromEmailId."r\nReply-To:".$FromEmailId;
    	$headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";

    	$message="This is a multi-part message in MIME format.

--_1_$boundary
Content-Type: multipart/alternative; boundary=\"_2_$boundary\"

--_2_$boundary
Content-Type: text/plain; charset=\"iso-8859-1\"
Content-Transfer-Encoding: 7bit

$message

--_2_$boundary--
--_1_$boundary
Content-Type: application/octet-stream; name=\"$filename\" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

$attachment
--_1_$boundary--";

    	mail($to, $subject, $message, $headers);
		   
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kowshick Boddu</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/other.css" rel="stylesheet">
    <!-- Enable fluid response -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <link href="assets/css/bootstrap-responsive.css" rel="stylesheet"> -->

    <script src="bootstrap/js/jquery-latest.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-10620514-6']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
  </head>
  <body data-spy="scroll" data-target=".sideNav">
  <?php
  if( $posted ) {
      if( $Name ) 
        echo "<script type='text/javascript'>alert($Name.'submitted successfully!')</script>";
      else
        echo "<script type='text/javascript'>alert($Name.'failed!')</script>";
    }
  ?>
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="index.html">Kowshick Boddu</a>
          <ul class="nav" id="mainTabs">
            <li><a href="index.html"><i class="icon-home icon-white"></i> Home</a></li>
            <li><a href="projects.html"><i class="icon-cog icon-white"></i> Projects</a></li>
            <li><a href="resume.html"><i class="icon-list-alt icon-white"></i> Resume</a></li>
            <li><a href="courses.html"><i class="icon-book icon-white"></i> Academics</a></li>
            <li class="active"><a href="contact.html"><i class="icon-envelope icon-white"></i> Contact</a></li>
            <!-- <li><a href="#">Link</a></li> -->
          </ul>
        </div>
      </div>
    </div>
	 
    
    <div class="container">
      <div class="row">
        <div class="span3 sideNav">
          <ul id="resumeSideNavBar" class="nav nav-pills nav-stacked affix">
            <li>
                <a href="#contactme">Ping Me</a>
            </li>
            <!-- <li><a href="#">...</a></li> -->
          </ul>
        </div>
        <div class="span7">
          <section id="contactme">
            <div class="control-group">
              <div class="controls">
                                              
				<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
				<table >
				<tr>
				<td><p><i class="icon-envelope"></i>Ping Me with a message</p>
			</table>
			    <p><textarea name="Name" id="Name" cols="3" rows="1" onfocus="this.value=''">Enter your Name</textarea></p>
				<p><textarea name="FromEmailId" id="FromEmailId" cols="3" rows="1" onfocus="this.value=''">Enter your Email Id..</textarea></p>
				</br>
				<p><textarea name="message" id="message" cols="20" rows="5" onfocus="this.value=''">Type in your query here..</textarea></p>
				
				<label for="file">File</label> <input type="file" name="file" id="file">
				</br>
				
				</td>
				</tr>
				<br/>
                
                <p>				
                <i class="icon-upload "></i>			
                <input type="submit" name="submit" id="submit" value="send"></p>
				
				</form>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
	
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43264580-1', 'kowshick.in');
  ga('send', 'pageview');

</script>
  </body>
</html>