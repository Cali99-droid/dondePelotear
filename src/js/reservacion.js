document.addEventListener("DOMContentLoaded", function () {
  moment.locale("es");
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    locale: "esLocale",
    themeSystem: "bootstrap",
    height: 650,
    nowIndicator: true,
  });

  calendar.render();

  calendar.on("dateClick", function (info) {
    //  console.log(info.date);

    console.log(
      moment(info.date, "DD MM YYYY hh:mm:ss").format(
        "dddd DD MMMM YYYY, h:mm:ss a"
      )
    );
  });
});
