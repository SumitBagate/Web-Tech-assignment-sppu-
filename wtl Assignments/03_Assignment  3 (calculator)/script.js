let display = document.getElementById('display');

function appendNumber(num) {
    display.value += num;
}

function appendOperator(op) {
    display.value += op;
}

function clearDisplay() {
    display.value = '';
}

function calculate() {
    try {
        if (display.value === '') {
            alert("Enter a value first!");
            return;
        }
        display.value = eval(display.value);
    } catch {
        alert("Invalid Expression!");
        display.value = '';
    }
}
