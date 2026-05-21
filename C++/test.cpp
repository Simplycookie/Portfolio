#include<iostream>
using namespace std;
char banana[30] = "abcdefghijklmnopqrstuvwxyz";
int no_1 = 0;
int no_2 = 0;
int i = 0;
void display(){
    no_1 += i; // no_1 = no_1 + i
    no_2 -= i; // no_2 = no_2 - i
    cout<<banana[i]<<" no_1 is "<<no_1-i<<" i is "<<i<<" no_1 + i equals to "<<no_1<<endl;
    cout<<banana[i]<<" no_2 is "<<no_2+i<<" i is "<<i<<" no_2 - i equals to "<<no_2<<endl<<endl;
}

int calculate(){
    int total;
    total = no_1 + no_2;
    return total;
}

int main(){
    int totalmain;
    display();
    i = i + 1; // i = 1
    display();
    i = i + 1; // i = 2
    display();
    i++;
    display();
    no_1 = 8;
    no_2 = 3;
    totalmain = calculate();
    cout<<no_1<<" plus "<<no_2<< " equals "<<totalmain<<endl;

    cout<<"enter no_1:";
    cin>>no_1; // no_1 = 0, a is still in cin memory
    cout<<"enter words: ";
    cin>>banana;
    cout<<"enter no_2:";
    cin>>no_2;
    totalmain = calculate();
    cout<<no_1<<" plus "<<no_2<< " equals "<<totalmain<<endl;
    cout<<banana;
    return 0;

}