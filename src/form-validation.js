const yearSelector = document.getElementById("year");
const monthSelector = document.getElementById("month");
const daySelector = document.getElementById("day");

const validateDate = (function () {
  let nCurrentYear = +yearSelector.value;
  let nCurrentMonth = +monthSelector.value;
  let nCurrentDay = +daySelector.value;
  let maxDay;

  switch (nCurrentMonth) {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
      maxDay = 31;
      break;
    case 4:
    case 6:
    case 9:
    case 11:
      maxDay = 30;
      break;
    case 2:
      if (nCurrentYear % 4 == 0 && nCurrentYear % 100 || nCurrentYear % 400 == 0)
        maxDay = 29;
      else
        maxDay = 28;
      break;
  }

  for (let i = 2024; i >= 1900; i--) {
    let option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    if (i == nCurrentYear) option.selected = true;
    yearSelector.append(option);
  }

  daySelector.length = 0;

  for (let i = 1; i <= maxDay; i++) {
    let option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    if (i == nCurrentDay) option.selected = true;
    daySelector.append(option);
  }
});

yearSelector.addEventListener("change", validateDate);
monthSelector.addEventListener("change", validateDate);
validateDate();