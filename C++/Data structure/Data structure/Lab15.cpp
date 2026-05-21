#include <iostream>
using namespace std;
int main(){
{
    int grade;
    int gradetotal = 0;
    int average;
    int i=0;
    while(grade != -1){
        cout<<"Enter mark(-1 to exit): ";
        cin.clear()
        cin>>grade;
        if(grade != -1){
        gradetotal += grade;
        i++;
    }
    }
    average = gradetotal / i;
    cout<<"Average mark is : "<<average;
}
}