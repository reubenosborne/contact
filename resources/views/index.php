<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<title>Laravel, Meet Angular</title>
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="bower_components/angular/angular.min.js"></script>
</head>
<body ng-controller="mainCtrl">

	<div class="container">

		<header class="navbar navbar-dark bg-inverse m-t">
			<a href="#" class="navbar-brand">Laravel, Meet Angular</a>
		</header>

		<form ng-submit="newArticle()" class="m-t card card-inverse card-info card-block">

			<div class="form-group">
				<input type="text" ng-model="title" placeholder="New Article Title" class="form-control">
			</div>

			<div class="form-group">
				<textarea ng-model="content" placeholder="Content goes here..." class="form-control"></textarea>
			</div>

			<input type="submit" value="Save" class="btn btn-primary">

		</form>

		<div class="articles">
			
			<div class="article card card-block m-t post" ng-repeat="article in articles | orderBy:'-'">
				
				<div class="content">
					<h4>{{ article.title }}</h4>
					<p ng-bind-html="article.content"></p>
				</div>

				<button class="btn btn-danger btn-sm" ng-click="deleteArticle(article.id)">Delete</button>

			</div>

		</div>

	</div>


	<script src="bower_components/angular-resource/angular-resource.min.js"></script>
	<script src="bower_components/angular-sanitize/angular-sanitize.min.js"></script>
	<script src="bower_components/lodash/lodash.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>