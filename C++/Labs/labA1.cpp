
#include <iostream> 
using namespace std; 
int main () 
{   int subject, num; 
    float total_payment, average_payment;  
    float *fees;    
     
    cout<<"How many subjects you have registered: ";
    cin>>subject;
     
    fees= new float[subject];   
    for (num=0; num<subject; num++){
        cout<<"Class "<<num+1<<" fees charge: RM ";
        cin>>fees[num];
    }
    cout<<"=====PAYMENT DETAILS=====\n";
    cout<<"Fees charges you have entered: ";
    for (num=0; num<subject; num++){
        cout<<fees[num]<<"(RM)... ";
        total_payment += fees[num];
    }
    cout<<endl;
    average_payment = total_payment / subject;
    cout<<"Total payment to be made: RM "<<total_payment<<endl;
    cout<<"Minimum payment (Average pf total payment): RM "<<average_payment<<endl;
    delete[] fees; // Free the allocated memory
    
    return 0;      
} 