// Created by Wenbin Guo at the University of Missouri

angular.module('studentApp', [])
	.controller('StudentController', function($scope) {
	
        $scope.students = [
                            { 'Active':true,
                              'Status': 'Online',
                              'Snumber':'01',
                              'Sname': 'Wenbin Guo',
                              'Address': 'Columbia',
                              'Phone':'5733978648',
                              'Email': 'guowenbin90@gmail.com',
                              'Facebook': 'Wenbin',
                              'Github': 'guowenbin90'
                            },
                                { 'Active':true,
                                  'Status': 'Online',
                                  'Snumber':'02',
                                  'Sname': 'John Smith',
                                  'Address': 'St.Louis',
                                  'Phone':'5733976543',
                                  'Email': 'JohnS@gmail.com',
                                  'Facebook': 'John',
                                  'Github': 'JohnS92'
                                }, 
                                    { 'Active':true,
                                      'Status': 'Online',
                                      'Snumber':'03',
                                      'Sname': 'Caroline Copper',
                                      'Address': 'Kansas City',
                                      'Phone':'5733977531',
                                      'Email': 'CarolineC@gmail.com',
                                      'Facebook': 'Caroline',
                                      'Github': 'Caroline93'
                                    },
                            ];
//            $scope.students = (localStorage.getItem("students") !=null) ?
//                            JSON.parse(localStorage.getItem("students")):[];
    
            localStorage.setItem('students', JSON.stringify($scope.students));
            $scope.totalStudents = 3;
            $scope.activeNumber = 3;
    
//            $scope.views = ["Select One","List","Table","System","All"]
//            $scope.selection = "Select One";
            
            $scope.getTotalStudents = function(){
                return $scope.students.length;
            };
    
            $scope.addRow = function(){		
                $scope.Status='Online';
                $scope.students.push({ 'Active':true, 'Status':$scope.Status, 'Snumber':$scope.Snumber, 'Sname': $scope.Sname, 'Address':$scope.Address, 'Phone':$scope.Phone, 'Email': $scope.Email, 'Facebook':$scope.Facebook, 'Github':$scope.Github });
                
                $scope.Snumber='';
                $scope.Sname='';
                $scope.Address='';
                $scope.Phone='';
                $scope.Email='';
                $scope.Facebook='';
                $scope.Github='';
                
                localStorage.setItem('students', JSON.stringify($scope.students));
                $scope.totalStudents = $scope.getTotalStudents();
                $scope.activeNumber = $scope.activeNumber+1;
            };
    
            $scope.removeRow = function(Snumber){				
                var index = -1;		
                var comArr = eval( $scope.students );
                for( var i = 0; i < comArr.length; i++ ) {
                    if( comArr[i].Snumber === Snumber ) {
                        index = i;
                        break;
                    }
                }
                if( index === -1 ) {
                    alert( "Something gone wrong" );
                }
                $scope.students.splice( index, 1 );	
                localStorage.setItem('students', JSON.stringify($scope.students));
                $scope.totalStudents = $scope.getTotalStudents();
                $scope.activeNumber = $scope.activeNumber-1;
            };
            

            $scope.changeStatus = function(snumber) {
                           for(var i = 0; i < $scope.students.length; i++) {
                               if($scope.students[i].Snumber == snumber) {
                                   if($scope.students[i].Active == true){ 
                                       $scope.students[i].Active = false;
                                       $scope.students[i].Status = "Offline";
                                       $scope.activeNumber -= 1;
                                   }
                                   else {
                                       $scope.students[i].Active = true;
                                       $scope.students[i].Status = "Online";
                                       $scope.activeNumber += 1;
                                   }
                               }
                           }
                           localStorage.setItem("students",JSON.stringify($scope.students));
                           localStorage.setItem("activeNumber",$scope.activeNumber);
                      }            
    
            $scope.remaining = function(){
                var count = 3;
                angular.forEach($scope.students, function(student){
                    count += student.Active ? 0 : 1;
                });
                return count;
            };

            $scope.archive = function(){
                var oldStudents = $scope.students;

                $scope.students = [];

                angular.forEach(oldStudents, function(student){
                    if(!student.Active) $scope.students.push(student);
                });

                //update local storage
                localStorage.setItem("students", JSON.stringify($scope.students))
            };

            $scope.refresh = function(checked){
                var tempStudents = JSON.parse(localStorage.getItem("students"));

                angular.forEach(tempStudents, function(student){
                    if(angular.equals(checked.student, student)){
                        student.Active = !student.Active;
                        localStorage.setItem("students", JSON.stringify(tempStudents));
                    }
                });
            };
    

	});
