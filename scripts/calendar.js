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

var active_row_id;

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
            active_row_id = currentCell.parentElement.parentElement.id;
        } else {
            currentCell.classList.remove("calendar-today");
        }
        index++;
    }
    for (; index < 37; index++) {
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

function minimizeCalendar() {
    let current_row;
    for (let i = 1; i < 6; i++) {
        current_row = document.getElementById("cal-frame").children[0].children[i];
        if (current_row.id != active_row_id) {
            current_row.style.display = "none";
        }
    }
    current_row = document.getElementById("cal-frame").children[0].children[6];
    if (current_row.id != active_row_id) {
        current_row.children[0].children[0].style.display = "none";
        current_row.children[1].children[0].style.display = "none";
    }
    document.getElementById("minimize").style.display = "node";
    document.getElementById("maximize").style.display = "inline-block";
}

function maximizeCalendar() {
    let current_row;
    for (let i = 1; i < 6; i++) {
        current_row = document.getElementById("cal-frame").children[0].children[i];
        current_row.style.display = "";
    }
    current_row = document.getElementById("cal-frame").children[0].children[6];
    if (current_row.id != active_row_id) {
        current_row.children[0].children[0].style.display = "";
        current_row.children[1].children[0].style.display = "";
    }
    document.getElementById("minimize").style.visibility = "inline-block";
    document.getElementById("maximize").style.visibility = "node";
}