var	app = angular.module("app", [])
    .config(['$httpProvider', function($httpProvider) {

        // ENABLE CORS
        $httpProvider.defaults.useXDomain = true;
        delete $httpProvider.defaults.headers.common['X-Requested-With'];

        // ENABLE CACHING
        //$httpProvider.defaults.cache = true;

        // SET POST HEADERS
        // $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
    }
]);