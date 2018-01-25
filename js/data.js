$.ajaxSetup({	async: false	});

<!--Page Name: Garnier-->
var garnier = (function() {
							var result;
							$.getJSON('https://graph.facebook.com/Garnier?access_token=PUT_YOUR_ACCESS_TOKEN_HERE&fields=fan_count', {}, function(data){
							  result = data;
							});
							return result;
						})();

<!--Page Name: lorealparisindia-->
var loreal = (function() {
							var result;
							$.getJSON('https://graph.facebook.com/lorealparisindia?access_token=PUT_YOUR_ACCESS_TOKEN_HERE&fields=fan_count', {}, function(data){
							  result = data;
							});
							return result;
						})();

<!--Page Name: skinelementsindia-->						
var skinElements = (function() {
							var result;
							$.getJSON('https://graph.facebook.com/skinelementsindia?access_token=PUT_YOUR_ACCESS_TOKEN_HERE&fields=fan_count', {}, function(data){
							  result = data;
							});
							return result;
						})();

<!--Page Name: NIVEA.in -->						
var nivea = (function() {
							var result;
							$.getJSON('https://graph.facebook.com/NIVEA.in?access_token=PUT_YOUR_ACCESS_TOKEN_HERE&fields=fan_count', {}, function(data){
							  result = data;
							});
							return result;
						})();

<!--Page Name: LakmeCosmetics-->						
var lakmeCosmetics = (function() {
							var result;
							$.getJSON('https://graph.facebook.com/LakmeCosmetics?access_token=PUT_YOUR_ACCESS_TOKEN_HERE&fields=fan_count', {}, function(data){
							  result = data;
							});
							return result;
						})();						

var a_garnier = JSON.stringify(garnier.fan_count);
var b_loreal = JSON.stringify(loreal.fan_count);
var c_skinElements = JSON.stringify(skinElements.fan_count);
var d_nivea = JSON.stringify(nivea.fan_count);
var e_lakmeCosmetics = JSON.stringify(lakmeCosmetics.fan_count);