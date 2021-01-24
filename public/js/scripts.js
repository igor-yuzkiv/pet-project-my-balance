function alertError (errorMessage) {
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        html: errorMessage,
        showConfirmButton: false,
        timer: 3000
    })
}

function showDataPicker(fieldId) {

    const datePickerLocaleOptions = {
        format: "Y-MM-DD",
        applyLabel: "Підтвердити",
        cancelLabel: "Відмінити",
        monthNames: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
        daysOfWeek: ['Нд', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт','Сб'],
        firstDay: 1
    };

    let options = {
        singleDatePicker: true,
        showDropdowns: true,
        timePicker: true,
        timePicker24Hour: true,
        timePickerIncrement: 30,
        locale:datePickerLocaleOptions,
    };

    return $(fieldId).daterangepicker(options);
}
