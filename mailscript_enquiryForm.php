<?

        $mailto="md@navkarengg.com , sales@navkarengg.com"; 
        $pcount=0;
        $gcount=0;
        $subject = "Mail from Enquiry Form";

        $from="mailtest@navkarengg.com";
        while (list($key,$val)=each($_POST))
        {
			if($key == 'name')
			{	
				$name=$val;
				$pstr = $pstr."<tr><td width='100'>Name</td><td>$val</td></tr>";
			}
			if($key == 'compName')
			{	
				$pstr = $pstr."<tr><td width='100'>Company Name</td><td>$val</td></tr>";
			}
			if($key == 'phoneno')
			{	
				$pstr = $pstr."<tr><td width='100'>Phone No.</td><td>$val</td></tr>";
			}
			if($key == 'mobileno')
			{	
				$pstr = $pstr."<tr><td width='100'>Mobile No.</td><td>$val</td></tr>";
			}
			if($key == 'email')
			{	
				$email=$val;
				$pstr = $pstr."<tr><td width='100'>Email Id.</td><td>$val</td></tr>";
			}
			if($key == 'address')
			{	
				$pstr = $pstr."<tr><td width='100'>Address</td><td>$val</td></tr>";
			}
			if($key == 'requ')
			{	
				$pstr = $pstr."<tr><td width='100'>Requirement</td><td>$val</td></tr>";
			}
			
			++$pcount;

        }
        while (list($key,$val)=each($_GET))
        {
        $gstr = $gstr."$key : $val \n ";
        ++$gcount;

        }
        if ($pcount > $gcount)
        {
			
			$headers  = "From: $from\r\n";
			$headers .= "Content-type: text/html\r\n"; 
			$headers .= "Reply-To: $name < $email >"; 
			$pstr="<html><body><table width='400' border='0' cellspacing='2' cellpadding='5'
bordercolor='#FF0000'>$pstr</table><br><br>This is auto generated mail.</body></html>";
			$message_body=$pstr;	
			mail($mailto,$subject,$message_body,$headers);
        
        }
        else
        {
        $message_body=$gstr;

        mail($mailto,$subject,$message_body,"From:".$from);
       echo "Mail has been sent";
        }
		print "<!DOCTYPE html>
<html>
<head>
<script>
function myFunction()
{
alert('Your requirement has been successfully submitted.');
window.location = 'index.html'
}
</script>
</head>

<body onload='myFunction()'>
<h1>Your requirement has been successfully submitted.</h1>
</body>

</html>";

        ?>
