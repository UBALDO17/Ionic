function triggerMode(){
    document.getElementById(name)
    const num1 = parseFloat(document.getElementById('num1').value)
    const num2 = parseFloat(document.getElementById('num2').value)
    const result = num1 + num2
    const result2 = num1 - num2
    const result3 = num1 * num2
    const result4 = num1 / num2
    document.getElementById('name').textContent = Name

}