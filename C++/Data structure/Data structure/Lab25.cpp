#include <iostream>
using namespace std;

int main () 
{  
    int i,n; 
    float sum, avg; 
    float *p; 
    cout<<"Enter number of marks : ";
    cin>>i;
    p = new float [i]; 
    for(n=0; n<i; n++){
        cout<<"Enter mark "<<n+1<<" : ";
        cin>>p[n];
    }
    cout<<"You have entered ";
    for(n=0; n<i; n++){
        cout<<p[n]<<" ";
        sum += p[n];
    }
    avg = sum / i;
    cout<<"\nSum of marks is : "<<sum;
    cout<<"\nAverage of marks is : "<<avg;
    
    
    return 0; 
}