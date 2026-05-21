#include<iostream>
#include<string>
#include<iomanip>
using namespace std;
class Marks{
    double point;
    public:
    Marks(){
        point == 0.00;
        cout<<"default"<<endl;
    }
    Marks(double p){
        point  = p;
        cout<<p<<" was set"<<endl;
    }
    void setpoint(double p){
        point = p;
    }
    double getPoint(){return point;}
};

int main(){
    Marks m[3] = {,20.31,10.42};
}