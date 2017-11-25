// human-readable month name
var months_labels = ['January', 'February', 'March', 'April',
    'May', 'June', 'July', 'August', 'September',
    'October', 'November', 'December'
];

// number of days for each month
var days_in_month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

var current_Date = new Date();

var current_Year;
var current_Month;
var current_Day;

var draw_Year;
var draw_Month;

function drawCalendar() {
    document.getElementById("label-year").textContent = draw_Year;
    document.getElementById("label-month").textContent = months_labels[draw_Month];
    let monthToDisplay = new Date(draw_Year, draw_Month, 1);

    let i, index = monthToDisplay.getDay();
    for (i = 0; i < index; i++) {
        document.getElementById(i.toString()).textContent = "";
    }
    for (i = 1; i <= days_in_month[draw_Month]; i++) {
        let currentCell = document.getElementById(index.toString());
        currentCell.textContent = i;
        if (i == current_Day && draw_Month == current_Month && draw_Year == current_Year) {
            currentCell.classList.add("calendar-today");
        } else {
            currentCell.classList.remove("calendar-today");
        }
        index++;
    }
    for (; index < 42; index++) {
        document.getElementById(index.toString()).textContent = "";
    }
}

function initCalendar() {
    current_Year = current_Date.getFullYear();
    draw_Year = current_Year;
    current_Month = current_Date.getMonth();
    draw_Month = current_Month;
    current_Day = current_Date.getDate();
    drawCalendar();
}

function nextMonth() {
    draw_Month++;
    if (draw_Month > 11) {
        draw_Month = 0;
        draw_Year++;
    }
    drawCalendar();
}

function prevMonth() {
    draw_Month--;
    if (draw_Month < 0) {
        draw_Month = 11;
        draw_Year--;
    }
    drawCalendar();
}