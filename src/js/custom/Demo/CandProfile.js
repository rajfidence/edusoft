/**
 * Created by 3 Cube on 1/21/2016.
 */
/*USERCONTROLLER*/


(function () {
    'use strict';

    angular
        .module('naut')
        .controller('CandProfileController', CandProfileController)
        .controller('CandEventController', CandEventController)

      ;

    CandProfileController.$inject = ['$scope','colors','$modal','$stateParams','$http','$rootScope','$loading', 'editableOptions',
        'editableThemes', '$filter', 'toaster', 'AppointmentService', '$state', '$window', 'SweetAlert', 'FingerprintService'];
    function CandProfileController($scope,colors, $modal, $stateParams, $http, $rootScope , $loading, editableOptions,
                                   editableThemes, $filter, toaster, AppointmentService, $state, $window, SweetAlert, FingerprintService) {
        var vm = this;

        vm.today = function () {
            //vm.dt = new Date();
            vm.dt = '';
        };
        vm.today();

        vm.dateOptions = {
            formatYear: 'yy',
            startingDay: 1
        };
        vm.dateOptions1 = {
            formatYear: 'yy',
            startingDay: 1
        };
        vm.dateOptions2 = {
            formatYear: 'yy',
            startingDay: 1
        };
        vm.dateOptions3 = {
            formatYear: 'yy',
            startingDay: 1
        };

        vm.format = 'dd-MM-yyyy';
        vm.open = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();

            vm.opened = true;
        };
        vm.open1 = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();

            vm.opened1 = true;
        };
        vm.open3 = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();

            vm.opened3 = true;
        };
        vm.minApptDate = new Date();
        vm.open2 = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();

            vm.opened2 = true;
        };
        vm.clear = function () {
            vm.dt = null;
        };
        vm.clear = function () {
            vm.dt1 = null;
        };
        vm.clear = function () {
            vm.dt2 = null;
        };
        vm.address = {};
        vm.addressdisabled = false;
        vm.refreshAddresses = function (address) {
            var params = {address: address, sensor: false};
            return $http.get(
                'http://maps.googleapis.com/maps/api/geocode/json',
                {params: params}
            ).then(function (response) {
                return response.data.results;
            });
        };
        // Disable weekend selection
        vm.disabled = function (date, mode) {
            return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 7 ) );
        };
        vm.disable = function () {
            vm.disabled = true;
        };
        vm.disable = function () {
            vm.disabled = true;
        };
        // Timepicker
        // -----------------------------------
        vm.mytime = new Date();

        vm.hstep = 1;
        vm.mstep = 15;

        vm.options = {
            hstep: [1, 2, 3],
            mstep: [1, 5, 10, 15, 25, 30]
        };

        vm.ismeridian = true;
        vm.toggleMode = function () {
            vm.ismeridian = !vm.ismeridian;
        };

        $scope.update = function () {
            var d = new Date();
            d.setHours(12);
            d.setMinutes(0);
            vm.mytime = d;
        };

        vm.changed = function () {
            //  console.log('Time changed to: ' + vm.mytime);
        };
        
        $scope.spinner = {active: true};
        vm.dropdownlist = AppointmentService.listData()
            .then(function (response) {
                    $scope.departmentList = response.departmentList;
                    $scope.subdepartmentList = response.subdepartmentList;
                    $scope.doctorList = response.doctorList;
                    $scope.profileList = response.profileList;
                    $scope.purposeList = response.purposeList;
                    $scope.rankList = response.rankList;
                    $scope.vesselList = response.vesselList;
                    $scope.spinner = {active: false};
                },
                function (err) {
                    console.log(err);
                });
      

        $scope.pdfUrl = '';
        $scope.ModalData = {};
        $scope.CandData = {};

        $scope.CandId = $stateParams.CandId;
        $scope.CandData.userid = $scope.CandId;
        var url = "server/app/GetCandidateDetails";
        $scope.apptDetails = {};
        $scope.ApptDate = [];
        $scope.ActivityTimeline = [];
        $scope.recentappt = [];
        delete $rootScope.imagedata;
        $http.get(url, {
            params: {CandId: $scope.CandId},
            headers: {'X-API-KEY': $rootScope.currentUser.key}
        }).success(function (response) {
            $scope.CandData = response;
            $rootScope.imagedata = "server/uploadedfiles/images/"+response.CandDetails.image;
            $scope.CandPassNo= response.CandPassNo;
            $scope.dynamicicons(response.ActivityData);
            if(response.CandDetails.image == null){
                $rootScope.imagedata  = 'server/uploadedfiles/images/default.jpg';
            }
            $scope.apptDetails.department = response.selecteddept;
            $scope.apptDetails.subdept = response.selectedsubdept;
            $scope.apptDetails.selectedrank = response.selectedrank;
            $scope.apptDetails.vessel = response.selectedVessel;
        }).error(function(err){});

        $rootScope.click =function (){
            $http.get(url, {
                params: {CandId: $scope.CandId},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {

                if($rootScope.event=='1'){
                    $scope.apptDetails.department = response.selecteddept;
                }else if($rootScope.event=='2'){
                    $scope.apptDetails.subdept = response.selectedsubdept;
                }else if ($rootScope.event=='3'){
                    $scope.apptDetails.vessel = response.selectedVessel;
                }else {
                    $scope.apptDetails.department = response.selecteddept;
                    $scope.apptDetails.subdept = response.selectedsubdept;
                    $scope.apptDetails.vessel = response.selectedVessel;
                }





            }).error(function(err){});
        };
      // watch for dropdown
      /*  $scope.$watch('department',function(newValue,oldValue){
            if (newValue && newValue!=oldValue){
                $scope.propertyType = $scope.department.value;

            }

        });*/


        $scope.dynamicicons = function(ActivityData) {
            if(ActivityData){
            angular.forEach(ActivityData, function(val){
                if(val.Purpose == 'Treatment')
                    $scope.classicon = 'fa fa-plus-circle';
                if(val.Purpose == 'Other')
                    $scope.classicon = 'fa fa-circle';
                if(val.Purpose == 'Pre-joining')
                    $scope.classicon = 'fa fa-clock-o';
                if(val.Purpose == 'Re-validation')
                    $scope.classicon = 'fa fa-repeat';
                if(val.Purpose == 'Vaccination')
                    $scope.classicon = 'fa fa-hospital-o';
                if(val.Purpose == 'Pre-Embarkation')
                    $scope.classicon = 'fa fa-ship';
                if(val.Purpose == 'Repeat')
                    $scope.classicon = 'fa fa-refresh';
                val['purposeicon'] = $scope.classicon;
                $scope.ActivityTimeline.push(val);
                if(val.Event =='appt') {
                    val['activityIcon'] = 'fa fa-stethoscope';
                    val['iconBackground'] = 'timeline-badge timeline-badge-sm thumb-32 bg-warning';
                    $scope.recentappt.push(val);
                } else {
                    val['activityIcon'] = 'fa fa-anchor';
                    val['iconBackground'] = 'timeline-badge timeline-badge-sm thumb-32 bg-purple';
                }
            });
            }
            else {
                $scope.noActivity = true;
            }
        }


        var itemsData = [];
        vm.openmodel = function (is_image, Modal1, size, pdf ) {
            var modalInstance = $modal.open({
                templateUrl: '/myModalContent.html',
                controller: ModalInstanceCtrl,
                size: size,
                resolve: {
                    items: function () {
                        $scope.pdfUrl = pdf;
                        itemsData.pdfUrl = $scope.pdfUrl;
                        itemsData.ModalName = Modal1;
                        itemsData.is_image = is_image;
                        return itemsData;
                    }
                }
            });
        };
        var itemsData1 = [];
        vm.openmodel1 = function (size,eveint) {
            var modalInstance = $modal.open({
                templateUrl: '/myModalContent1.html',
                controller: ModalInstanceCtrl1,
                windowClass: 'app-modal-window',
                size: size,
                id:eveint,
                backdrop: 'static',
                resolve: {
                    items: function () {
                        $rootScope.event = eveint;
                        if($rootScope.event=='1'){
                            $rootScope.event_change = 'Department';
                        }else if($rootScope.event=='2'){
                            $rootScope.event_change = 'Sub-Department';
                        }else {
                            $rootScope.event_change = 'Vessel';
                        }

                        return itemsData1;
                    }
                }
            });
        };

        //--------tab management-------------

        $scope.activeTab = 1;
        $scope.setActiveTab = function(tabToSet) {
            $scope.activeTab = tabToSet;
        };

        //--------Basic detail editable-----------------

        editableOptions.theme = 'bs3';
        editableThemes.bs3.inputClass = 'input-sm';
        editableThemes.bs3.buttonsClass = 'btn-sm';
        editableThemes.bs3.submitTpl = '<button type="submit" class="btn btn-success" ng-click="enablebutton()"><span class="fa fa-check"></span></button>';
        editableThemes.bs3.cancelTpl = '<button type="button" class="btn btn-default" ng-click="$form.$cancel()">'+
            '<span class="fa fa-times text-muted"></span>'+
            '</button>';

        $scope.showStatus = function() {
            if(angular.isDefined($scope.departmentList)) {
                var selected = $filter('filter')($scope.departmentList, {value: $scope.apptDetails.department});
                return ($scope.apptDetails.department && selected.length) ? selected[0].text : 'Not set';
            }
        };


        $scope.enablebutton = function() {
            $scope.showbutton= true;
        };
        $scope.hidebutton = function() {
            $scope.showbutton= false;
            $scope.IsShow = false;
            $scope.showpassbtn = true;
        };

        $scope.uiselectchange = function () {
            $scope.showbutton = true;
        };

        //------Add New passport in profile tab--------

        $scope.showpassbtn = true;
        $scope.showpassportbox = function() {
            $scope.IsShow = true;
            $scope.showpassbtn = false;
            $scope.showbutton = true;
        };

        //--------passport no verfication--------------

        $scope.fetchdata = function() {
            $scope.$watch('CandData.CandDetails.pass_no1', function () {
                $http({
                    method: 'POST',
                    url: 'server/company/getPassnoData',
                    data: {passno: $scope.CandData.CandDetails.pass_no1},
                    headers: {'X-API-KEY': $rootScope.currentUser.key}
                })
                    .success(function (data) {
                        if (data.name != false) {
                            SweetAlert.swal("Passport No. is Already used.");
                        }
                    }).error(function (err) {
                    console.log(err);
                });
            })
        }

        //------ Save seafarer data----------
        $scope.editablepass ={};
        $scope.seafarerData = function() {

            $scope.CandData.CandDetails.dob = $filter('date')(new Date($scope.CandData.CandDetails.dob), "yyyy-MM-dd");
            $scope.CandData.CandDetails.vessel = $scope.apptDetails.vessel;
            $scope.CandData.CandDetails.department = $scope.apptDetails.department;
            $scope.CandData.CandDetails.subdepartment = $scope.apptDetails.subdept;
            if(angular.isObject($scope.apptDetails.selectedrank))
            {
                $scope.CandData.CandDetails.rank = $scope.apptDetails.selectedrank;
            }
            AppointmentService.updateseafarer($scope.CandData.CandDetails, $scope.CandId)
                .then(function(res){
                    toaster.success({title: "Success", body: "Cadndidate data is Saved."});
                    if(angular.isObject($scope.apptDetails.selectedrank))
                    {
                        $scope.CandData.CandDetails.Rank = $scope.apptDetails.selectedrank.rank;    // to display rank on top of profile
                    }
                    angular.forEach($scope.vesselList, function(val){
                        if(val.id == $scope.apptDetails.vessel){
                            $scope.CandData.CandDetails.vessel = val.vessel_name;  //to diplay vessel name on top of profile
                        }
                    });
                    $scope.showbutton = false;
                    $scope.IsShow = false;
                    $scope.showpassbtn = true;
                }, function(err){
                    toaster.error({title: "Error", body: "Unable to save."});
                })
        };


        var ModalInstanceCtrl = function ($scope, $modalInstance, items ) {
            console.log(items);
            $scope.pdfUrl = items.pdfUrl;
            $scope.ModalName = items.ModalName;
            $scope.is_image = items.is_image;
            $loading.finish('ModalLoad');
            $scope.onError = function (error) {
                // handle the error
                console.log(error);
            };
            $scope.ok = function () {
                $modalInstance.close('closed');
            };

            $scope.cancel = function () {
                $modalInstance.dismiss('cancel');
            };

            $scope.printDiv = function (divname) {
                var SeafarerId = $stateParams.SeafarerId;
                var url = "server/app/GetCandidateDetails";
                $http.get(url, {
                    params: {SeafarerId: SeafarerId},
                    headers: {'X-API-KEY': $rootScope.currentUser.key}
                });

                var canvas = document.getElementById("pdf");
                var img = canvas.toDataURL("image/png");
                var fileurl = "app/img/clip_upload/f56d364cb4e118ac06de827b40f137b9.pdf";
                var html = "<html><head>" +
                    "</head>" +
                    "<body  style ='-webkit-print-color-adjust:exact;'>" +
                    "<iframe height='100%' width='80%' src=\"" + $scope.pdfUrl + "\" />" +
                    "</body>";
                var win = window.open($scope.pdfUrl);
                //win.document.write(html);
                win.print();
                win.focus();
            }
        };

        var ModalInstanceCtrl1 = function ($scope, $modalInstance, items ) {
            console.log(items);
            $scope.ModalName = ' Change Request';
            $loading.finish('ModalLoad');
            $scope.onError = function (error) {
                // handle the error
               // console.log(error);
            };
            $scope.ok = function () {
                $modalInstance.close('closed');
            };
          //reload dropdown data again
            $rootScope.reload_data = function() {
                $rootScope.click();
                $scope.ok();

            };

            $scope.cancel = function () {
                $modalInstance.dismiss('cancel');
            };
        };
        ModalInstanceCtrl.$inject = ['$scope','$modalInstance','items'];
        ModalInstanceCtrl1.$inject = ['$scope','$modalInstance','items'];

        //------Appointment Functions---------

        $scope.getClinicList = function ($item, $model) {
            AppointmentService.clinicList($item.Id)
                .then(function (response) {
                        $scope.clinicList = response;
                    },
                    function (err) {
                        console.log(err);
                    });
        };

        $scope.getclinic = function (drid) {
            AppointmentService.clinicList(drid)
                .then(function (response) {
                        $scope.clinicList = response;
                    },
                    function (err) {
                        console.log(err);
                    });
        };

        $scope.userinfo = {};
        $scope.apptDetails = {};
        var user = JSON.parse($window.sessionStorage["user"]);
        $scope.userinfo.companyid = user.session.co_id;
        $scope.userinfo.clinicdoc = user.lid;
        vm.CandId = $stateParams.CandId;

        $scope.saveAppt = function () {
            $scope.userinfo.cand = vm.CandId;
            if(angular.isObject($scope.apptDetails.ApptTime)) {
                $scope.apptDetails.ApptTime = $filter('date')(new Date($scope.apptDetails.ApptTime), "HH:mm:ss");
            } else {
                $scope.apptDetails.ApptTime = $filter('date')(new Date(vm.mytime), "HH:mm:ss");
            }
            if (angular.isObject($scope.apptDetails.ApptDate)) {
                $scope.apptDetails.ApptDate = $filter('date')(new Date($scope.apptDetails.ApptDate), "yyyy/MM/dd");
            }
            if (angular.isObject($scope.apptDetails.doj)) {
                $scope.apptDetails.doj = $filter('date')(new Date($scope.apptDetails.doj), "yyyy/MM/dd");
            }
            if (angular.isObject($scope.apptDetails.poj)) {
                $scope.apptDetails.poj = $filter('date')(new Date($scope.apptDetails.poj), "yyyy/MM/dd");
            }
            if (angular.isUndefined($scope.apptDetails.urgent)) {
                $scope.apptDetails.urgent = false;
            }

            //------to display purpose in recent box
            angular.forEach($scope.purposeList, function(val){
                if(val.Id == $scope.apptDetails.PurposeModel){
                    $scope.pupose = val.Purpose;
                }
            });

            //------to dispay doctor name and clinic name activity tab---------
            angular.forEach($scope.doctorList, function(val){
                if(val.Id == $scope.apptDetails.doctorModel){
                    $scope.doctorName = val.drName;
                }
            });
            angular.forEach($scope.clinicList, function(val){
                if(val.Id == $scope.apptDetails.ClinicModel){
                    $scope.clinicName = val.Clinic_name;
                }
            });


            if($scope.appointmentId) {
                AppointmentService.updateAppointment($scope.apptDetails, $scope.appointmentId)
                    .then(function(data){
                        data['ActivityDate'] = $filter('date')(new Date($scope.apptDetails.ApptDate), "dd-MM-yyyy");
                        data['Purpose'] = $scope.pupose;
                        data['DoctorName'] = $scope.doctorName;
                        data['Clinic'] = $scope.clinicName;
                        data['Event'] = "appt";
                        $scope.purposeicon($scope.pupose);
                        data['purposeicon'] =  $scope.classicon;
                        data['activityIcon'] = 'fa fa-stethoscope';
                        data['iconBackground'] = 'timeline-badge timeline-badge-sm thumb-32 bg-warning';
                        $scope.ActivityTimeline[$scope.idx] = data;
                        toaster.success({title: "Success", body: "Appointment is Updated."});
                        $scope.activeTab = 1;

                    }, function(error){
                        toaster.error({title: "Error", body: "Unable to update Appointment."});

                    })
            } else {
                AppointmentService.newAppointment($scope.apptDetails, $scope.userinfo)
                    .then(function (data) {
                            data['ActivityDate'] = $filter('date')(new Date($scope.apptDetails.ApptDate), "dd-MM-yyyy");
                            data['Purpose'] = $scope.pupose;
                            data['DoctorName'] = $scope.doctorName;
                            data['Clinic'] = $scope.clinicName;
                            data['Event'] = "appt";
                            $scope.purposeicon($scope.pupose);
                            data['purposeicon'] =  $scope.classicon;
                            data['activityIcon'] = 'fa fa-stethoscope';
                            data['iconBackground'] = 'timeline-badge timeline-badge-sm thumb-32 bg-warning';
                            $scope.ActivityTimeline.unshift(data);
                            toaster.success({title: "Success", body: "Appointment is Created."});
                            $scope.activeTab = 1;
                        },
                        function (error) {
                            toaster.error({title: "Error", body: "Unable to create Appointment."});
                        });
            }
            switch (vm.apptform.$invalid) {
                case angular.isUndefined($scope.apptDetails.PurposeModel):
                    $scope.selpupose = true;
                case angular.isUndefined($scope.apptDetails.profileModel):
                    $scope.selprofile = true;
                case angular.isUndefined($scope.apptDetails.doctorModel):
                    $scope.seldoctor = true;
                case angular.isUndefined($scope.apptDetails.ClinicModel):
                    $scope.selclinic = true;
                case angular.isUndefined($scope.apptDetails.StatusModel):
                    $scope.selstatus = true;
                /*  case angular.isUndefined($scope.apptDetails.selectedrank):
                    $scope.selrank = true;
                case angular.isUndefined($scope.apptDetails.dt):
                    $scope.selstatus = true;
                case angular.isUndefined($scope.apptDetails.dt1):
                    $scope.selstatus = true;
                case angular.isUndefined($scope.apptDetails.vessel):
                    $scope.selstatus = true;
                case angular.isUndefined($scope.apptDetails.StatusModel):
                    $scope.selstatus = true;// rank department  subdept dt dt1 vessel*/
            }
            if (!$scope.apptDetails.ApptDate) {
                $scope.seldate = true;
            }

            $scope.purposeicon = function(prpose){

                if(prpose == 'Treatment')
                    $scope.classicon = 'fa fa-plus-circle';
                if(prpose == 'Other')
                    $scope.classicon = 'fa fa-circle';
                if(prpose == 'Pre-joining')
                    $scope.classicon = 'fa fa-clock-o';
                if(prpose == 'Re-validation')
                    $scope.classicon = 'fa fa-repeat';
                if(prpose == 'Vaccination')
                    $scope.classicon = 'fa fa-hospital-o';
                if(prpose == 'Pre-Embarkation')
                    $scope.classicon = 'fa fa-ship';
                if(prpose == 'Repeat')
                    $scope.classicon = 'fa fa-refresh';

            }

        };

        //-------Edit Appointment GET-------------

        $scope.editappt = function(apptdateid, indexkey) {
            $scope.appointmentId = apptdateid;
            $scope.idx = indexkey;
            $scope.spinner = {active: true};
            AppointmentService.editAppointmentDetails(apptdateid)
                .then(function(data){
                    $scope.apptDetails = data;
                    $scope.apptDetails.ApptDate = data.editData.ApptDate;
                    $scope.apptDetails.ApptTime = data.editData.ApptDateTime;
                    $scope.apptDetails.doj = $filter('date')(new Date(data.editData.JoiningDate), "dd-MM-yyyy");
                    $scope.apptDetails.poj = $filter('date')(new Date(data.editData.Port), "dd-MM-yyyy");
                    $scope.apptDetails.department = data.selecteddept;
                    $scope.apptDetails.subdept = data.selectedsubdept;
                    $scope.apptDetails.selectedrank = data.selectedrank;
                    $scope.apptDetails.vessel = data.selectedVessel;
                    $scope.getclinic($scope.apptDetails.doctorModel);
                    $scope.activeTab = 3;
                    $scope.spinner = {active: false};
                    $scope.showstatus = true;
                    $scope.newapptbttn = true;
                    if (data.status !="PENDING")  {
                        $scope.disablefield= true;
                    } else {
                        $scope.disablefield= false;
                    }
                }, function(error){
                    console.log(error);
                })
        };

        //------appointment page navigate throgh button------

        $scope.appointmentpage = function($event) {
            $event.stopPropagation();
            $scope.appointmentId = undefined;
            $scope.apptDetails.ApptDate = undefined;
            $scope.apptDetails.ApptTime = undefined;
            $scope.apptDetails.ClinicModel = undefined;
            $scope.apptDetails.PurposeModel = undefined;
            $scope.apptDetails.doctorModel = undefined;
            $scope.apptDetails.profileModel = undefined;
            // $scope.apptDetails.rank = undefined;
            // $scope.apptDetails.department = undefined;
            // $scope.apptDetails.subdept = undefined;
            $scope.apptDetails.dt = undefined;
            $scope.apptDetails.dt1 = undefined;
            $scope.apptDetails.doj = undefined;
            $scope.apptDetails.poj = undefined;
            $scope.apptDetails.vessel = undefined;
            $scope.showstatus = false;
            $scope.newapptbttn = false;
            $scope.disablefield= false;
            $scope.activeTab = 3;
        };

        // Pie Charts
        // -----------------------------------
        $scope.fingerPrint=[];

        FingerprintService.fingerPrint($stateParams.CandId)
            .then(function(data){
                $scope.fingerPrint=data;
            }, function(error){
                // toaster.warning({title: 'Error', body:'Unable to get fingerprint data.'});
            });

        $scope.capture=function() {
            vm.piePercent1 = 0;

            FingerprintService.capture()
                .then(function(data){
                    var fingerData={};
                    if (data.ErrorCode == "0") {
                        vm.piePercent1 = 100;
                        data.id=$stateParams.CandId;
                        $scope.fingerImage=data.BitmapData;
                        console.log(data);
                        FingerprintService.saveFingerprint(data)
                            .then(function(res){
                                fingerData.Id=res.Id;
                                fingerData.fingertype='Finger '+fingerPrint.length+1;
                                fingerData.BitmapData=data.BitmapData;
                                $scope.fingerPrint.push(fingerData);
                            }, function(error){
                                toaster.warning({title: 'Sorry', body:'Fingerprint could not be saved.'});
                            });
                    }else{
                        toaster.error({title: 'Fingerprint Error', body:data.ErrorDescription});
                    }
                }, function(error){
                    toaster.warning({title: 'Fingerprint Error', body:'Fingerprint scanner is not properly installed.'});
                });
        };

        vm.piePercent1 = 0;
        vm.piePercent2 = 50;
        vm.pieOptions = {
            animate:{
                duration: 700,
                enabled: true
            },
            barColor: colors.byName('info'),
            // trackColor: colors.byName('inverse'),
            scaleColor: false,
            lineWidth: 10,
            lineCap: 'circle'
        };

        //-------------profile image update-------------------

        $scope.changePic = function (){
            var modalInstance = $modal.open({
                templateUrl: '/imageupload.html',
                controller: ModalInstanceCtrlImage
            });
            modalInstance.rendered.then(function () {
                angular.element(document.querySelector('#fileInput')).on('change', $rootScope.handleFileSelect);
            });
        };




        var ModalInstanceCtrlImage = function ($scope, $uibModalInstance, $rootScope, ImageUploadService, $stateParams) {
            $scope.CandId = $stateParams.CandId;
            $scope.reset = function () {
                $scope.myImage = '';
                $scope.myCroppedImage = '';
                $scope.imgcropType = 'square';
            };
            $scope.reset();
            $rootScope.handleFileSelect = function (evt) {
                console.log(evt);
                var file = evt.currentTarget.files[0];
                var reader = new FileReader();
                reader.onload = function (evt) {
                    $scope.$apply(function ($scope) {
                        $scope.myImage = evt.target.result;
                        
                    });
                };
                if (file) {
                    reader.readAsDataURL(file);
                }
            };


            $scope.ok = function () {
                $scope.data = {};
                $scope.data['image'] = $scope.myCroppedImage;
                $scope.data['candid'] = $scope.CandId;
               ImageUploadService.uploadImage($scope.data)
                    .then(function(res){
                        $rootScope.imagedata = "server/uploadedfiles/images/" + res;
                        $uibModalInstance.close('closed');
                    }, function(err){
                        $scope.errormsg ="Unable to Upload Picture";

                    })
                

            };
            $scope.cancel = function () {
                $uibModalInstance.dismiss('cancel');
            };

        };

        ModalInstanceCtrlImage.$inject = ['$scope','$modalInstance','$rootScope', 'ImageUploadService', '$stateParams'];
    }

    CandEventController.$inject = ['$scope', '$rootScope', 'DTOptionsBuilder', 'DTColumnBuilder', 'SweetAlert', '$compile',
                                'NewEventService', '$log', '$stateParams', '$q', '$state', '$parse', 'toaster', '$filter', '$http', 'AUTH_EVENTS'];
    function CandEventController($scope, $rootScope, DTOptionsBuilder, DTColumnBuilder, SweetAlert,$compile,
                                 NewEventService,$log, $stateParams, $q, $state, $parse, toaster, $filter, $http, AUTH_EVENTS) {

        var vm = this;
        $scope.IsVisible = true;
        $scope.showback = false;
        $scope.eventlist = true;
        $scope.ShowHide = function () {

            $scope.eventlist = true;
            $scope.showeventprofile = false;
            $scope.showback = false;

        };

        $scope.showevntbox = function() {
            $scope.create_event = true;
        };

        $scope.hideEventbox = function() {
            $scope.create_event = false; 
        };
        
        //Datatables for medical event log
        $scope.CandId = $stateParams.CandId;
        vm.dtOptions = DTOptionsBuilder.newOptions()
            .withOption('ajax', {
                url: 'server/company/List_Event',
                data: {CandId: $scope.CandId},
                headers: {'X-API-KEY': $rootScope.currentUser.key},
                type: 'POST',
                error: function (response) {
                    if (response.status === 400) {
                        $rootScope.$broadcast(AUTH_EVENTS.sessionTimeout);
                    } else if (response.status === 401) {
                        $rootScope.$broadcast(AUTH_EVENTS.notAuthenticated);
                    } else if (response.status === 403) {
                        $rootScope.$broadcast(AUTH_EVENTS.notAuthorized);
                    } else if (response.status === 503) {
                        $rootScope.$broadcast(AUTH_EVENTS.serverSessionClosed, response.responseJSON);
                    } else {
                        toaster.error({title: "Datatables Error", body: "Error fetching data."});
                    }
                }
                })
            .withDataProp('data')
            .withOption('serverSide', true)
            .withOption('processing', true)
            .withOption('order', [[4, 'desc']])
            .withPaginationType('full_numbers')
            .withLanguage({
                "processing":'<i class="fa fa-spinner fa-spin fa-2x"></i>'
            });
        vm.dtColumns = [
            DTColumnBuilder.newColumn('event_id').withTitle('Event Id.'),
            DTColumnBuilder.newColumn('name').withTitle('Event Name'),
            DTColumnBuilder.newColumn('cand_name').withTitle('Candidate'),
            DTColumnBuilder.newColumn('StatusName').withTitle('Status')
                .renderWith(function (data, type, full, meta) {
                    return '<a href="#" id="step2"><i tooltip="' + data + '" class="' + full.EventStatus + ' fa-2x" style=color' + full.Statuscolor + '></i></a>';
                }),
            DTColumnBuilder.newColumn('created_date').withTitle('Created Date'),
            DTColumnBuilder.newColumn(null).withOption('searchable', false).withTitle('Action').notSortable()
                .renderWith(function (data, type, full, meta) {
                    return '<a title="View" id="step3" type="button" ng-click = "viewcand(\'' + data.event_id + '\')" class="mr btn btn-circle btn-info"><em class="fa fa-list-alt" style="margin-top: 5px;"></em></a>' +
                        '<button title="Delete" type="button" id="step4" ng-click = "deleteEvent(\'' + data.id + '\')" class="mr btn btn-circle btn-danger"><em class="fa fa-times"></em></button>';
                })
        ];

        vm.dtOptions.withOption('fnRowCallback',
            function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                $compile(nRow)($scope);
                $scope.$apply();
            });

        // $scope.reload = reloadData;
        vm.dtInstance = {};
        $scope.reloadData = function() {
            vm.dtInstance.rerender();
        };

        $scope.viewcand = function (evnt_id) {
            $scope.EventId = evnt_id;
            // $scope.ShowHide();
            $scope.eventlist = false;
            $scope.showeventprofile = true;
            $scope.showback = true;
            $scope.GetLogdata(evnt_id);
            $scope.CandidateData(evnt_id);
        };

        vm.format = 'dd-MM-yyyy';
        vm.logs = [];

        $scope.GetLogdata = function(){
            //  console.log(evnt_id);
            vm.logdata = NewEventService.GetLogdata($scope.EventId)
                .then(function(response){
                        $scope.loginfo = response.LogInfo;
                        if(angular.isArray(response.LogInfo)){
                            vm.logs = response.LogInfo;
                        }

                        $scope.medicalInfo.total_cost = response.cost;
                        if($scope.medicalInfo.deductible_cost)
                            $scope.medicalInfo.claim_amount = ($scope.medicalInfo.total_cost - $scope.medicalInfo.deductible_cost);
                        else {
                            $scope.medicalInfo.claim_amount = ($scope.medicalInfo.total_cost);
                        }
                        $scope.EventList = response.EventList;
                        //     console.log($scope.EventList);
                        $scope.UpdateCostData();
                        //        console.log($scope.EventList);

                    },
                    function(err){
                        $log.error(err);
                    }
                )
        };


        // Medical Event Log

        $scope.medicalInfo = {};
        if($rootScope.newEvent)
        {
            toaster.success('New Event Created');
            $rootScope.newEvent = false;
        }

        $scope.event_case_change = function ($event,checked) {
            var data = [{"status":checked}];
            var key='event_id';
            vm.UpdateLog = NewEventService.CaseStatusChange(vm.case_id,data[0],key)
                .then(function(response){
                        toaster.success(response.Msg);
                        $scope.medicalInfo.status = checked;
                        var success = response.Success;
                    },
                    function(err){
                        $log.error(err);
                        var success = err.Success;
                        toaster.error(err.Msg);
                    });
        };

        $scope.create_new_event = function(){
            vm.CreateNewEvent = NewEventService.NewEventCreate($scope.EventId)
                .then(function(response){
                        $scope.EventList.push(response.EventList[0]);
                        $rootScope.newEvent = true;
                        // var result = {EventId:Id};
                        // $state.go('app.events',result);
                    },
                    function(err){
                        $log.error(err);
                        var success = response;
                    });
        };

        vm.open = function ($event,date_name,flag)
        {
            if(flag)
            {
                $event.preventDefault();
                $event.stopPropagation();
                var model = $parse(date_name);
                model.assign(vm,true);
            }
            else
            {
                var date = new Date();
                var today_date =  ('0' + date.getDate()).slice(-2)+ '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + date.getFullYear();
                $scope.medicalInfo[date_name] = today_date;
            }

        };

        vm.dateOptions = {
            formatYear: 'yy',
            startingDay: 1
        };

        vm.disabled = function (date, mode) {
            return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 7 ) );
        };
        
        $scope.saveData= function(form){
            $scope.submitted = true;
            if(form) {
                if($scope.EventId){
                    vm.Insertdata = NewEventService.InsertEventdata($scope.EventId,this.medicalInfo)
                        .then(function(response){
                                $scope.formInfo = response;
                                toaster.success("Data Saved Successfully");
                            },
                            function(err){
                                $log.error(err);
                            }
                        )}
            }
        };

      
        $scope.CandidateData = function(){
            vm.CandidateData = NewEventService.GetCandidateData($scope.EventId)
                .then(function (response) {
                        console.log(response);
                        $scope.formInfo = response.CandInfo;
                        $scope.medicalInfo = response.MedInfo;
                        $scope.reviewreport = response.MedInfo['tbl_reviewreport'];
                        $scope.typeofcomplaint = response.MedInfo['tbl_typeofcomplaint'];
                        $scope.actionTaken = response.MedInfo['tbl_actiontaken'];
                        vm.case_id = response.CandInfo['case_id'];

                    },
                    function (err) {
                        $log.error(err);
                    }
                )
        };


        $scope.UpdateCostData = function () {
            var total_cost = ($scope.medicalInfo.total_cost)?$scope.medicalInfo.total_cost:0;
            var deductible_cost = ($scope.medicalInfo.deductible_cost)?$scope.medicalInfo.deductible_cost:0;
            var claim_amount = ($scope.medicalInfo.claim_amount)?$scope.medicalInfo.claim_amount:0;
            var key = 'Id';
            var data = [{"total_cost":total_cost , "deductible_cost":deductible_cost , "claim_amount":claim_amount}];
            vm.UpdateLog = NewEventService.CaseStatusChange(vm.EventId,data[0],key)
                .then(function(response){
                        var success = response.Success;
                    },
                    function(err){
                        $log.error(err);
                        var success = response.Success;
                        toaster.error(response.Msg);
                    });
        }
        vm.checkName = function(data1, id) {
            if (data1 == null) {
                return 'Name should not be empty';
            }
        };

        vm.checkCost = function(data, id) {
            if (data == null) {
                return 'Cost should not be empty';
            }
        };

        vm.saveLog = function(data, id) {
            angular.extend(data, {id: id});
            //for new log
            if(typeof vm.inserted !== "undefined") {
                var newId = true;
                var id = vm.case_id;
            }
            else
            {
                var newId = false;
                var id = id;
                // for update log
            }
            vm.UpdateLog = NewEventService.UpdateLogData(data,id,newId)
                .then(function(response){
                        toaster.success(response.Msg);
                        var success = response.Success;
                        $scope.GetLogdata();
                    },
                    function(err){
                        $log.error(err);
                        var success = response.Success;
                        toaster.error(response.Msg);
                    });

        };
        
        // remove user
        vm.removeUser = function(index) {
            var id = vm.logs[index].id;
            var data = [{void:1,id:id}];
            var newId = false;
            vm.UpdateLog = NewEventService.UpdateLogData(data[0],id,newId)
                .then(function(response){
                        toaster.success('Deleted Successfully');
                        var success = response.Success;
                        $scope.GetLogdata();
                    },
                    function(err){
                        $log.error(err);
                        var success = response.Success;
                        toaster.error('Error Deleting');
                    });

            var del = vm.logs[index].id;
            vm.logs.splice(index, 1);
        };

        // add user
        vm.addUser = function() {
            var date = new Date();
            var today_date =  ('0' + date.getDate()).slice(-2)+ '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + date.getFullYear();
            vm.inserted = {
                id: vm.logs.length+1,
                log_id: vm.case_id,
                log_type: '',
                log_date: today_date,
                internal_notes: null,
                cost: '',
                isNew: true
            };
            vm.logs.push(vm.inserted);
        };

        // editable column
        // -----------------------------------


        vm.saveColumn = function(column) {
            var results = [];
            angular.forEach(vm.logs, function(user) {
                // results.push($http.post('/saveColumn', {column: column, value: user[column], id: user.id}));
                console.log('Saving column: ' + column);
            });
            return $q.all(results);
        };

        // editable table
        // -----------------------------------

        // filter users to show
        vm.filterUser = function(user) {
            return user.isDeleted !== true;
        };

        // mark user as deleted
        vm.deleteUser = function(id) {
            var filtered = $filter('filter')(vm.logs, {id: id});
            if (filtered.length) {
                filtered[0].isDeleted = true;
            }
        };

        // cancel all changes
        vm.cancel = function() {
            for (var i = vm.logs.length; i--;) {
                var user = vm.logs[i];
                console.log(user);
                // undelete
                if (user.isDeleted) {
                    delete user.isDeleted;
                }
                // remove new
                if (user.isNew) {
                    vm.logs.splice(i, 1);
                }
            }
        };

        // save edits
        vm.saveTable = function() {
            var results = [];
            for (var i = vm.logs.length; i--;) {
                var user = vm.logs[i];
                // actually delete user
                if (user.isDeleted) {
                    vm.logs.splice(i, 1);
                }
                // mark as not new
                if (user.isNew) {
                    user.isNew = false;
                }

                // send on server
                // results.push($http.post('/saveUser', user));
                console.log('Saving Table...');
            }
            return $q.all(results);
        };

        $scope.viewEvent = function (Id) {
            var result = {EventId: Id['EventId']};
            $state.go('app.events', result)
        };

        //----------Create new event--------------------

        $scope.eventdata = {};
        $scope.createEvent = function () {
            $http({
                method: 'POST',
                url: 'server/PAI/Generate_event',
                data: {Event_name: $scope.eventdata.Eventname, UserId: $scope.CandId},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (data) {
                    $scope.create_event = false;
                    $scope.reloadData();
                })
                .error(function (error, status) {
                    $scope.FormData.error = {error: error, status: status};
                })
        }
        
        //----------Delete Event-------------------

        $scope.deleteEvent = function(Id)
        {
            SweetAlert.swal({
                    title: "Are you sure?",
                    text: "You want to delete the Event?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        NewEventService.deleteEvent(Id)
                            .then(function (response) {
                                    console.log(response);
                                    SweetAlert.swal("Deleted!", response.Msg, "success");
                                    $scope.reloadData();
                                },
                                function (err) {
                                    SweetAlert.swal("Cancelled", err.Msg, "error");
                                });
                    }
                }
            );
        };


    }


})();
