var d = new Date();
var getTot = daysInMonth(d.getMonth(),d.getFullYear()); //Get total days in a month
var sat = new Array();   //Declaring array for inserting Saturdays
var sun = new Array();   //Declaring array for inserting Sundays

for(var i=1;i<=getTot;i++){    //looping through days in month
    var newDate = new Date(d.getFullYear(),d.getMonth(),i)
    if(newDate.getDay()==0){   //if Sunday
        sun.push(i);
    }
    if(newDate.getDay()==6){   //if Saturday
        sat.push(i);
    }

}
console.log(sat);
console.log(sun);


function daysInMonth(month,year) {
    return new Date(year, month, 0).getDate();
}