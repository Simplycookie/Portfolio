#include<iostream>
#include<iomanip>
using namespace std;
struct Rental{
    char name[30];
    float rent;
    int month;
};

double report(struct Rental R[3]){
    double grand_total = 0;
    cout<<"----------------------------------------------------"<<endl;
    cout<<"-          AMOUNT DUE MORE THAN RM1000.00          -"<<endl;
    cout<<"----------------------------------------------------"<<endl;
    for(int i = 0;i < 3;i++){
        if(R[i].rent*R[i].month > 1000){
        cout<<"Tenant name\t: "<<R[i].name<<endl;
        cout<<"Monthly rental\t: "<<R[i].rent<<endl;
        cout<<"Unpaid months\t: "<<R[i].month<<endl;
        cout<<"Unpaid amount\t: "<<R[i].rent*R[i].month<<endl<<endl;
        grand_total += R[i].rent*R[i].month;
        }
    }
    return grand_total;
}

int main(){
    struct Rental R[3] = {{"Megan", 300, 4},{"Johnson", 250, 1}, {"David", 790, 2}};
    double grand_total = report(R);
    cout<<"Total rental to be collected : "<<grand_total;
}