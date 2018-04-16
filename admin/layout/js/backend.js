$(function(){

  'use strict';

  $('[placeholder]').focus(function(){

    $(this).attr('data-text',$(this).attr('placeholder'));

    $(this).attr('placeholder','')


  }).blur(function(){

    $(this).attr('placeholder',$(this).attr('data-text'));

  });



  // member page convert field password hover to visable

  var passfield =  $('.pass');

  $('.show-pass').hover(function(){

    passfield.attr('type','text');

  },function(){

    passfield.attr('type','password');
  });



});
