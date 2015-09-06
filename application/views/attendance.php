<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Asistencia</title>
  <script src="/public/bower_components/angular/angular.js"></script>
  <script src="/public/bower_components/angular-local-storage/dist/angular-local-storage.js"></script>
  <script src="/public/assets/js/attendance.js"></script>
  <link rel="stylesheet" href="/public/bower_components/bootstrap/dist/css/bootstrap.css">
</head>

<body>

  <div ng-app="att">

    <div ng-controller="AttendanceController">
      <div>
        <h2>
          {{currentEvent.title}}
        </h2>
        <h3>
          <b>
            <div class="well well-sm">
              {{participant.first_name}}
              {{participant.last_name}}
            </div>
          </b>
        </h3>
      </div>
      <div class="jumbotron">
        <div ng-repeat="talk in talks">
          <h2>{{talk.title}} <small ng-if="talk.att">{{talk.att.title}}!</small></h2>

          <a ng-click="takeAttendace(talk, state)"
             ng-repeat="state in states" style="color:{{state.color}}">
            {{state.title}}
          </a>
        </div>
      </div>
    </div>
  </div>

</body>
<script charset="utf-8">
  var participant = <?php echo json_encode($participant); ?>;
  var talks = <?php echo json_encode($talks); ?>;
  var currentEvent = <?php echo json_encode($currentEvent); ?>;
  var states = <?php echo json_encode($states); ?>;
</script>
</html>
