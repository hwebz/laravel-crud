<!doctype html>
<html class="no-js" lang="en" ng-app="getSupplier">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Laravel 5 and Angular CRUD Application</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        {{--  Bootstrap --}}
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <!--<link rel="stylesheet" href="css/main.css"> -->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
		<div class="container">
			<h2>Simple CRUD Application with AngularJS</h2>
			<div ng-controller="SupplierController">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Supplier Name</th>
							<th>Supplier Email</th>
							<th>Supplier Contact</th>
							<th>Supplier Position</th>
							<th>
								<button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add', 0)">Add New Supplier</button>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="supplier in suppliers">
							{{-- <td>@{{ supplier.id }}</td>
							<td>@{{ supplier.supplierName }}</td>
							<td>@{{ supplier.supplierEmail }}</td>
							<td>@{{ supplier.supplierContact }}</td>
							<td>@{{ supplier.supplierPosition }}</td> --}}
							<td ng-bind="supplier.id"></td>
							<td ng-bind="supplier.supplierName"></td>
							<td ng-bind="supplier.supplierEmail"></td>
							<td ng-bind="supplier.supplierContact"></td>
							<td ng-bind="supplier.supplierPosition"></td>
							<td>
								<button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit', supplier.id)">
									<span class="glyphicon glyphicon-edit"></span>
								</button>
								<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(supplier.id)">
									<span class="glyphicon glyphicon-trash"></span>
								</button>
							</td>
						</tr>
					</tbody>
				</table>

				{{-- show modal --}}
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">X</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">@{{ form_title }}</h4>
							</div>
							<div class="modal-body">
								<form name="frmSupplier" class="form-horizontal" novalidate>
									<div class="form-group">
										<div class="col-sm-3 control-label">Supplier Name</div>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="supplierName" placeholder="Supplier Name" name="supplierName" ng-model="supplier.supplierName" ng-required="true" value="@{{supplierName}}">
											<span ng-show="frmSupplier.supplierName.$invalid && frmSupplier.supplierName.$touched">Supplier Name field is required</span>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3 control-label">Supplier Email</div>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="supplierEmail" placeholder="Supplier Email" name="supplierEmail" ng-model="supplier.supplierEmail" ng-required="true" value="@{{supplierEmail}}">
											<span ng-show="frmSupplier.supplierEmail.$invalid && frmSupplier.supplierEmail.$touched">Supplier Email field is required</span>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3 control-label">Supplier Contact</div>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="supplierContact" placeholder="Supplier Contact" name="supplierContact" ng-model="supplier.supplierContact" ng-required="true" value="@{{supplierContact}}">
											<span ng-show="frmSupplier.supplierContact.$invalid && frmSupplier.supplierContact.$touched">Supplier Contact field is required</span>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3 control-label">Supplier Position</div>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="supplierPosition" placeholder="Supplier Position" name="supplierPosition" ng-model="supplier.supplierPosition" ng-required="true" value="@{{supplierPosition}}">
											<span ng-show="frmSupplier.supplierPosition.$invalid && frmSupplier.supplierPosition.$touched">Supplier Position field is required</span>
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmSupplier.$invalid">Save Changes</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	





        <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.4.min.js"><\/script>')</script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        {{-- Angular Material load from CDN --}}
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>

		{{-- Angular Application Scripts Load --}}
		<script src="{{ asset('angular/app.js') }}"></script>
		<script src="{{ asset('angular/controllers/SupplierController.js') }}"></script>

    </body>
</html>