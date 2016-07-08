var angular = require('angular');
var collapse = require('angular-ui-bootstrap/src/collapse');
var dropdown = require('angular-ui-bootstrap/src/dropdown/index-nocss.js');
var app = angular.module("AbqWebgeeksDebug", [collapse, dropdown]);

app.directive("bootstrapBreakpoint", ["$window", function($window) {
	// define standard Bootstrap breakpoints
	var breakpoints = {
		xs: "<div id=\"bootstrap-breakpoint-xs\" class=\"device-xs visible-xs visible-xs-block\"></div>",
		sm: "<div id=\"bootstrap-breakpoint-sm\" class=\"device-sm visible-sm visible-sm-block\"></div>",
		md: "<div id=\"bootstrap-breakpoint-md\" class=\"device-md visible-md visible-md-block\"></div>",
		lg: "<div id=\"bootstrap-breakpoint-lg\" class=\"device-lg visible-lg visible-lg-block\"></div>"
	};
	return({
		// detect breakpoints based on visibility
		link: function postLink(scope) {
			scope.detectBreakpoint = function() {
				for(var breakpoint in breakpoints) {
					var detectionDiv = angular.element(document.querySelector("#bootstrap-breakpoint-" + breakpoint))[0];
					if(detectionDiv.offsetHeight > 0 || detectionDiv.offsetWidth > 0) {
						scope.breakpoint = breakpoint;
						break;
					}
				}
			};

			// detect the breakpoint on load
			scope.detectBreakpoint();

			// reload breakpoints on resize
			angular.element($window).bind("resize", function() {
				scope.detectBreakpoint();
				scope.$apply();
			});
		},
		restrict: "E",
		template: breakpoints.xs + breakpoints.sm + breakpoints.md + breakpoints.lg
	});
}]);

app.controller("FactorialController", ["$http", "$scope", function($http, $scope) {
	$scope.answer = null;
	$scope.factorialInput = 4;

	$scope.getAnswer = function(factorialInput) {
		$http.get("/api/factorial/" + factorialInput)
			.then(function(result) {
				if(result.data.status === 200) {
					$scope.answer = result.data.answer;
				}
			});
	};

	if($scope.answer === null) {
		$scope.getAnswer($scope.factorialInput);
	}
}]);

app.controller("NavController", ["$scope", function($scope) {
	$scope.breakpoint = null;
	$scope.navCollapsed = null;

	$scope.toggleCollapse = function() {
		$scope.navCollapsed = !($scope.navCollapsed);
	};

	// collapse the navbar if the screen is changed to a extra small screen
	$scope.$watch("breakpoint", function() {
		$scope.navCollapsed = ($scope.breakpoint === "xs");
	});
}]);
