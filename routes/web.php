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
Route::view('users/inquiry', 'Users.inquiry')->name('InquiryForm');
Route::post('users/inquiry', 'Users\SendInquiryAction')->name('InquirySend');

Route::get('login_player', 'Auth\BriefLoginController@player_authenticate')->name('PlayerLogin');
Route::get('login_admin', 'Auth\BriefLoginController@admin_authenticate')->name('AdminLogin');


Route::group(['middleware' => 'auth'], function() {
    // 認証（独自ログアウト）処理
    Route::get('my-logout', 'Auth\MyLogoutAction')->name('MyLogout');

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

    // 管理者機能に関するルート
    Route::group(['middleware' => 'admin'], function() {
        Route::get('admin/players-list', 'Admin\ShowPlayersAction')->name('PlayersList');
        Route::post('admin/player-info', 'Admin\ShowPlayerDetailAction')->name('PlayerInfo');
        Route::get('admin/hole', 'Admin\ShowHoleRaceAction')->name('Hole');
        Route::view('admin/make-event', 'Admin.make-event')->name('MakeEventForm');
        Route::post('admin/make-event', 'Admin\MakeEventAction')->name('MakeEventDo');
        Route::get('admin/hole/re-schedule', 'Admin\ShowEditScheFormAction')->name('ScheduleForm');
        Route::post('admin/hole/re-schedule', 'Admin\EditScheduleAction')->name('EditSchedule');
        Route::get('admin/hole/{event}/add-delete-form', 'Admin\ShowRacesAddDelFormAction')->name('RacesAddDelForm');
        Route::post('admin/hole/event-delete', 'Admin\DeleteEventAction')->name('DelEvent');
        Route::post('admin/hole/race-delete', 'Admin\DeleteRaceAction')->name('DelRace');
        Route::post('admin/hole/race-add', 'Admin\AddRaceAction')->name('AddRace');
        Route::get('admin/hole/{event}/result-form', 'Admin\ShowResultFormAction')->name('ResultForm');
        Route::post('admin/result', 'Admin\InsertResultAction')->name('InsertResult');
    });
});


Auth::routes();

// Route::get('/mail', 'MailSendController@send');
