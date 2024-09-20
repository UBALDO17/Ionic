function triggerMode(){
    let distance = parseFloat(document.getElementById('distance').value)
    let rate = parseFloat(document.getElementById('rate').value)
    let tax = parseFloat(document.getElementById('tax').value)
    
    let fare = distance * rate
    let taxAmount = (tax/100) * fare
    let result = fare + taxAmount
    document.getElementById('res').textContent = result
}