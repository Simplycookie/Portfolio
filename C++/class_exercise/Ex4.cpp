#include<iostream>
using namespace std;
int main(){
    int numArray[10];
    int Totalof3s5s = 0;
    cout<<"Enter 10 numbers:\n";
    for(int i = 0;i<10;i++){
        cin>>numArray[i];
        if(numArray[i]%3==0 || numArray[i]%5==0){
            Totalof3s5s += numArray[i];
        }
    }
    cout<<"Total: "<<Totalof3s5s;
}