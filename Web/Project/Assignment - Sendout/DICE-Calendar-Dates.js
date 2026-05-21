// The Month and Category
const calendarTitle = document.getElementById("calendar_title");
const today = new Date();
const month = today.getMonth();
const year = today.getFullYear();

function getMonthYear(month, year)
{
    const months = [
        "January","February","March","April","May","June",
        "July","August","September","October","November","December"
    ];
    return months[month] + " " + year;
}

// Default header
calendarTitle.textContent = getMonthYear(month, year);

// Nav links
const navLinks = document.querySelectorAll(".cal_nav a");
navLinks.forEach(link => 
{
    link.addEventListener("click", e => 
    {
    e.preventDefault();
    const eventName = link.textContent.trim();
    calendarTitle.textContent = getMonthYear(month, year) + " | " + eventName;
    });
});

// Dates generation
const calendarBody = document.getElementById("calendar_dates");
const daysInMonth = new Date(year, month + 1, 0).getDate();

let firstDay = new Date(year, month, 1).getDay();
firstDay = firstDay === 0 ? 7 : firstDay; // Monday = 1

let date = 1;

for (let i = 0; i < 6; i++) 
{
    const row = document.createElement("tr");

    for (let j = 1; j <= 7; j++)
        {
            const cell = document.createElement("td");

            if (i === 0 && j < firstDay)
            {
                cell.classList.add("calendar_dis");
                cell.innerHTML = " ";
            } 
            else if (date > daysInMonth) 
            {
                cell.classList.add("calendar_dis");
                cell.innerHTML = "";
            }
            else 
            {
                cell.innerHTML = date;
                if (date === today.getDate()) {
                    cell.classList.add("today");
                }
                date++;
            }

            row.appendChild(cell);
        }

    calendarBody.appendChild(row);
}
