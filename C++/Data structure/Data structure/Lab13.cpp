#include <iostream>
#include <cmath>
using namespace std;
int main(){
{
    char opera;
    int num1, num2;
    cout<<"Enter an operator (+,-,*,/,%,^,) : ";
    cin>>opera;
    cout<<"Enter two operands : ";
    cin>>num1>>num2;
    switch(opera){
        case '+':
            cout<<num1<<" + "<<num2<<" = "<<num1+num2;
            break;
        case '-':
            cout<<num1<<" - "<<num2<<" = "<<num1-num2;
            break;
        case '*':
            cout<<num1<<" * "<<num2<<" = "<<num1*num2;
            break;
        case '/':
            cout<<num1<<" / "<<num2<<" = "<<num1/num2;
            break;
        case '%':
            cout<<num1<<" % "<<num2<<" = "<<num1%num2;
            break;
        case '^':
            cout<<num1<<" ^ "<<num2<<" = "<<pow(num1,num2);
            break;
        default:
            cout<<"Error! operator is not correct";
            break;
    }
}}
