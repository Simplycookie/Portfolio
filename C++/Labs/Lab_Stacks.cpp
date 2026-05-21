#include <iostream>
#include <E:\cookie work\visual studio\C++\Custom packages\Stacks.cpp>

using namespace std;

int main(){
    int_stack stack(10);
    int choice;
    int val;
    cout<<"1>Push\n2>Pop\n3>Get data\n>pop add and push back\n";
    do
    {
        cout<<"\nplease choose an operation from 1-4"<<endl;
        cin>>choice;
        switch (choice)
        {
        case 1:
            cout<<"enter a number to push: ";
            cin>>val;
            stack.push(val);
            break;
        case 2:
            val = stack.pop();
            if(val != NULL){
                cout<<"The number popped was :"<<val;
            }
            break;
        case 3:
            cout<<"data list is ";
            val = stack.pop();
            while(val!=NULL){
                cout<<val<<" ";
                val = stack.pop();
            }
            cout<<"Thank you";
            break;
        case 4:
            val = stack.pop();
            if(val!=NULL){
                cout<<"Popped: "<<val<<endl;
                val += 10;
                cout<<"Pushed: "<<val<<endl;
                stack.push(val);
            }
            break;
        default:
            break;
        }
    } while (choice != 3);
    

}