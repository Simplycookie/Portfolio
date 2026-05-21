let weight = 0
let Rate = 0
let payout = 0
let total = 0
let Pax = 0
while(confirm('do you have any material to recycle')){
    weight = parseFloat(prompt('Enter the weight in KG of your materials :'))
    if(weight<1)alert('invalid weight, this response will be unrecorded')
    else{
        if(weight>30){
            Rate = 0.30
        }
        else if(weight>=20){
            Rate = 0.25
        }
        else if(weight>=10){
            Rate = 0.20
        }
        else{
            Rate = 0.15
        }
    }
    payout = Rate*weight
    total += payout
    Pax++
    document.write('<br>Customer : ',Pax)
    document.write('<br>Weight : ',weight,'kg')
    document.write('<br>Rate : RM',Rate.toFixed(2))
    document.write('<br>Payout : Rm ',payout.toFixed(2),'<br>')
}
document.write('<br>Total Customer : ',Pax)
document.write('<br>Overall Payout : RM ',total)