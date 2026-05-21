#include <iostream>
using namespace std;

void addrecord(struct employee* records, int& size){
    cout<<"Enter first name: ";
    cin>>records[size].firstname;
    cout<<"Enter last name: ";
    cin>>records[size].lastname;
    cout<<"Enter employee number: ";
    cin>>records[size].emp_Num;
    cout<<"Enter age: ";
    cin>>records[size].age;
    size++;
}

void displayrecord(struct employee* records, int size){
    
}
struct employee{
    string firstname, lastname, emp_Num;
    int age;
}
int main(){
{
    struct* record = new employee[1];
    int size = 0;
    int operation;
    while (operation != -1){
        cout<<"Enter operation number\n";
        cout<<"(1) Add employee record\n";
        cout<<"(2) Display employee records\n";
        cout<<"(-1) Exit\n";
        cout<<"Enter operation : ";
        if(operation != -1){
            cin>>operation;
            switch(operation){
                case 1:
            }
        }
}
}