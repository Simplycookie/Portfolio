#include<iostream>
#include<cmath>
using namespace std;

int add(int, int, int*);
int main(){
    int num1,num2,total;
    cout<<"enter two numbers: ";
    cin>>num1;
    cin>>num2;
    add(num1,num2,&total);
    cout<<"The answer is "<<total;
    return 0;
}

int add(int x, int y, int *total){
    if (x != y){*total = x + y;}
    else{
        *total = (x+y)*2;
        cout<<"Answer doubled ";
    }
    return 0;
}
