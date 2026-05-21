#include<iostream>
#include<iomanip>
#include<string>
using namespace std;
class ChoreographyMarks {
    float points,total;
    public:
    ChoreographyMarks() : total(30),points(0){
    }
    void setCgPoints(){
        cout<<"Enter Choreography Marks [Max:30]\t:";
        cin>>points;
        if (points < 0) {;
            points = 0; // minimum is 0
        }
        if (points > total) {
            points = total; // maximum is 30
    }
    }
    friend class Dancer;
};

class InventiveMarks {
    float points,total;
    public:
    InventiveMarks() : total(20),points(0){
    }
    void setinvPoints(){
        cout<<"Enter Inventive Marks [Max:20]\t:";
        cin>>points;
        if (points < 0) {
            points = 0; // minimum is 0
        }
        if (points > total) {
            points = total; // maximum is 20
        }
    }
    friend class Dancer;
};
class Dancer{
    string name;
    int age;
    float finalpoints,cpoints,ipoints;
    public:
    void set_details(){
        cout<<"Enter Name\t\t\t:";
        cin>>ws;
        getline(cin, name);
        cout<<"Enter Age\t\t\t:";
        cin>>age;
    }
    void CalcFinalPoints(ChoreographyMarks c, InventiveMarks i) {
        cpoints = (c.points/c.total) * 100;
        ipoints = (i.points/i.total) * 100;
        finalpoints = (c.points + i.points) / (c.total + i.total) * 100;
    }
    int getAge(){
        return age;
    }
    string getName(){
        return name;
    }
    void displayScoreDetails(){
        cout<<":::::Score Board:::::"<<endl;
        cout<<"Choreography\t\t: "<<cpoints<<endl;
        cout<<"Inventive\t\t: "<<ipoints<<endl;
        cout<<"Final score\t\t: "<<finalpoints<<endl;
        cout<<"========================================="<<endl<<endl;
    }
};
int main(){
    int nodancers;
    cout<<"Enter number of dancers: ";
    cin>>nodancers;
    Dancer *dancer = new Dancer[nodancers];
    ChoreographyMarks cgmarks;
    InventiveMarks invmarks;
    for(int i = 0; i < nodancers; i++){
        cout<<":::::Details of Dancer:::::"<<endl;
        dancer[i].set_details();
        cgmarks.setCgPoints();
        invmarks.setinvPoints();
        dancer[i].CalcFinalPoints(cgmarks, invmarks);
        cout<<"========================================="<<endl;
        cout<<"Dancer #"<<i+1<<endl;
        cout<<"=========================================="<<endl;
        cout<<"Name\t\t\t= "<<dancer[i].getName()<<endl;
        cout<<"Age\t\t\t= "<<dancer[i].getAge()<<endl<<endl;
        dancer[i].displayScoreDetails();
    }
    delete[] dancer; 
}    