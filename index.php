<!Doctype html>
<html lang="n-US">
<head>
  <title>AngularJS HTML5 | PHP JQuery</title>
  <meta charset="uft-8">
  <meta name="viewport" contents="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="w3.css/w3-css.css">

  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <!--Bootstrap-->

  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="http:bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  <!-- W3.CC -->
   <!--<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">-->
   <link rel="stylesheet" href="w3.css/w3-css.css">
   <link rel="stylesheet" href="w3.css/animate.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

  <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet'         type='text/css'>

  <!--JQuery-->
  <script src="JQuery/jquery-3.1.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
  <!--AngularJS-->
  <script src="AngularJS/angular.js"></script>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 </head> 

<body ng-init="displayUsers()" ng-app="myModule" ng-controller="myController">
 <form>
  <div class="container">
    <div class="jumbotron text-center">
      <h1>VECTER THE PROGRAMMER</h1>
    </hr>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <labe for="name">Name:</label>
            <input class="form-control" type="text" placeholder="Enter name" required id="Name">
        </div>
        <div class="form-group">
          <labe for="Surname">Surname:</label>
             <input class="form-control" type="text" placeholder="Enter surname" required id="Surname">
        </div>
        <div class="form-group">
          <labe for="Email">Email:</label>
            <input class="form-control" type="email" placeholder="Enter Email" required id="Email">
        </div>
         <div class="form-group">
          <labe for="Gender">Gender:</label>
            <select class="form-control" id="Gender">
          <option>Male</option>
          <option>Female</option>
        </select>
        </div>
         <button class="btn tbn-default" type="button" ng-click="saveUser()">Submit</button>
         <button class="btn btn-default" type="button" ng-click="displayUsers()">Display</button>
       </br></br></br>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input id="email" type="text" class="form-control" ng-model="Search" placeholder="Search">
         </div>
        <div class="table table-responsive">
          <table class="table table-striped text-left">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Gender</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="user in users | filter:Search">
              <td>{{$index+1}}</td>
              <td>{{user.Name}}</td>
              <td>{{user.Surname}}</td>
              <td>{{user.Email}}</td>
              <td>{{user.Gender}}</td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
 </form>
 <script>
  var app=angular.module("myModule",[]).controller("myController",function($scope,$http){
     $scope.displayUsers=function(){
     $http.get("select.php").success(function(data){
      $scope.users=data;
     });
     }
     $scope.saveUser=function(){

      $scope.name=$("#Name").val();
      $scope.surname=$("#Surname").val();
      $scope.email=$("#Email").val();
      $scope.gender=$("#Gender").val();

      if(($scope.name !="") || ($scope.surname !="") || ($scope.email !="")){
        $http.post("insertUser.php",{'Name':$scope.name,'Surname':$scope.surname,'Email':$scope.email,'Gender':$scope.gender}).success(function(){
          $scope.displayUsers();
          $scope.name=$("#Name").val("");
          $scope.surname=$("#Surname").val("");
          $scope.email=$("#Email").val("");
          $scope.gender=$("#Gender").val("Male");
        });
      }
      else{
        alert("Please insert missing fields");
      }
     }
  });
 </script>
</body>
</html>