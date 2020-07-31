'use strict'

$(document).ready(function(){

  // 退会ボタンのアクティブ化
  $('#check').click(function () {
    if( $('#check').prop("checked") ) {
      $('#withdraw').prop('disabled',false);
    } else {
      $('#withdraw').prop('disabled',true);
    }
  })

})
