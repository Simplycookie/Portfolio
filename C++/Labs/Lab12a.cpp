#include <iostream>
#include <iomanip>
using namespace std;

int main(){
    int hours;
    float pay;
    cout<<fixed<<setprecision(2);
    cout<<"Please enter total hours you've worked this week:";
    cin>>hours;
    if(hours < 40)pay = 18.50*hours;
    else{pay = 18.50*40 + 24.35*(hours-40);}
    cout<<"wages for this week are RM"<<pay;
}