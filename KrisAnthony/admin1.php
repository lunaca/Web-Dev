<!DOCTYPE html>
<html>
  <head>
    <title>Google Calendar API Quickstart</title>
    <meta charset='utf-8' />
  </head>
      <script src='fullcalendar/lib/jquery.min.js'></script>
  <style>

  body {
    font-size: 8pt;
  		font-family: Avenir;
  		position: relative;

  }
  .appointments{
    display: none;
  }



  </style>
  <body>
    <p>Google Calendar API Quickstart</p>

    <!--Add buttons to initiate auth sequence and sign out-->
    <button id="authorize-button" style="display: none;">Authorize</button>
    <button id="signout-button" style="display: none;">Sign Out</button>
  <button id = "add-event" style= "display: none;">Add Event</button>
    <pre id="content"></pre>
    <div id = "appointments">
      <table id = "appt" style = "width: 100%;">
        <tr>
        <th>Appointment Made</th>
        <th>Name</th>
        <th>Number</th>
        <th>Email </th>
        <th>Comments</th>
        <th>Appointment Date</th>
        <th>Start Time</th>
        <th>Service</th>
        <th>End Time</th>
      </tr>



    <?php




      $csvFile = file('appointments.txt');
        $appointments = [];
        foreach ($csvFile as $line) {
          $appointments[] = str_getcsv($line, ";");
        }

       foreach ($appointments as list($a, $b, $c, $d , $e, $f, $g, $h, $i)) {
        // $a contains the first element of the nested array,
        // and $b contains the second element.
      //   <tr>
      //   <th>Appointment Made</th>
      //   <th>Name</th>
      //   <th>Number</th>
      //   <th>Email </th>
      //   <th>Comments</th>
      //   <th>Appointment Date</th>
      //   <th>Start Time</th>
      //   <th>Service</th>
      //    <th>End Time</th>
      // </tr>
        echo "<tr>";
        echo "<td> $e </td>";
        echo "<td> $a </td>";
        echo "<td> $b </td>";
        echo "<td> $c </td>";
        echo "<td> $d </td>";
        echo "<td> $f </td>";
        echo "<td> $h </td>";
        echo "<td> $g </td>";
        echo "<td> $i </td> ";
        echo '<td><input type="button"class="accept-button" value="Approve"/></td>';
        echo "</tr>";
      }
    ?>
    <script type="text/javascript">
      // Client ID and API key from the Developer Console
      var CLIENT_ID = '23296358881-9flv4n862gf1hvm8kmfasrvhqmfaufem.apps.googleusercontent.com';

      // Array of API discovery doc URLs for APIs used by the quickstart
      var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      var SCOPES = "https://www.googleapis.com/auth/calendar";
      var appointmentdiv = document.getElementById('appointments');
      var authorizeButton = document.getElementById('authorize-button');
      var signoutButton = document.getElementById('signout-button');
      var acceptButton = document.getElementById('accept-button');
      /**
       *  On load, called to load the auth2 library and API client library.
       */
      function handleClientLoad() {

        gapi.load('client:auth2', initClient);
      }

      /**
       *  Initializes the API client library and sets up sign-in state
       *  listeners.
       */
      function initClient() {
        gapi.client.init({
          discoveryDocs: DISCOVERY_DOCS,
          clientId: CLIENT_ID,
          scope: SCOPES
        }).then(function () {
          // Listen for sign-in state changes.
          gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

          // Handle the initial sign-in state.
          updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
          authorizeButton.onclick = handleAuthClick;
          signoutButton.onclick = handleSignoutClick;


        });
      }

      /**
       *  Called when the signed in status changes, to update the UI
       *  appropriately. After a sign-in, the API is called.
       */
      function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
          appointments.style.display = 'block';
          authorizeButton.style.display = 'none';
          signoutButton.style.display = 'block';
        //  listUpcomingEvents();
        } else {
          authorizeButton.style.display = 'block';
          signoutButton.style.display = 'none';
          appointments.style.display = 'none';
        }
      }

      /**
       *  Sign in the user upon button click.
       */
      function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
      }

      /**
       *  Sign out the user upon button click.
       */
      function handleSignoutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
      }

      /**
       * Append a pre element to the body containing the given message
       * as its text node. Used to display the results of the API call.
       *
       * @param {string} message Text to be placed in pre element.
       */
      function appendPre(message) {
        var pre = document.getElementById('content');
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
      }
      $(".accept-button").click(function() {
      var rowdata = [];
      var $row = $(this).closest("tr"),       // Finds the closest row <tr>
      $tds = $row.find("td");             // Finds all children <td> elements

      $.each($tds, function() {               // Visits every single <td> element
      rowdata.push($(this).text());        // Prints out the text within the <td>
      });
      console.log(rowdata);
      var attendemail = rowdata[3];
      attendemail = attendemail.replace(/\s/g, '');
      var summary = rowdata[1] + rowdata[6];
      var starttime = rowdata[5]+"T"+rowdata[7] +":00";
      var endtime = rowdata[5] +"T"+ rowdata[8]+":00";
      starttime = starttime.replace(/\s/g, '');
      console.log(starttime);
      endtime = endtime.replace(/\s/g, '');
      if (confirm('Are you sure you would like to confirm this appointment?')) {
        var event = {
'summary': summary ,
'location': '2104 Harkrider Street , Suite 102, Conway, AR  72034',
'description': rowdata[1] +" "+  rowdata[2] + "  "+ rowdata[4]  ,
'start': {
  'dateTime':  starttime,
  'timeZone': 'US/Central'
},
'end': {
  'dateTime':  endtime,
  'timeZone': 'US/Central'
},

'attendees': [
  {'email': 'salontest111@gmail.com'},
  {'email': attendemail }
],
'reminders': {
  'useDefault': false,
  'overrides': [
    {'method': 'email', 'minutes': 24 * 60},
    {'method': 'popup', 'minutes': 10}
  ]
}
};
console.log(event);
var request = gapi.client.calendar.events.insert({
'calendarId': 'primary',
'resource': event
});

request.execute(function(event) {
appendPre('Event created: ' + event.htmlLink);
});
      } else {
          // Do nothing!
      }




      });


    </script>


    <script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>

  </table>
  </div>
  </body>
</html>
