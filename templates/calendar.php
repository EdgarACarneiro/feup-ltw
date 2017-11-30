<aside class="sidebar-calendar">
        <section class="calendar-widget">
            <div class="header">
                <i class="fa fa-angle-left" aria-hidden="true" id="prev" onclick="prevMonth()"></i>
                <div>
                    <p class="year" id="label-year">2017</p>
                    <p class="month" id="label-month">November</p>
                </div>
                <i class="fa fa-angle-right" aria-hidden="true" id="next" onclick="nextMonth()"></i>
            </div>
            <table id="cal-frame">
                <tr id="days-of-week">
                    <th>SUN</th>
                    <th>MON</th>
                    <th>TUE</th>
                    <th>WED</th>
                    <th>THU</th>
                    <th>FRI</th>
                    <th>SAT</th>
                </tr>
                <tr id="row-1">
                    <td>
                        <p id="0"></p>
                    </td>
                    <td>
                        <p id="1"></p>
                    </td>
                    <td>
                        <p id="2"></p>
                    </td>
                    <td>
                        <p id="3"></p>
                    </td>
                    <td>
                        <p id="4"></p>
                    </td>
                    <td>
                        <p id="5"></p>
                    </td>
                    <td>
                        <p id="6"></p>
                    </td>
                </tr>
                <tr id="row-2">
                    <td>
                        <p id="7"></p>
                    </td>
                    <td>
                        <p id="8"></p>
                    </td>
                    <td>
                        <p id="9"></p>
                    </td>
                    <td>
                        <p id="10"></p>
                    </td>
                    <td>
                        <p id="11"></p>
                    </td>
                    <td>
                        <p id="12"></p>
                    </td>
                    <td>
                        <p id="13"></p>
                    </td>
                </tr>
                <tr id="row-3">
                    <td>
                        <p id="14"></p>
                    </td>
                    <td>
                        <p id="15"></p>
                    </td>
                    <td>
                        <p id="16"></p>
                    </td>
                    <td>
                        <p id="17"></p>
                    </td>
                    <td>
                        <p id="18"></p>
                    </td>
                    <td>
                        <p id="19"></p>
                    </td>
                    <td>
                        <p id="20"></p>
                    </td>
                </tr>
                <tr id="row-4">
                    <td>
                        <p id="21"></p>
                    </td>
                    <td>
                        <p id="22"></p>
                    </td>
                    <td>
                        <p id="23"></p>
                    </td>
                    <td>
                        <p id="24"></p>
                    </td>
                    <td>
                        <p id="25"></p>
                    </td>
                    <td>
                        <p id="26"></p>
                    </td>
                    <td>
                        <p id="27"></p>
                    </td>
                </tr>
                <tr id="row-5">
                    <td>
                        <p id="28"></p>
                    </td>
                    <td>
                        <p id="29"></p>
                    </td>
                    <td>
                        <p id="30"></p>
                    </td>
                    <td>
                        <p id="31"></p>
                    </td>
                    <td>
                        <p id="32"></p>
                    </td>
                    <td>
                        <p id="33"></p>
                    </td>
                    <td>
                        <p id="34"></p>
                    </td>
                </tr>
                <tr id="row-6">
                    <td>
                        <p id="35"></p>
                    </td>
                    <td>
                        <p id="36"></p>
                    </td>
                    <td></td>
                    <td>
                        <i class="fa fa-angle-up" aria-hidden="true" id="minimize" onclick="minimizeCalendar()"></i>
                        <i class="fa fa-angle-down" aria-hidden="true" id="maximize" onclick="maximizeCalendar()" style="display: none;"></i>
                    </td>
                </tr>
            </table>
        </section>
        <section id="next-tasks">
            <h2>NEXTS TASKS</h2>
            <ul class="next-tasks">
                <?php include_once('list_next_tasks.php'); ?>
            </ul>
        </section>
    </aside>
