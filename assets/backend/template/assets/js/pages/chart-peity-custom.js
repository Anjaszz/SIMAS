'use strict';$(document).ready(function(){setTimeout(function(){var updatingChart=$(".updating-chart").peity("line",{fill:"rgba(240, 70, 107, 0.4)",stroke:"rgb(240, 70, 107)"});setInterval(function(){var random=Math.round(Math.random()*10)
var values=updatingChart.text().split(",")
values.shift()
values.push(random)
updatingChart.text(values.join(",")).change()},1000);$(document).ready(function(){var updatingChart1=$(".updating-chart1").peity("line",{fill:"rgba(51, 219, 158, 0.32)",stroke:"rgba(51, 219, 158, 0.90)"});});var updatingChart2=$(".updating-chart2").peity("line",{fill:"rgba(79, 195, 247, 0.45)",stroke:"rgba(79, 195, 247, 0.91)"});var updatingChart3=$(".updating-chart3").peity("line",{fill:"rgba(255, 138, 101, 0.39)",stroke:"rgba(255, 138, 101, 0.94)"});$(".bar-colours-1").peity("bar",{fill:["rgba(79, 195, 247, 0.65)","rgba(51, 219, 158, 0.65)"]});$(".bar-colours-2").peity("bar",{fill:["rgba(79, 195, 247, 0.65)","rgba(240, 70, 107, 0.65)"]});$(".data-attributes span").peity("donut");$("span.pie_1").peity("pie",{fill:["#f44336","#b59410"]});$("span.pie_2").peity("pie",{fill:["#FF9800","#4caf50"]});$("span.pie_3").peity("pie",{fill:["#b59410","#7759de"]});$("span.pie_4").peity("pie",{fill:["#4caf50","#f44336"]});$("span.pie_5").peity("pie",{fill:["#FF9800","#b59410"]});$("span.pie_6").peity("pie",{fill:["#f44336","#7759de"]});$("span.pie_7").peity("pie",{fill:["#4caf50","#FF9800"]});$("span.pie_1").peity("pie",{fill:["#f44336","#b59410"]});$("span.pie_2").peity("pie",{fill:["#FF9800","#4caf50"]});$("span.pie_3").peity("pie",{fill:["#b59410","#7759de"]});$("span.pie_4").peity("pie",{fill:["#4caf50","#f44336"]});$("span.pie_5").peity("pie",{fill:["#FF9800","#b59410"]});$("span.pie_6").peity("pie",{fill:["#f44336","#7759de"]});$("span.pie_7").peity("pie",{fill:["#4caf50","#FF9800"]});},700);});