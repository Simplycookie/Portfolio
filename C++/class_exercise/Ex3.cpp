#include<iostream>
#include<cmath>
using namespace std;
void oddorevenpower(int&);
int main(){
    int num1,num2,largenum;
    cout<<"Enter num1: ";
    cin>>num1;
    cout<<"Enter num2: ";
    cin>>num2;
    if (num1 >= num2){largenum = num1;}
    else{largenum = num2;}
    oddorevenpower(largenum);
    cout<<largenum;
    return 0;
}

void oddorevenpower(int &Num){
    int remainder = Num%2;
    switch (remainder)
    {
    case 0:
        Num = pow(Num,2);
        break;
    case 1:
    case -1:
        Num = pow(Num,3);
        break;
    default:
        break;
    }
}