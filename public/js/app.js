function calculateDeadline() {
    let daysToAdd = document.getElementById('urgency').value;

    if (daysToAdd) {
        if (daysToAdd) {
            let returnDate = new Date();
            returnDate.setDate(returnDate.getDate() + parseInt(daysToAdd, 10));

            let day = returnDate.getDate();
            if (day < 10)
                day = '0' + day;
            let month = returnDate.getMonth();
            if (month < 10)
                month = '0' + month;
            let year = returnDate.getFullYear();

            document.getElementById("deadlineDate").value = day + '.' + month + '.' + year;
        }
    }
}
