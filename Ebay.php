<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='UTF-8'">
    <title>Jiajia Lin's Homework#5</title>
    <style type="text/css">
        .p1{
                text-align: center;
                bold;
                font-size:30px;
                font-weight:600;
                
               
        }
        .form1{
              border: 3px solid black;
              position:absolute;
              top: 50px;
              left:310px;
              height:150px;
              width:430px;
              margin-left:100px;
              padding-left:20px;
              padding-right:20px;
              padding-top:20px;
              margin-bottom:0px;
}
.p2{
margin-top:-10px;
}
.p3{
margin-top:-10px;
}
.p4{
margin-top:-10px;
}
.street{     border: 2px solid #E9E9E9;
             font-weight:100;
             position: absolute;
             left:130px;
             width: 200px;
             height:23px;
             border-radius: 2px;
             margin-bottom:2px
             }
        .state{border: 2px solid #E9E9E9;
             font-weight:100;
             position: absolute;
             left:130px;
             height:23px;
             border-radius: 2px;
          
             }
        .search{
            background-color: #DBDBDB;
            width:80px;
            height:23px;
            border-radius: 2px;
            border: 1px solid gray;
            font-size:18px;
            font-weight:90;
            position: absolute;
            left:130px;
            margin-top:-10px;
        
        }
        .zillow{position: absolute;
            left:210px;
            width:150px;
            height:40px;
        }
        .notfound{
                  position:absolute;
                  top: 210px;
                  left:410px;
                  font-size:20px;
                  font-weight:600;
                  letter-spacing: -0.8pt;
        }
        .result{bold;
                  position:absolute;
                  top: 250px;
                  left:530px;
                 
                  text-align: center;
                
                font-size:30px;
                font-weight:600;
        }
        .details{border: 1px solid black;
                 border-radius: 5px;
                 background-color: RGB(240,233,193);
                 width:1000px;
                 position:absolute;
                 top: 300px;
                 left:130px;
}
        .table1{
            position:absolute;
            top: 340px;
            left:130px;
        }
        .t1{width:270px;}
        .t2{width:150px;}
        .t3{width:365px;}
        .t4{width:200px;
         text-align:right;}
        .terms{position:absolute;
            top: 520px;
            left:450px;}
            .what{position:absolute;
            top: 555px;
            left:550px;}
        
    </style>
    <script type="text/javascript">
function check(){
	var street=document.form.street.value; 
	var city=document.form.city.value;
	var state=document.form.state.value;
	if(street==""&&city!=""&&state!=""){alert("Please enter value for Street Address"); return false;}
	if(street==""&&city==""&&state!=""){alert("Please enter value for Street Address and City"); return false;}
	if(street==""&&city!=""&&state==""){alert("Please enter value for Street Address and State"); return false;}
	if(street==""&&city==""&&state==""){alert("Please enter value for Street Address, City and State"); return false;}
	if(street!=""&&city==""&&state!=""){alert("Please enter value for City"); return false;}
	if(street!=""&&city==""&&state==""){alert("Please enter value for City and State"); return false;}
	if(street!=""&&city!=""&&state==""){alert("Please enter value for State"); return false;}	
	return true;
}
</script>
</head>
<body> 
<p class="p1">Real Estate Search</p><br /> 
<form class="form1" name="form" action="" method="post" onsubmit="return check()">
<p class="p2">Street Address*: <INPUT class="street" NAME="street" TYPE="text" VALUE="<?php echo ($_POST["street"]) ?>"></p>
<p class="p3">City*: <INPUT class="street" TYPE="text" NAME="city" VALUE="<?php echo ($_POST["city"]) ?>"></p> 
<p class="p4">States*:
<SELECT class="state" NAME="state" >
<option value=""></option>
<option value="CA">CA</option>
<option value="AL">AL</option>
<option value="AK">AK</option>
<option value="AZ">AZ</option>
<option value="AR">AR</option>
<option value="CO">CO</option>
<option value="CT">CT</option>
<option value="DE">DE</option>
<option value="DC">DC</option>
<option value="FL">FL</option>
<option value="GA">GA</option>
<option value="HI">HI</option>
<option value="ID">ID</option>
<option value="IL">IL</option>
<option value="IN">IN</option>
<option value="IA">IA</option>
<option value="KS">KS</option>
<option value="KY">KY</option>
<option value="LA">LA</option>
<option value="ME">ME</option>
<option value="MD">MD</option>
<option value="MA">MA</option>
<option value="MI">MI</option>
<option value="MN">MN</option>
<option value="MS">MS</option>
<option value="MO">MO</option>
<option value="MT">MT</option>
<option value="NE">NE</option>
<option value="NV">NV</option>
<option value="NH">NH</option>
<option value="NJ">NJ</option>
<option value="NM">NM</option>
<option value="NY">NY</option>
<option value="NC">NC</option>
<option value="ND">ND</option>
<option value="OH">OH</option>
<option value="OK">OK</option>
<option value="OR">OR</option>
<option value="PA">PA</option>
<option value="RI">RI</option>
<option value="SC">SC</option>
<option value="SD">SD</option>
<option value="TN">TN</option>
<option value="TX">TX</option>
<option value="UT">UT</option>
<option value="VT">VT</option>
<option value="VA">VA</option>
<option value="WA">WA</option>
<option value="WV">WV</option>
<option value="WI">WI</option>
<option value="WY">WY</option>
</SELECT></p>   

<input class="search" id="input" type="submit" value="search" name="submit">
<img class="zillow"
src="http://www.zillow.com/widgets/GetVersionedResource.htm?path=/static/logos/Zillo
wlogo_150x40_rounded.gif" width="150" height="40" alt="Zillow Real Estate Search" />
<br />
<br />
<br />
<p class="p2"><i>*-Mandotory fields</i></p> 
</FORM>

<?php 
if($_POST["submit"]){
	$xml=simplexml_load_file("http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=X1-ZWz1dy7ivdxv63_3z9zt&address=$_POST[street]&citystatezip=$_POST[city]%2C+$_POST[state]&rentzestimate=true");
	if($xml->response[0]!==NULL){
	
	
	?>

<div class="result">Search Result </div>
<table>
<tr><td class="details">
See more details for
<a href="http://www.zillow.com/homedetails/<?php echo $add=$xml->response[0]->results[0]->result[0]->address[0]->street[0]."-".$add=$xml->response[0]->results[0]->result[0]->address[0]->city[0]."-". $_POST[state]."-".$add=$xml->response[0]->results[0]->result[0]->address[0]->zipcode[0]."/".$add=$xml->response[0]->results[0]->result[0]->zpid[0]."_".zpid."/" ?>">
<?php echo $add=$xml->response[0]->results[0]->result[0]->address[0]->street[0];?>,
<?php echo $add=$xml->response[0]->results[0]->result[0]->address[0]->city[0];?>,
<?php echo $add=$xml->response[0]->results[0]->result[0]->address[0]->state[0];?> -
<?php echo $add=$xml->response[0]->results[0]->result[0]->address[0]->zipcode[0];?> 
</a>on Zillow</tr></td>
</table>
<table class=table1>
<tr>
<td class="t1">Property Type:</td>
<td class="t2"><?php 
if($xml->response[0]->results[0]->result[0]->useCode[0]==NULL)
{echo "N/A";}
else{echo $xml->response[0]->results[0]->result[0]->useCode[0];}?></td>
<td class="t3">Last Sold Price:</td>
<td class="t4"><?php 
if($xml->response[0]->results[0]->result[0]->lastSoldPrice[0]==NULL)
{echo "N/A";}
else{
$var=$xml->response[0]->results[0]->result[0]->lastSoldPrice[0];
echo "$".number_format(floatval($var),2,'.',',');}?></td>
</tr>
<tr>
<td>Year Built:</td>
<td><?php 
if($xml->response[0]->results[0]->result[0]->yearBuilt[0]==NULL)
{echo "N/A";}
else{echo $xml->response[0]->results[0]->result[0]->yearBuilt[0];}?></td>
<td>Last Sold Date:</td>
<td class="t4"><?php 
if($xml->response[0]->results[0]->result[0]->lastSoldDate[0]==NULL)
{echo "N/A";}
else{
$date=strtotime($xml->response[0]->results[0]->result[0]->lastSoldDate[0]); 
echo date("d-M-Y",$date);}?></td>
</tr>
<tr>
<td>Lot Size:</td>
<td><?php 
if($xml->response[0]->results[0]->result[0]->lotSizeSqFt[0]==NULL)
{echo "N/A";}
else{
$lot=$xml->response[0]->results[0]->result[0]->lotSizeSqFt[0];
echo number_format(floatval($lot)); }?> sq.ft</td>
<td>Zestimate&#174 Property Estimate as of
<?php 
$date=strtotime($xml->response[0]->results[0]->result[0]->zestimate[0]->{'last-updated'}[0]);
echo date("d-M-Y",$date);?>
</td>
<td class="t4"><?php 
if($xml->response[0]->results[0]->result[0]->zestimate[0]->amount[0]==NULL)
{echo "N/A";}
else{
$zestimate=$xml->response[0]->results[0]->result[0]->zestimate[0]->amount[0];
echo "$".number_format(floatval($zestimate),2,".",",");}?></td>
</tr>
<tr>
<td>Finished Area:</td>
<td><?php 
if($xml->response[0]->results[0]->result[0]->finishedSqFt[0]==NULL)
{echo "N/A";}
else{
$lot=$xml->response[0]->results[0]->result[0]->finishedSqFt[0];
echo number_format(floatval($lot)); }?> sq.ft</td>
<td>30 Days Overall Change
<?php 
$change=$xml->response[0]->results[0]->result[0]->zestimate[0]->valueChange[0];
if($change>0){
$link="http://cs-server.usc.edu:45678/hw/hw6/up_g.gif";
echo "<img src=";
echo $link;
echo "";
echo "";
echo">";
}
else{
$change=-$change;
$link="http://cs-server.usc.edu:45678/hw/hw6/down_r.gif";
echo "<img src=";
echo $link;
echo">";
}
?>
:</td>
<td class="t4"><?php 
if($change==NULL)
{echo "N/A";}
else{echo "$".number_format(floatval($change),2,".",",");}?></td>
</tr>
<tr>
<td>Bathrooms:</td>
<td><?php 
if($xml->response[0]->results[0]->result[0]->bathrooms[0]==NULL)
{echo "N/A";}
else{ echo $xml->response[0]->results[0]->result[0]->bathrooms[0];}?></td>
<td>All Time Property Range:</td>
<td class="t4"><?php 
if($xml->response[0]->results[0]->result[0]->zestimate[0]->valuationRange[0]->low[0]==NULL)
{echo "N/A";}
else{ 
$low=$xml->response[0]->results[0]->result[0]->zestimate[0]->valuationRange[0]->low[0];
echo "$".number_format(floatval($low),2,".",",")."-";}
if($xml->response[0]->results[0]->result[0]->zestimate[0]->valuationRange[0]->high[0]==NULL)
{echo "N/A";}
else{ 
$high=$xml->response[0]->results[0]->result[0]->zestimate[0]->valuationRange[0]->high[0];
echo "$".number_format(floatval($high),2,".",",");}
?></td>
</tr>
<tr>
<td>Bedrooms:</td>
<td><?php 
if($xml->response[0]->results[0]->result[0]->bedrooms[0]==NULL)
{echo "N/A";}
else{ echo $xml->response[0]->results[0]->result[0]->bedrooms[0];}?></td>
<td>Rent Zestimate&#174 Valuation as of
<?php 
$date=strtotime($xml->response[0]->results[0]->result[0]->rentzestimate[0]->{'last-updated'}[0]);
echo date("d-M-Y",$date);?></td>
<td class="t4"><?php 
if($xml->response[0]->results[0]->result[0]->rentzestimate[0]->amount[0]==NULL)
{echo "N/A";}
else{
$rentzestimate=$xml->response[0]->results[0]->result[0]->rentzestimate[0]->amount[0];
echo "$".number_format(floatval($rentzestimate),2,".",",");}?></td>
</tr>
<tr>
<td>Tax Assessment Year:</td>
<td><?php 
if($xml->response[0]->results[0]->result[0]->taxAssessmentYear[0]==NULL)
{echo "N/A";}
else{echo $xml->response[0]->results[0]->result[0]->taxAssessmentYear[0];}?></td>
<td>30 Days Rent Change
<?php 
$change=$xml->response[0]->results[0]->result[0]->rentzestimate[0]->valueChange[0];
if($change>0){
$link="http://cs-server.usc.edu:45678/hw/hw6/up_g.gif";
echo "<img src=";
echo $link;
echo "";
echo "";
echo">";
}
else{
$change=-$change;
$link="http://cs-server.usc.edu:45678/hw/hw6/down_r.gif";
echo "<img src=";
echo $link;
echo">";
}
?>
:</td>
<td class="t4"><?php 
if($change==NULL)
{echo "N/A";}
else{echo "$".number_format(floatval($change),2,".",",");}?></td>
</tr>
<tr>
<td>Tax Accessment:</td>
<td><?php 
if($xml->response[0]->results[0]->result[0]->taxAssessment[0]==NULL)
{echo "N/A";}
else{
$var=$xml->response[0]->results[0]->result[0]->taxAssessment[0];
echo "$".number_format(floatval($var),2,".",",");}?></td>
<td>All Time Rent Range:</td>
<td class="t4"><?php 
if($xml->response[0]->results[0]->result[0]->rentzestimate[0]->valuationRange[0]->low[0]==NULL)
{echo "N/A";}
else{ 
$low=$xml->response[0]->results[0]->result[0]->rentzestimate[0]->valuationRange[0]->low[0];
echo "$".number_format(floatval($low),2,".",",")."-";}
if($xml->response[0]->results[0]->result[0]->rentzestimate[0]->valuationRange[0]->high[0]==NULL)
{echo "N/A";}
else{ 
$high=$xml->response[0]->results[0]->result[0]->rentzestimate[0]->valuationRange[0]->high[0];
echo "$".number_format(floatval($high),2,".",",");}
?></td>
</tr>
</table>
<p class="terms">© Zillow, Inc., 2006-2014. Use is subject to <a href="http://www.zillow.com/corp/Terms.htm">Terms of Use</a>
<br/><div class="what" ><a href="http://www.zillow.com/zestimate/">What's a Zestimate?</a></div></p>
<?php }
	
else if($xml->response[0]==NULL){
?>
<p class="notfound">No exact match found -- Verify that the given address is correct.</p>
<?php
}	
}
?>

</body>
</html>
