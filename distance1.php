<!DOCTYPE html>
<html>
<head>
    <title></title>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAZP21peJC9929tzA9OwEXA4uvY4D-2snU&libraries=places"></script>
<script type="text/javascript">

 
function GetRoute() {

 
    //*********DIRECTIONS AND ROUTE**********************//
    source = document.getElementById("txtSource").value;
    destination = document.getElementById("txtDestination").value;
 
   
 
    //*********DISTANCE AND DURATION**********************//
    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix({
        origins: [source],
        destinations: [destination],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC
    }, function (response, status) {
        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
            var distance = response.rows[0].elements[0].distance.value;
            var duration = response.rows[0].elements[0].duration.text;
            var dvDistance = document.getElementById("dvDistance");
           dvDistance.innerHTML = "";
            dvDistance.innerHTML += "<b>Distance: &#8377;" + ((distance/1000)) + "</b><br />";
            dvDistance.innerHTML += "Duration:" + duration;
 
        } else {
            alert("Unable to find the distance via road.");
        }
    });
}
</script>

</head>
<body onload="GetRoute()">
    
               
                <input type="hidden" id="txtSource" value="Tamil Nadu 600008" style="width: 200px" />
              
                <input type="hidden" id="txtDestination" value="Punjani Industrial Estate
                    " style="width: 200px" />
                <br />
                <!--<input type="button" value="Get Route" onclick="GetRoute()" />-->
              
         
                <div id="dvDistance"></div>
         
        
    </table>

</body>
</html>