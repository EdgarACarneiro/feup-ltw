// human-readable month name
let months_labels = ['January', 'February', 'March', 'April',
    'May', 'June', 'July', 'August', 'September',
    'October', 'November', 'December'
];

// number of days for each month
let days_in_month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

let current_Date = new Date();

let current_Year;
let current_Month;
let current_Day;

let draw_Year;
let draw_Month;

let active_row_id;

function updateLeapYear() {
    if (draw_Year % 4 == 0 && draw_Month == 1) {
        days_in_month[draw_Month] = 29;
    } else if (draw_Month == 1) {
        days_in_month[draw_Month] = 28;
    }
}

function drawCalendar() {
    document.getElementById("label-year").textContent = draw_Year;
    document.getElementById("label-month").textContent = months_labels[draw_Month];

    let i, index = (new Date(draw_Year, draw_Month, 1)).getDay();
    for (i = 0; i < index; i++) {
        document.getElementById(i.toString()).textContent = "";
    }
    for (i = 1; i <= days_in_month[draw_Month]; i++) {
        let currentCell = document.getElementById(index.toString());
        currentCell.textContent = i;

        addTaskNotification(currentCell, i);
        updateTodayState(currentCell, i);
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
    readNextTasks();
    drawCalendar();
}

function nextMonth() {
    draw_Month++;
    if (draw_Month > 11) {
        draw_Month = 0;
        draw_Year++;
    }
    updateLeapYear();
    drawCalendar();
}

function prevMonth() {
    draw_Month--;
    if (draw_Month < 0) {
        draw_Month = 11;
        draw_Year--;
    }
    updateLeapYear();
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

function updateTodayState(currentCell, day) {
    if (day == current_Day && draw_Month == current_Month && draw_Year == current_Year) {
        currentCell.classList.add("calendar-today");
        active_row_id = currentCell.parentElement.parentElement.id;
    } else {
        currentCell.classList.remove("calendar-today");
    }
}

var nextTasksMap = new Map();

function readNextTasks() {
    let nextTasks = document.getElementById('next-tasks').lastElementChild;
    Array.from(nextTasks.children).forEach(function(element) {
        nextTasksMap.set(element.children[0].children[0].innerText, element.children[1].className);
    });
}

function getDateKey(day) {
    let date;
    let dayString = day.toString();
    let monthString = (draw_Month + 1).toString();
    if (day < 10) {
        dayString = "0" + day.toString();
    }
    if (draw_Month < 9) {
        monthString = "0" + (draw_Month + 1).toString();
    }
    date = draw_Year.toString() + "-" + monthString + "-" + dayString;
    return date;
}

function addTaskNotification(currentCell, day) {
    if (nextTasksMap.has(getDateKey(day))) {
        if (currentCell.parentElement.childElementCount == 1) {
            let circle = document.createElement("i");
            circle.classList.add("fa");
            circle.classList.add("fa-circle");
            circle.classList.add(nextTasksMap.get(getDateKey(day)));
            currentCell.parentElement.appendChild(circle);
        } else {
            currentCell.parentElement.lastChild.classList.remove(currentCell.parentElement.lastChild.classList.item(2));
            currentCell.parentElement.lastChild.classList.add(nextTasksMap.get(getDateKey(day)));
        }
    } else if (currentCell.parentElement.childElementCount > 1) {
        currentCell.parentElement.removeChild(currentCell.parentElement.lastChild);
    }
}