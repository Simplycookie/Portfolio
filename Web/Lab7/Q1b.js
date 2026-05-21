let count = 0
let total = 0
do{
let Base1 = parseFloat(prompt('Please enter the value of base 1 :'))
let Base2 = parseFloat(prompt('Please enter the value of base 2 :'))
let height = parseFloat(prompt('Please enter the value of height :'))
let area = 0.5*height*(Base1+Base2)
count++
total += area
document.write('The area of the trapezoid',count,'is ',area.toFixed(2),'cm^2<br>')
} while(confirm('continue'))

document.write('<br>The total area for ',count,'trapezoids is',total.toFixed(2),'cm^2')
