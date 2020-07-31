'use strict'

// Func 「条件に該当する種目がありません」を表示
function NothingBut(){
  let n_flag = 0;
  $('tbody tr').each(function(){
    if (!$(this).hasClass('d-none')) { n_flag++; }
  })
  if (n_flag > 0) {
    $('#nothing').addClass('d-none');
  } else {
    $('#nothing').removeClass('d-none');
  }
}

// Func 絞り込み検索
function NarrowDown(){
  const eventAttributes = ['style', 'sex', 'age', 'dist', 'player_type'];
  $('tbody tr').each(function(){
    let data = $(this).data();
    let flag = 0;
    eventAttributes.forEach(function( value ) {
      let selection = $( '#'+value + ' option:selected').val();
      if (!(selection == data[value]  ||  selection == 99)) {
        flag++;
      }
    });
    if (flag > 0) {
      $(this).addClass('d-none');
    } else {
      $(this).removeClass('d-none');
    }
  })
}

// Func エントリー可能種目のみ表示（オン）
function entriableOn(){
  $('#boxOfCheck').removeClass('border-secondary');
  $('#boxOfCheck').addClass('bg-primary text-white border-primary');

  $('select').each(function(){
    $(this).prop('disabled', true);
  })
  $('tbody tr').each(function(){
    let data = $(this).data();
    if (!(data['status'] == 1)) {
      $(this).addClass('d-none');
    } else {
      $(this).removeClass('d-none');
    }
  })
}
// Func エントリー可能種目のみ表示（オフ）
function entriableOff(){
  $('#boxOfCheck').removeClass('bg-primary text-white border-primary');
  $('#boxOfCheck').addClass('border-secondary');

  $('select').each(function() {
    $(this).prop('disabled', false);
  })
}


$(document).ready(function(){

  // エントリーボタンの表示・非表示
  $('.entryCheck').click(function () {
    let flag = 0;
    $('.entryCheck').each(function(){
      if( $(this).prop("checked") ) { flag++; }
    })
    if ( flag > 0 ) {
      $('.my-bg-black-trans').removeClass('d-none');
    } else {
      $('.my-bg-black-trans').addClass('d-none');
    }
  })

  // 絞り込み検索 実行
  $('select').change(function(){
    NarrowDown();
    NothingBut();
  })

  // エントリー可能種目のみ表示 実行
  $('#entriable').change(function(){
    if( $(this).prop("checked") ) {
      entriableOn();
    } else {
      entriableOff();
      NarrowDown();
    }
    NothingBut();
  })

  // 検索条件リセット
  $('button').click(function(){
    $('select').val(99);
    $('#entriable').prop('checked', false);
    entriableOff();
    $('tbody tr').removeClass('d-none');
  })
})
