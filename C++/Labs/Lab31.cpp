#include<iostream>
#include<iomanip>
using namespace std;

class TravelPackage
{
    public:
    char package;
    int noAdult, noChild;
    float adultPrice, childPrice, discount, totalPrice;
    float calc_totalprice(){
        totalPrice = adultPrice*noAdult + childPrice*noChild;
        if (totalPrice>3000){totalPrice=totalPrice*discount;}
        return totalPrice;
    }
};

int main(){
    TravelPackage TrPack;
    TrPack.discount = 0.8;
    do
    {
        cout<<"Select travel package<A,B,C> :"<<fixed<<setprecision(2);
        cin>>TrPack.package;
        switch (TrPack.package)
        {
        case 'A':
            TrPack.adultPrice = 1000;
            TrPack.childPrice = 500;
            break;
        case 'B':
            TrPack.adultPrice = 800;
            TrPack.childPrice = 600;
            break;
        case 'C':
            TrPack.adultPrice = 500;
            TrPack.childPrice = 300;
            break;
        
        default:
            cout<<"Invalid selection\n\n";
            break;
        } 
    }while (TrPack.package!='A'&&TrPack.package!='B'&&TrPack.package!='C');

    cout<<"Enter no of adult :";
    cin>>TrPack.noAdult;
    cout<<"Enter no of children :";
    cin>>TrPack.noChild;
    cout<<"\nTotal price : "<<TrPack.calc_totalprice();

}  