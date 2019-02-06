<!DOCTYPE html>
<html>
<?php include 'regular/head.php';?>
<body>
    <div id="wrapper">
        <?php include 'regular/leftheader.php';?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <?php include 'regular/topheader.php';?>
            </div>
            <div class="row  border-bottom white-bg dashboard-header">



            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Api</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        Your Api Key - <code><?php echo base64_encode($api[0]->APIkey); ?></code>

<br>
<br>
<br>
Identify a customer and Tracking Event <br>
Add users to your Vero account by calling this snippet on pages where the user is logged in, replacing the properties with your users data.<br>
 You should also call this when users submit subscribe forms or otherwise give you permission to email them. <br>
 This code will also update existing users data.<br>
 Track your users actions anywhere on your website by calling this snippet in Different language. 
 <br>This can go anywhere on any page and the name you give your events is up to you.
 <br> Along with these events, you can track event properties (meta data) that become very useful when personalising your emails. 
 <br>We encourage you to track as many events as you can: it gives you more power. Learn more about tracking events.


<br>
<br>
<br>
<code>
Curl Request
</code>
<br>
<pre>
curl --request POST \
  --url http://axtrionproduction.space/main/track/<code>[API key]</code> \
  --header 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' \
  --form event=<b>Event type ID</b> \
  --form email=<b>Customer Email</b> \
  --form first_name= <b>Customer First Name</b>\
  --form last_name= <b>Customer Last Name</b>\
  --form details= <b>More details of user and product </b>\
  --form subscription= <b>Yes if user is intrested else No, Default :No </b>\
</pre>

<br>
<br>
<br>
<code>
Jquery
</code>
<br>
<pre>
var form = new FormData();
form.append("event", "Event type ID");
form.append("email", "Customer Email");
form.append("first_name", "Customer First Name");
form.append("last_name", "Customer Last Name");
form.append("details", "More details of user and product");
form.append("subscription", "Yes if user is intrested else No, Default :No ");

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://axtrionproduction.space/main/track/<code>[API key]</code>",
  "method": "POST",
  "headers": {},
  "processData": false,
  "contentType": false,
  "mimeType": "multipart/form-data",
  "data": form
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
</pre>

<br>
<br>
<br>
<code>
Ruby
</code>
<br>
<pre>
require 'uri'
require 'net/http'

url = URI("http://axtrionproduction.space/main/track/[API key]")

http = Net::HTTP.new(url.host, url.port)

request = Net::HTTP::Post.new(url)
request.body = "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"event\"\r\n\r\nEvent type ID\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\nCustomer Email\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\r\n"Customer First Name\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"last_name\"\r\nCustomer Last Name\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"details\"\r\n\r\nMore about Customer and Products \r\n------WebKitFormBoundary7MA4YWxkTrZu0gW------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"subscription\"\r\n\r\nYes if user is intrested else No, Default :No\r\n"

response = http.request(request)
puts response.read_body
</pre>




<br>
<br>
<br>
<code>
Python Request
</code>
<br>
<pre>
import requests

url = "http://axtrionproduction.space/main/track/[API key]"

payload = "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"event\"\r\n\r\nEvent type ID\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\nCustomer Email\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"first_name\"\r\n\r\nCustomer First Name\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"last_name\"\r\n\r\nCustomer Last Name\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"details\"\r\n\r\nMore details of user and product\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"subscription\"\r\n\r\nYes if user is intrested else No, Default :No \r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--"
response = requests.request("POST", url, data=payload)

print(response.text)
</pre>


<br>
<br>
<br>
<code>
Node
</code>
<br>
<pre>
var http = require("http");

var options = {
  "method": "POST",
  "hostname": [
    "vero",
    "rishigupta",
    "in"
  ],
  "path": [
    "main",
    "track",
    "[API key]"
  ],
  "headers": {}
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write("------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"event\"\r\n\r\nEvent type ID\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\nCustomer Email\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"first_name\"\r\n\r\nCustomer First Name\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"last_name\"\r\n\r\nCustomer Last Name\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"details\"\r\n\r\nMore details of user and product\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"subscription\"\r\n\r\nYes if user is intrested else No, Default :No \r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--");
req.end();
</pre>




<br>
<br>
<br>
<code>
PHP
</code>
<br>
<pre>

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://axtrionproduction.space/main/track/[API key]",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"event\"\r\n\r\nEvent type ID\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\nCustomer Email\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"first_name\"\r\n\r\nCustomer First Name\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"last_name\"\r\n\r\nCustomer Last Name\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"details\"\r\n\r\nMore details of user and product\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"subscription\"\r\n\r\nYes if user is intrested else No, Default :No \r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
</pre>




<br>
<br>
<br>
<code>
Go
</code>
<br>
<pre>
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "http://axtrionproduction.space/main/track/[API key]"

	payload := strings.NewReader("------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"event\"\r\n\r\nEvent type ID\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\nCustomer Email\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"first_name\"\r\n\r\nCustomer First Name\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"last_name\"\r\n\r\nCustomer Last Name\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"details\"\r\n\r\nMore details of user and product\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"subscription\"\r\n\r\nYes if user is intrested else No, Default :No \r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--")

	req, _ := http.NewRequest("POST", url, payload)

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
</pre>


<br>
<br>
<br>
<code>Response</code>
<br>
<pre>
{
code: ,
messsage:
}
</pre>

<br>
<br>
<table class="table table-bordered">
<thead>
      <tr>
        <th>Code</th>
        <th>Parameters</th>
        <th>Response</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>200</td>
        <td>All correct</td>
        <td>OK</td>
      </tr>
      <tr>
        <td>404</td>
        <td>API key invalid</td>
        <td>INVALID_API_KEY</td>
      </tr>
      <tr>
        <td>400</td>
        <td>Event Name invalid</td>
        <td>INVALID_EVENT_NAME</td>
      </tr>
      </tbody>
</table>
                    </div>
                    <hr>
                </div>
            </div>
            </div>
        </div>




</div>
</div>

</div>


<?php include "regular/chat.php";?>


</div>

  <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>

<?php include "regular/script.php";?>
<script type="text/javascript">
    
    $(document).ready(function () {

        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                positionClass: "toast-top-right",
                timeOut: 3000
            };
            toastr.success('Vero', 'Welcome <?php echo $pdata['username']?>');

        }, 1300);

        
    });


</script>



</body>

</html>
