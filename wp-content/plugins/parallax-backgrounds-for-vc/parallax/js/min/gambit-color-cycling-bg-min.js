document.addEventListener("DOMContentLoaded",function(){var t=document.querySelectorAll(".gambit_colorcycle");Array.prototype.forEach.call(t,function(t,e){var a=document.gambitFindElementParentRow(t);a.classList.add(t.getAttribute("data-animclass"))})});