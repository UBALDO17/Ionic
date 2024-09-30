function triggerMode(){
    const num1 = parseFloat(document.getElementById('num1').value)
    const result = num1*(9/5)+32
    document.getElementById('res').textContent = result + ' Fahrenheit'
}