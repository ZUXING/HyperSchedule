// JavaScript Document

var browser_w = document.documentElement.clientWidth || document.body.clientWidth;
var browser_h = document.documentElement.clientHeight || document.body.clientHeight;

window.onload=function(){

	var docIDvlayer = document.getElementById("viewlayer");
	var docIDschedule = document.getElementById("schedule");
	var docIDfooter = document.getElementById("footer");
	
	docIDvlayer.style.height = browser_h + "px";
	//docIDschedule.style.top = (browser_h - 40 - 48) + "px";
	docIDfooter.style.top = browser_h + "px";
};