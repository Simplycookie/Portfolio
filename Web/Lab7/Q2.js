let price = 0
let quantity = 0
let choice = parseFloat(prompt('Please enter your choice\n1. Nescafe\n2. Pizza\n3.Yogurt'))
if(choice<1 || choice > 3)alert('Invalid Choice. Program will terminate')
    else{
switch(choice){
    case 1:
        price = 2.30;
        quantity = parseFloat(prompt('Please enter the quantity of Nescafe'))
        break;
    case 2:
        price = 7.90;
        quantity = parseFloat(prompt('Please enter the quantity of Pizza'))
        break;
    case 3:
        price = 1.85;
        quantity = parseFloat(prompt('Please enter the quantity of Yogurt'))
        break;
}
let total = price*quantity
document.write('Bill = ',total.toFixed(2))
}

