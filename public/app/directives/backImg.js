angular.module('app.directives')

.directive('bgImage', function(){

    return function(scope, element, attrs) {
        scope.$watch(attrs.bgImage, function(value) {
            element.css({
                'background-image': 'url(' + value +')',
                'background-size' : 'cover'
            });
        });
    };
})