<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/top');

Route::view('/top', 'top');
Route::view('/info', 'info');

Route::get('users/events', 'Users\ShowEventsAction')->name('Events');

Route::group(['middleware' => 'auth'], function() {
  // ユーザー（選手）機能に関するルート
  Route::view('users/mypage', 'Users.mypage')->name('Mypage');
  Route::post('users/make-entry', 'Users\MakeEntriesAction')->name('MakeEntry');
  Route::get('users/entries', 'Users\ShowEntriesAction')->name('Entries');
  Route::post('users/entries/refuse-to-accept', 'Users\RefuseToAcceptAction')->name('Refuse');
  Route::view('users/mypage/edit-info', 'Users.edit-info')->name('EditInfoForm');
  Route::post('users/mypage/edit-info', 'Users\EditInfoAction')->name('EditInformation');
  Route::view('users/mypage/chenge-pass', 'Users.change-pass')->name('ChangePassForm');
  Route::post('users/mypage/chenge-pass', 'Users\ChangePasswordAction')->name('ChangePassword');
  Route::view('users/mypage/withdraw', 'Users.withdrawal')->name('WithdrawForm');
  Route::post('users/mypage/withdraw', 'Users\WithdrawalAction')->name('Withdrawal');
  Route::view('users/inquiry', 'Users.inquiry')->name('InquiryForm');
  Route::post('users/inquiry', 'Users\InquiryAction')->name('InquirySend');

  // 管理者機能に関するルート
  Route::get('admin/players-list', 'Admin\ShowPlayersAction')->name('PlayersList');
  Route::post('admin/player-info', 'Admin\ShowPlayerDetailAction')->name('PlayerInfo');
  Route::get('admin/hole', 'Admin\ShowHoleRaceAction')->name('Hole');
  Route::view('admin/make-event', 'Admin.make-event')->name('MakeEventForm');
  Route::post('admin/make-event', 'Admin\MakeEventAction')->name('MakeEventDo');
  Route::get('admin/edit-races/re-schedule', 'Admin\ShowEditScheFormAction')->name('ScheduleForm');
  Route::post('admin/edit-races/re-schedule', 'Admin\EditScheduleAction')->name('EditSchedule');
  Route::get('admin/edit-races/delete-form', 'Admin\ShowRacesDelFormAction')->name('RacesDelForm');
  Route::post('admin/edit-races/event-delete', 'Admin\DeleteEventAction')->name('DelEvent');
  Route::post('admin/edit-races/race-delete', 'Admin\DeleteRaceAction')->name('DelRace');
  Route::post('admin/result-form', 'Admin\ShowResultFormAction')->name('ResultForm');
  Route::post('admin/result', 'Admin\InsertResultAction')->name('InsertResult');

});

Auth::routes();
