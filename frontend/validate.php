<!DOCTYPE html>
<html>
<head>
<title>
AngularJs ng-maxlength Form Validation Example
</title>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script type="text/javascript">
var app = angular.module('ngmaxlengthApp', []);
app.controller('ngmaxlengthCtrl', function ($scope) {

});
</script>
</head>
<body>
<div ng-app="ngmaxlengthApp" ng-controller="ngmaxlengthCtrl">
<h3>AngularJs ng-maxlength Form Validation Example</h3>
<form name="personForm" ng-submit="sendForm()">
Pin Code:<input type="text" name="pincode" ng-model="txtpin" ng-maxlength="5" required />
<span style="color:Red" ng-show="personForm.pincode.$error.required"> Required! </span>

   <span class="callout callout-danger" ng-show="personForm.pincode.$dirty&&personForm.pincode.$error.maxlength">
      <h4>Warning!</h4>
      <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
  </span>

<br/>
<br />
<button type="submit">Submit Form</button><br /><br />
<span>{{msg}}</span>
</form>
</div>
</body>
</html>
