#include <iostream>
#include<iomanip> 
using namespace std; 
class IceCream 
{ 
    private: 
        string flavour; 
        int number; 
        float price; 
    public: 
        void menu(); 
        void setflavour(); 
        void setHowMany(); 
        friend void display_receipt(IceCream &ic); 
        IceCream();
}; 
void IceCream::menu(){

    cout<<"==========================================="<<endl;
    cout<<"=== CHOOSE FLAVOUR       ==="<<endl;
    cout<<"==========================================="<<endl<<endl;
    cout<<"[1] === Strawberry Flavour RM 3.50"<<endl;
    cout<<"[2] === Chocolate Flavour RM 2.50"<<endl;
    cout<<"[3] === Vanilla Flavour RM 1.50"<<endl;
    cout<<"[4] === Durian Flavour RM 0.50"<<endl<<endl;
}
void IceCream::setflavour(){
    do{
        cout<<"Flavour of choice: ";
        cin>>number;
        if(number<1 || number>4){
            cout<<"NOT A FLAVOUR OF CHOICE! do better"<<endl;
        }
    }while(number<1 || number>4);
    switch(number){
        case 1:
            flavour = "Strawberry";
            price = 3.50;
            break;
        case 2:
            flavour = "Chocolate";
            price = 2.50;
            break;
        case 3:
            flavour = "Vanilla";
            price = 1.50;
            break;
        case 4:
            flavour = "Durian";
            price = 0.50;
            break;
    }
}
void IceCream::setHowMany(){
    cout<<"How many : ";
    cin>>number;
    if (number<2){
        cout<<"thank you for you cheapchange"<<endl;
    }
    else if (number>2 && number<5){
        cout<<"thank you for your order"<<endl;
    }
    else{
        cout<<"thank you for your patronage"<<endl;
    }
}
IceCream::IceCream(){
    cout<<"BARNEY'S HOUSE OF ICE<<end"<<endl<<endl;
}

void display_receipt(IceCream &ic){
    cout<<"==========================================="<<endl;
    cout<<"===      PAYMENT      ==="<<endl;
    cout<<"==========================================="<<endl<<endl;
    cout<<"Flavour\t\t: "<<ic.flavour<<endl;
    cout<<"Total Proce\t: RM "<<ic.price*ic.number<<endl;
}

int main(){
    IceCream ic;
    ic.menu();
    ic.setflavour();
    ic.setHowMany();
    display_receipt(ic);
    return 0;
}
    