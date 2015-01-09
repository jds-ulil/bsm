<div ng-app="main-input-app"  ng-controller="pageCtrl">

<select ng-model="selectedType" class="form-control" ng-options="type as type.text for type in types">
    <option value="">(Pilih Jenis Inputan)</option>
</select>
    
<!--daily content is a main div for load menu content-->
    <div>
        <div ng-include src='selectedType.url'></div>
   </div>

</div>

<script>
    var module = angular.module('main-input-app', []);

    module.controller("pageCtrl", function ($scope){
        $scope.types = [
                {url: "<?php echo Yii::app()->createUrl('daily/inputsecurity'); ?>",text:"Security"},                
                {url: "http://localhost/bsm/index.php?r=daily/inputsecurity",text:"Customer Service"},                
        ];
    } )

    
</script>
