<html>
<!-- #BeginTemplate "/Templates/superdealyo_general_template.dwt" --> 
<head>
<!-- #BeginEditable "doctitle" --> 
<title>SuperDealyo</title>
<!-- #EndEditable --> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="http://superdealyo.simutel.com/superdealyo.rss" rel="alternate" type="application/rss+xml" title="SuperDealyo News" />
<link rel="icon" href="/favicon.ico" type="image/x-icon"/>
<script type="text/javascript" src="../src/jquery.js"></script>
<script type="text/javascript" src="../src/code.js"></script>
</head>
<body bgcolor="#FFFFFF" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td colspan="3" bgcolor="#FFFFFF" height="22"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2"> 
      <a href="../index.html"> <img src="../images/world.png" width="69" height="77" border="0"></a></font><font face="Verdana, Arial, Helvetica, sans-serif" size="+2"><b><font color="#FFFFFF"><a style="text-decoration:none" href="../index.html"><font color="#FF0000" size="+3">Super</font><font color="#0000FF" size="+3">Dealyo</font></a></font></b></font><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000"><b>&#153;</b> 
      </font> <b><font face="Verdana, Arial, Helvetica, sans-serif" size="+2"><b><font color="#FFFFFF"> 
      <font size="1">TM&#153;</font></font></b></font></b> </td>
    <td rowspan="2" bgcolor="#FFFFFF" height="28" width="59%"> <font color="#000000"> 
      <font color="#000000"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"><i> 
      <font size="1" color="#FFFFFF"> </font></i></font></font> <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
      <i></i></font></font> </td>
  </tr>
  <tr> 
    <td colspan="3" bgcolor="#FFFFFF" height="6"> 
      <p><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Bringing 
        location aware deals to your fingertips<b> &reg;</b></font></p>
    </td>
  </tr>
</table>
<table width="100%" border="0" height="22">
  <tr bgcolor="#FFFFCC"> 
    <td colspan="8" height="22" bgcolor="#DFDFDF"> 
      <p align="center">&nbsp; </p>
    </td>
  </tr>
</table>
<?php
   
    //var_dump($_SERVER['QUERY_STRING']);
    $upcid = mysql_escape_string($_GET['upc']);
	//echo "UPC ID:".$upcid;
if($upcid!='')
{

$filename=$upcid;
$filepath='./json/'.$filename;

//echo $filepath;
if(!file_exists($filepath))
{  //echo "File Exists";
	
	//echo $upcid;
	  
	$url="http://www.product-open-data.com/product/$upcid";
  //  echo $url;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$headers=array('Content-type: application/json');
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch, CURLOPT_URL,$url);


$result=curl_exec($ch);

touch('./json/'.$filename);
//echo $filename;
chmod('./json/'.$filename,0777);	
$file=fopen('./json/'.$filename,"w+") or exit("Unable to open file!");
file_put_contents('./json/'.$filename, $result);
fclose($file);
}
}
?>
<input name="upc code" type="hidden" id="upc" value="<?php echo $upcid;?>">

<!-- /.row -->

        <div >

            <div>
                <div>
                    <img id="productimage" src="" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p><ul style="text-align: left;font-weight: bold;">
   			<li id="pcode">Product Code : </li>
   			<li id="pname">Name : </li>
   			<li id="pcat">Category : </li>
   			<li id="weight">Weight : </li>
   			<li id="volume">Volume : </li>
   			<li id="bcode">Brand Code : </li>
   			<li id="bname">Brand Name : </li>
   			<li id="btype">Brand Type : </li>
   			<li id="bwebsite">Brand Website : </li>
   			<!--<li id="bimage">Brand Image : </li>-->
   			
   			
   		</ul></p>
   		<p>
   			<h5 id="bimage" style="text-align: left;margin-left:20px;font-weight: bold;">Brand :</h5><br />
   			
   		</p>
                        <p><a href="#" class="btn btn-primary">Buy Now!</a>  
                        </p>
                    </div>
                </div>
            </div>
 

            

        </div>
        <!-- /.row -->


<table width="100%" border="0" height="8" bgcolor="#FFFFFF">
  <tr bgcolor="#6699FF" bordercolor="#FFFFFF"> 
    <td height="2" nowrap> 
      <div align="right"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFFFF"><a href="index.html" target="_self"> 
        </a><a href="../vendor/vendor.html" target="_self">Vendors</a> 
        <a href="../about/about.html" target="_blank">About</a> 
        <a href="../career/career.html" target="_blank">Career</a> 
        <a href="../privacy/privacy.html" target="_blank">Privacy</a> 
        <a href="../help/help.html" target="_blank">Help</a></font></div>
    </td>
  </tr>
</table>
<table width="100%" border="0" height="1%">
  <tr bgcolor="#FFFFFF"> 
    <td width=" " height="7"> 
      <div align="center"><img src="../images/facebook.JPG" width="20" height="20"><img src="../images/twitter.JPG" width="20" height="20"><img src="../images/RSS.JPG" width="20" height="20"></div>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width=" " height="2"> 
      <p align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">Copyright 
        &copy; 2013 SuperDealyo</font></p>
    </td>
  </tr>
</table>
</body>
<!-- #EndTemplate -->
</html>

