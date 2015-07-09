(function() {
'use strict';

var myApp = angular.module('myApp', ['ngRoute', 'ngAnimate', 'ui.tree', 'angularUtils.directives.dirPagination', 'chieffancypants.loadingBar']);

myApp.config(function($routeProvider){
    $routeProvider.when(
        '/',{
            templateUrl: '../typo3conf/ext/rb_tinyshop/Resources/Public/Backend/App/templates/index.html',
            controller: 'indexController'
        }
    ).when(
        '/articlelist/:cid',{
            templateUrl: '../typo3conf/ext/rb_tinyshop/Resources/Public/Backend/App/templates/articlelist.html',
            controller: 'articleListController'
        }
    ).when(
        '/articledetails/:cid',{
            templateUrl: '../typo3conf/ext/rb_tinyshop/Resources/Public/Backend/App/templates/articledetails.html',
            controller: 'articleDetailsController'
        }
    );
});

myApp.controller('indexController', function($scope){
    
});

myApp.controller('articleListController', function($scope, $routeParams, $http, $window){
    $scope.currentPage = 1;
    $scope.pageSize = 12;
    
	$scope.cid = $routeParams.cid;
	
    $scope.openArticleInPopUp = function(articleEditLink) {
    	$window.$scope = $scope;
    	$window.open(articleEditLink, 'Artikel bearbeiten', "width=1024,height=768");
    };
    
    $scope.refreshData = function(){
    	$scope.disableOnLoading = true;
    	$http.get(TYPO3.settings.ajaxUrls['RbTinyshopBackendController::getArticleByCategoryJson'] + '&cid=' + $scope.cid).success(function(result){
    		$scope.disableOnLoading = false;
    		$scope.articles = result;
    	}).error(function(data, status, headers, config){
    		console.log(data);
			console.log(status);
			console.log(headers);
			console.log(config);
    	});
	};
	$scope.refreshData();
});

myApp.controller('articleDetailsController', function($scope){
    
});

myApp.controller('categoryController', function($scope, $http, $timeout, $window){
    $scope.disableOnLoading = false;
    $scope.remove = function(scope) {
        scope.remove();
    };

    $scope.toggle = function(scope) {
        scope.toggle();
    };

    $scope.moveLastToTheBegginig = function () {
        var a = $scope.data.pop();
        $scope.data.splice(0,0, a);
    };

    $scope.newSubItem = function(scope) {
        var nodeData = scope.$modelValue;
        nodeData.nodes.push({
            id: nodeData.id * 10 + nodeData.nodes.length,
            title: nodeData.title + '.' + (nodeData.nodes.length + 1),
            nodes: []
        });
    };

    var getRootNodesScope = function() {
        return angular.element(document.getElementById("tree-root")).scope();
    };

    $scope.collapseAll = function() {
        var scope = getRootNodesScope();
        scope.collapseAll();
    };

    $scope.expandAll = function() {
        var scope = getRootNodesScope();
        scope.expandAll();
    };
    
    $scope.openCategoryInPopUp = function(categoryEditLink) {
    	$window.$scope = $scope;
    	$window.open(categoryEditLink, 'Kategorie bearbeiten', "width=1024,height=768");
    };
    
	$scope.treeOptions = {
		accept: function(sourceNodeScope, destNodesScope, destIndex) {
			return true;
		},
		dropped: function(event) {
			var cid = event.source.nodeScope.$modelValue.id;
			var moveId = cid;
			var moveBehind = 0;
			var moveBehindTmp = 0;
			
			if(!angular.isUndefined(event.dest.nodesScope.$parent.$modelValue)) {
				var destParentId = event.dest.nodesScope.$parent.$modelValue.id;
			}
			else {
				destParentId = 0;
			}
			
			if(!angular.isUndefined(event.source.nodesScope.$parent.$modelValue)) {
				var sourceParentId = event.source.nodesScope.$parent.$modelValue.id;
			}
			else {
				sourceParentId = 0;
			}
			
			for(var i = 0; i < event.dest.nodesScope.$modelValue.length; i++) {
				if(event.dest.nodesScope.$modelValue[i].id == cid) {
					if(i == 0 && event.dest.nodesScope.$modelValue.length > 1) {
						moveId = event.dest.nodesScope.$modelValue[i+1].id;
						moveBehind = cid;
					}
					else {
						moveBehind = moveBehindTmp;
					}
					break;
				}
				moveBehindTmp = event.dest.nodesScope.$modelValue[i].id;
			}
			if(destParentId !== sourceParentId || true) {
				$scope.disableOnLoading = true;
				//update parent id
				$http.post(TYPO3.settings.ajaxUrls['RbTinyshopBackendController::updateCategoryParentAjax'], {cid: cid, pid: destParentId, modelValue: event.dest.nodesScope.$modelValue}).success(function(data, status, headers, config){
					$scope.disableOnLoading = false;
				}).error(function(data, status, headers, config){
					console.log(data);
					console.log(status);
					console.log(headers);
					console.log(config);
			    });
			}
		},
	};
    
	$scope.refreshData = function(){
		$scope.disableOnLoading = true;
		$http.get(TYPO3.settings.ajaxUrls['RbTinyshopBackendController::getCategoryTreeJson']).success(function(result){
			$scope.disableOnLoading = false;
	        $scope.data = result;
	    }).error(function(data, status, headers, config){
	    	console.log(data);
			console.log(status);
			console.log(headers);
			console.log(config);
	    });
	};
	$scope.refreshData();
});
})();