/* ==========================================================
 * QuickAdmin v2.0.0
 * form_elements.js
 * 
 * http://www.mosaicpro.biz
 * Copyright MosaicPro
 *
 * Built exclusively for sale @Envato Marketplaces
 * ========================================================== */ 

$(function()
{
	/*
	 * Input Masks
	 */
	$.extend($.inputmask.defaults, {
        'autounmask': true
    });

	$("#inputmask-date").inputmask("d/m/y", {autoUnmask: true});
    $("#inputmask-date1").inputmask("d/m/y", {autoUnmask: true});
    $("#inputmask-date2").inputmask("d/m/y", {autoUnmask: true});
    $("#inputmask-date3").inputmask("d/m/y", {autoUnmask: true});
    $("#inputmask-date4").inputmask("d/m/y", {autoUnmask: true});
    $("#inputmask-date5").inputmask("d/m/y", {autoUnmask: true});
    $("#inputmask-date-1").inputmask("d/m/y",{ "placeholder": "dd/mm/yyyy"});
    $("#inputmask-date-2").inputmask("d/m/y",{ "placeholder": "dd/mm/yyyy"});
    $("#inputmask-phone").inputmask("mask", {"mask": "(9999) 999-9999"});
    $("#inputmask-phone1").inputmask("mask", {"mask": "(9999) 999-9999"});
    $("#inputmask-phone2").inputmask("mask", {"mask": "(9999) 999-9999"});
    $("#inputmask-dinner").inputmask("mask", {"mask": "(9999) 999-9999"});
    $("#inputmask-tax").inputmask({"mask": "99-9999999"});
    $("#inputmask-ci").inputmask({"mask": "99.999.999"});
    $("#inputmask-currency").inputmask({"mask": "9999,99"});
    $("#inputmask-decimal").inputmask('decimal', { rightAlignNumerics: false });
    $("#inputmask-ssn").inputmask("999-99-9999", {clearMaskOnLostFocus: true });

});