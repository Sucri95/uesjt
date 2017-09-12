<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
| /estudiante/verestudiante?id={{$iddelestidante}}
$idstudent = $_GET['id'];
*/
App::missing(function($exception)
        {
            return  Redirect::to('/?msg='.utf8_encode("Dirección no existente").'&titulo='.utf8_encode('Alerta!!'));
        });
Route::get('/', function()
{
	return View::make('home');
});
Route::get('/about', 'HomeController@about');
//Student's Routes
Route::get('/createstudent', 'StudentController@createstudent');
Route::post('/createstudent', 'StudentController@creator'     );
Route::get('/student/update', 'StudentController@edit'        );
Route::get('/student/medical', 'StudentController@medical'    );
Route::post('/student/update', 'StudentController@editor'     );
Route::get('/student/delete', 'StudentController@delete'      );
//Document's Routes
Route::get('/notifications/documents','DocumentController@create'   );
Route::post('/notifications/documents', 'DocumentController@creator');
Route::get('/notifications/edits','DocumentController@view'         );
Route::get('/notifications/delete', 'DocumentController@delete'     );
//Teacher's Routes
Route::get('/createteacher', 'TeacherController@createteacher');
Route::post('/createteacher', 'TeacherController@creator'     );
Route::get('/teacher/update', 'TeacherController@edit'        );
Route::post('/teacher/update', 'TeacherController@editor'     );
Route::get('/teacher/index', 'TeacherController@index'        );
Route::get('/teacher/delete', 'TeacherController@delete'      );
//Parent's Routes
Route::get('/createparent', 'ParentController@createparent');
Route::post('/createparent', 'ParentController@creator'    );
Route::get('/parent/update', 'ParentController@edit'       );
Route::post('/parent/update', 'ParentController@editor'    );
Route::get('/parent/index', 'ParentController@index'       );
Route::get('/parent/delete', 'ParentController@delete'     );
//List's Routes
Route::get('/createlist', 'ListController@createlist');
Route::post('/createlist', 'ListController@creator'  );
//Assigment's Routes
Route::post('/assigments/classevaluation', 'AssigmentController@classevaluation');
Route::get('/assigments/classevaluation', 'AssigmentController@viewclass'       );
Route::get('/assigments/index', 'AssigmentController@view'                      );
//Attendances's Routes
Route::get('/attendances/index', 'AttendancesController@index');
Route::get('/attendances/viewstudent', 'AttendancesController@viewstudent');
Route::post('/attendances/creator', 'AttendancesController@creator');
//Calification's Routes
Route::post('/califications/classcalification', 'CalificationController@continueval'       );
Route::get('/califications/classcalification', 'CalificationController@view'               );
Route::get('califications/viewnotes', 'CalificationController@viewnotes'                   );
Route::get('califications/ajaxgrade', 'CalificationController@ajaxgrade'                   );
Route::get('califications/ajaxnotes', 'CalificationController@ajaxnotes'                   );
Route::get('/califications/index', 'CalificationController@index'                          );
Route::get('/califications/indexsubjet', 'CalificationController@indexsubjet'              ); 
Route::get('/califications/viewstudentbygrade', 'CalificationController@viewstudentbygrade');
Route::get('califications/updatecalification', 'CalificationController@edit'               );
Route::post('califications/updatecalification', 'CalificationController@editor'            );
Route::post('/calificationsadmin/classcalification', 'CalificationController@continueval'  );
Route::get('/calificationsadmin/classcalification', 'CalificationController@viewadmin'     );
Route::get('/calificationsadmin/index', 'CalificationController@indexadmin'                );
//Payment's Routes
Route::get('/payments/createpayment', 'PaymentController@createpayment');
Route::post('/payments/createpayment', 'PaymentController@creator'     );
Route::get('/payments/viewpayment', 'PaymentController@view');
Route::get('/payments/index', 'PaymentController@index');
//Grade's Routes
Route::get('/grades/index', 'GradesController@index'                          );
Route::get('/grades/viewstudentbygrade', 'GradesController@viewstudentbygrade');
//Period's Routes
Route::get('//createyear', 'PeriodController@create'       );
Route::post('/createyear', 'PeriodController@creatoryear'  );
Route::get('/periods/index', 'PeriodController@view'       );
//Login's Routes
Route::get('/logout', 'TeacherController@logout');
Route::post('/login', 'TeacherController@login' );
//Backrestore's Routes
Route::get('/backup', 'BackrestoreController@backups' );
Route::get('/restore', 'BackrestoreController@restores' );
Route::get('/judas.sql.gz','BackrestoreController@judas' );
Route::get('download', function() {
    return Response::download(Input::get('path'));
});
//Schedule
Route::get('/schedules/createschedule', 'ScheduleController@create'      );
Route::post('/schedules/createschedule', 'ScheduleController@creator'    );
Route::get('/schedules/sortbygrade', 'ScheduleController@sortbygrade'    );
Route::get('/schedules/showschedule', 'ScheduleController@scheduleshow'  );
Route::get('/schedules/deletemodule', 'ScheduleController@deletemodule'  );
//Mail's Functions
Route::get('/emails/createtopic', 'TopicController@index'     );
Route::post('/emails/createtopic', 'TopicController@creator'  );
Route::get('/emails/password', 'TopicController@view'         );
Route::post('/emails/password', 'TopicController@backpassword');
//Report Routes
Route::get('/reports/index','ReportController@view'                                   );
Route::get('/reports/attendancereport','ReportController@attendancereport'            );
Route::get('/reports/graphicreport','ReportController@graphicreport'                   );
Route::get('/reports/attendancereportselect','ReportController@attendancereportselect');
Route::get('/reports/listreport','ReportController@listreport'                        );
Route::get('/reports/listreportselect','ReportController@listreportselect'            );
Route::get('/reports/constanciareport','ReportController@constanciareport'            );
Route::get('/reports/constanciareportselect','ReportController@constanciareportselect');
Route::get('/reports/evaluationreport','ReportController@evaluationreport'            );
Route::get('/reports/evaluationreportselect','ReportController@evaluationreportselect');
Route::get('/reports/boletinreport','ReportController@boletinreport'                  );
Route::get('/reports/boletinreportselect','ReportController@boletinreportselect'      );
Route::get('/reports/promedioreport','ReportController@promedioreport'                );
Route::get('/reports/promedioreportselect','ReportController@promedioreportselect'    );
Route::get('/reports/ajaxperiod','ReportController@ajaxperiod'                        );
Route::get('/reports/schedulesreport','ReportController@schedulesreport'              );
Route::get('/reports/schedulesreportselect','ReportController@schedulesreportselect'  );
Route::get('/reports/disablereport','ReportController@disablereport'              );
Route::get('/reports/disablereportselect','ReportController@disablereportselect'  );