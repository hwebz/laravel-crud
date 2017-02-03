app.controller('SupplierController', function($scope, $http, API_URL) {
	// retrieve Supplier listing from API
	$http.get(API_URL + "supplier").success(function(response) {
		$scope.suppliers = response;
	});

	// show modal form
	$scope.toggle = function(modalstate, id) {
		$scope.modalstate = modalstate;
		switch(modalstate) {
			case 'add':
				$scope.form_title = 'Add New Supplier';
				break;
			case 'edit':
				$scope.form_title = 'Suplier Detail';
				$scope.id = id;
				$http.get(API_URL + 'supplier/' + id).success(function(response) {
					console.log(response);
					$scope.supplier = response;
				});
				break;
			default:
				break;
		}
		console.log(id);
		$("#myModal").modal('show');
	}

	// save new supplier and update existing supplier
	$scope.save = function(modalstate, id) {
		var url = API_URL + "supplier";
		if (modalstate === 'edit') {
			url += '/' + id;
		}
		$http({
			method: 'POST',
			url: url,
			data: $.param($scope.supplier),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function(response) {
			console.log(response);
			location.reload();
		}).error(function(err) {
			console.log(err);
			alert('This is embrassing. An error has occured. Please check the log for detail');
		});
	}

	// delete supplier record
	$scope.confirmDelete = function(id) {
		var isConfirmDelete = confirm('Are you sure you want to delete this record?');
		if (isConfirmDelete) {
			$http({
				method: 'DELETE',
				url: API_URL + "supplier/" + id
			}).success(function(response) {
				console.log(response);
				location.reload();
			}).error(function(err) {
				console.log(err);
				alert('Unable to delete');
			});
		} else {
			return false;
		}
	}
});