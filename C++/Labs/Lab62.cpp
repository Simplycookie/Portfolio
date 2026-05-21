#include <iostream>
using namespace std;

class employee_details{
    string names;
    int idNumber;
    string department;
    string position;
    public:
    employee_details(string n, int id, string d, string p){
        names = n;
        idNumber = id;
        department = d;
        position = p;
    }
    employee_details(string n, int id){
        names = n;
        idNumber = id;
        department = "";
        position = "";
    }
    employee_details(){
        names = "";
        idNumber = 0;
        department = "";
        position = "";
    }
    void setName(string n){
        names = n;
    }
    void setId(int id){
        idNumber = id;
    }
    void setDepartment(string d){
        department = d;
    }
    void setPosition(string p){
        position = p;
    }
    string getName(){
        return names;
    }
    int getId(){
        return idNumber;
    }
    string getDepartment(){
        return department;
    }
    string getPosition(){
        return position;
    }
    void display(){
        cout<<"Name: "<<names <<endl;
        cout<<"ID Number: "<<idNumber<<endl;
        cout<<"Department: "<<department<<endl;
        cout<<"Position: "<<position <<endl<<endl;
    }

}; 
int main() {
    employee_details emp1("Susan Meyers",47999,"Accounting","Vice President");
    employee_details emp2("Mark Jones",39119);
    emp2.setDepartment("IT");
    emp2.setPosition("Programmer");
    employee_details emp3;
    emp3.setName("Joy Rogers");
    emp3.setId(81774);
    emp3.setDepartment("Manufacturing");
    emp3.setPosition("Engineer");
    emp1.display();
    emp2.display();
    emp3.display();
    return 0;
}