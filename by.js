function triggerMode(){
    const num1 = parseFloat(document.getElementById('num1').value)
    const result = 2024 - num1 
    document.getElementById('res').textContent = 'You are: ' + result + ' years old'
}