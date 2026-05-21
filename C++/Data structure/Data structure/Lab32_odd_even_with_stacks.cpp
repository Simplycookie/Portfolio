#include <iostream>
#include <E:\cookie work\visual studio\C++\Data structure\Data structure\Stacks.cpp>
using namespace std;

int main(){
    int_stack numbers(10);
    int num,odds=0,evens=0;
    cout<<"Key in 10 numbers :";
    for(int i=0;i<10;i++){
        cin>>num;
        numbers.push(num);
    }
    cout<<"in reverse order, The numbers you entered are : ";
    for(int i=0;i<10;i++){
        num = numbers.pop();
        cout<<num<<" ";
        if(num % 2 == 0) evens++;
        else odds++;
    }
    cout<<endl;
    cout<<"There are "<<evens<<" even numbers and "<<odds<<" odd numbers."<<endl;
}