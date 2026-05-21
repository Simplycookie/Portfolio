#include<iostream>
#include<iomanip>
#include<cmath>
using namespace std;
double bb_4ac();
void get_a_b_c(double&,double&,double&);
int main(){
    double discriminant = bb_4ac();
    cout<<"The discriminant is "<<discriminant;
}

double bb_4ac()  
{  
    double a, b, c;  // Coefficients of a quadratic equation  
    get_a_b_c(a, b, c); 
    return b*b - 4*a*c;  
} 

void get_a_b_c(double &a,double &b,double &c){
    cout<<"Enter a, b and c: ";
    cin>>a>>b>>c;
}