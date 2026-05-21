let Pax = 0
let price = 0
let realprice = 0
let Discount = 0
let gift = ''
let coursename = ''
let course = prompt('COURSES OFFERED\nA. Windows Azure (RM 1250.00 per pax)\nB. Jquary for Beginners(RM 990.00 per pax)\nC. Advanced PHP and MySQL (RM 2150.00 per pax\n\nEnter the COURSE CODE')
if(course!='A'&&course!='B'&&course!='C')alert('You have entered an INVALID Course Code. Program will be terminated.. ..')
    else{
        Pax = parseFloat(prompt('Enter number of participants :'))
        if(Pax<1)alert('Invalid number of participants, program will terminate')
        else {
        if(Pax > 20){
            Discount = 0.15
            gift = 'Kingston 16GB Thumbdrive'
        }
        else if(Pax > 10){
            Discount = 0.10
            gift = 'Coffee Mug'
        }
        else {
            Discount = 0
            gift = 'None'
        }
        
        switch(course){
            case 'A':
                coursename = "Windows Azure";
                price = 1250.00
                break;
            case 'B':
                coursename = "Jquary for Beginners";
                price = 990.00
                break;
            case 'C':
                coursename = "Advanced PHP and MySQL";
                price = 2150.00
                break;
        }
        document.write('Course name : ',coursename,'<br>')
        document.write('Course price : RM ',price,'<br>')
        document.write('Participants : ',Pax,'<br>')
        document.write('Discount : RM ',price*(1-Discount),' (',Discount*100,'%)<br>')
        document.write('Gift : ',gift,'<br>')
        realprice = price * (1-Discount) * Pax
        document.write('Total payment : RM ',realprice)
    }}