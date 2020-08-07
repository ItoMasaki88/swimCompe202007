'use strict';

const select_year = $('#select_year');
const select_month = $('#select_month');
const select_day = $('#select_day');
let i;

function set_year(){
  // 未選択を生成
  $("<option>", {
    value: 0,
    text: '選択してください'
  }).appendTo('#select_year');
  // 年を生成(100年分)
  for(i = 2014; i > 1919; i--){
    $("<option>", {
      value: i,
      text: i
    }).appendTo('#select_year');
  }
}
function set_month(){
  // 未選択を生成
  $("<option>", {
    value: 0,
    text: '選択してください'
  }).appendTo('#select_month');
  // 月を生成(12)
  for(i = 1; i <= 12; i++){
    $("<option>", {
      value: i,
      text: i
    }).appendTo('#select_month');
  }
}
function set_day(){
  //日の選択肢を空にする
  $('#select_day').empty();
  // 未選択を生成
  $("<option>", {
    value: 0,
    text: '選択してください'
  }).appendTo('#select_day');
  // 日を生成(動的に変える)
  let last_day = 30;
  const month_array = [2,4,6,9,11];
  const selected_year = parseFloat($('#select_year').val());
  const selected_month = parseFloat($('#select_month').val());
  if ($.inArray(selected_month, month_array) === -1) {
    last_day = 31;
  } else if (selected_month === 2) {
    if (selected_year%4 === 0) {
      last_day = 29;
    } else {
      last_day = 28;
    }
  }
  // console.log('last_day', last_day);

  for (i = 1; i <= last_day; i++) {
    $("<option>", {
      value: i,
      text: i
    }).appendTo('#select_day');
  }
}

$(document).ready(function(){
  // load時、年月変更時に実行する
  set_year();
  set_month();
  set_day();

  $('#select_month').change(function() {
    set_day();
  });
  $('#select_year').change(function() {
    set_day();
  });
})
