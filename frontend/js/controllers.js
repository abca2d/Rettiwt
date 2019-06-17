var app = angular.module('myApp', []);

app.controller('usersController', function($scope, $http){
 $scope.formVisibility=false;
	$scope.fetchAllPosts = function(){
		$http.get('http://localhost:8000/api/posts').then(function(response){
			$scope.posts = response.data;
		});
	};

	$scope.fetchAllPosts();

  $scope.stringCadena = function(address) {
    p1 = address.indexOf(" ");
    p2 =  address.substring(0, p1);
    var x = p2.length;
    var cadenaInvertida = "";
    while (x>=0) {
       cadenaInvertida = cadenaInvertida + p2.charAt(x);
       x--;
    }
    address = cadenaInvertida+" "+address;

    return address;
  }

	$scope.storePosts = function(){
		var dataObj = {
			titulo: $scope.titulo,
			descripcion: $scope.descripcion
		}
		$http.post('http://localhost:8000/api/posts', dataObj).then(function(response){
			if(response.data.message){
				$scope.storePostsResponse = response.data;
			} else {
				$scope.titulo = "";
				$scope.descripcion = "";
				$scope.fetchAllPosts();
			}
		});
	};

	$scope.showUser = function(id){
		$http.get('http://localhost:8000/api/posts/' + id).then(function(response){
			$scope.showName = response.data.name;
			$scope.showEmail = response.data.email;
			$scope.showTelefone = response.data.telefone;
			$scope.showId = response.data.id;
		});
	};

  $scope.showPost = function(id){
		$http.get('http://localhost:8000/api/posts/' + id).then(function(response){
			$scope.showtitulo = response.data.titulo;
			$scope.showdescripcion = response.data.descripcion;
			$scope.showId = response.data.id;
		});
	};

	$scope.updateUser = function(id){
		var dataObj = {
			titulo: $scope.showtitulo,
			descripcion: $scope.showdescripcion
		}

		$http.put('http://localhost:8000/api/posts/' + id, dataObj).then(function(response){
			if(response.data.message){
				$scope.updateUserResponse = response.data;
        	$('#myModal').modal('hide');
          $scope.fetchAllPosts();
			} else {
				$('#myModal').modal('hide');
				$scope.fetchAllPosts();
			}
		});
	};

  $scope.showLogin = true;
  
  $scope.Registrar = function(){
      $scope.showRegistrar = true;
      $scope.showLogin = false;
	};

  $scope.Login = function(){
    $scope.showRegistrar = false;
    $scope.showLogin = true;
  };

	$scope.destroyUser = function(id){
		$http.delete('http://localhost:8000/api/posts/' + id).then(function(response){
			$scope.destroyUserResponse = response.data;
			console.log(response.data);
			$scope.fetchAllPosts();
		});
	};
});
