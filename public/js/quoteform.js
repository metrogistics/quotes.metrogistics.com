app.controller('QuoteController', function($scope, $timeout){

    $scope.selectedChoice = {};


    function format(x) {

        $scope.selectedChoice = { id: x.id, text: x.Name, Name: x.Name, AreaName: x.AreaName, AreaId: x.AreaId, term: x.term };

        return "<div><strong>" + x.Name + "</strong> - " + x.AreaName + "</div>";
        //return "<div><strong>" + x.Name + "</strong><br />" + x.AreaName + " Area</div>";
    }

    function formatResult(x) {

        $scope.selectedChoice = { id: x.id, text: x.Name, Name: x.Name, AreaName: x.AreaName, AreaId: x.AreaId, term: x.term };

        return "<div><strong>" + x.Name + "</strong> - " + x.AreaName + "</div>";
        //return "<div><strong>" + x.Name + "</strong><br />" + x.AreaName + " Area</div>";
    }

    $('#o').select2({
        minimumInputLength: 3,
        placeholder: "City or Zipcode",
        formatResult: format,
        formatSelection: formatResult,
        ajax: {
            //url: "http://order.shipwithsonic.com/Cities",
            url: "/Cities",
            dataType: 'json',
            type: 'POST',
            data: function (term, page) {
                return {
                    q: term
                };
            },
            results: function (data, page) {
                return { results: data };
            }
        }

    })
        .on("change", function(e) {
            $scope.oAreaId = $scope.selectedChoice.AreaId;
            $scope.oAreaName = $scope.selectedChoice.AreaName;
            $scope.oTerm = $scope.selectedChoice.term;
            $scope.$apply();
            $scope.$digest();

            $("#oAreaId").val($scope.oAreaId);
            $("#oAreaName").val($scope.oAreaName);
            $("#oTerm").val($scope.oTerm);

        });

    $('#d').select2({
        minimumInputLength: 3,
        placeholder: "City or Zipcode",
        formatResult: format,
        formatSelection: formatResult,
        ajax: {
            //url: "http://order.shipwithsonic.com/Cities",
            url: "/Cities",
            dataType: 'json',
            type: 'POST',
            data: function (term, page) {
                return {
                    q: term
                };
            },
            results: function (data, page) {
                return { results: data };
            }
        }

    })
        .on("change", function(e) {
            $scope.dAreaId = $scope.selectedChoice.AreaId;
            $scope.dAreaName = $scope.selectedChoice.AreaName;
            $scope.dTerm = $scope.selectedChoice.term;
            $scope.$apply();
            $scope.$digest();

            $("#dAreaId").val($scope.dAreaId);
            $("#dAreaName").val($scope.dAreaName);
            $("#dTerm").val($scope.dTerm);

        });



});
