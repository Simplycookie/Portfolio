#include <iostream>
using namespace std;

struct employee {
    string name;
    float salary;
};

void setEmployee(employee* emp,int ind){
    cout<<"Employee "<<ind+1<<endl;
    cout<<"\tEnter Name: ";
    cin>>emp[ind].name;
    cout<<"\tEnter Salary: ";
    cin>>emp[ind].salary;
    cout<<endl;
}
int main(){
    employee* emp = new employee[1];
    int numberOfEmployees;
    cout << "Enter number of employees: ";
    cin >> numberOfEmployees;
    emp = new employee[numberOfEmployees];
    for(int i =0; i<numberOfEmployees; i++){
        setEmployee(emp,i);
    }
}