#include <iostream>
using namespace std;

class Strawberry {
    string selection;
    double price;
    public:
    void dispStrawberrySelection() {
        cout<<"[1]Strawberry & Nutella Crepe\t Price: RM10.00"<<endl;
        cout<<"[2]Strawberry & Chocolate Crepe\t Price: RM12.00"<<endl;
        cout<<"[3]Strawberry Waffle with custard\t Price: RM13.40"<<endl;
        cout<<"[4]Strawberry Smoothie\t\t Price: RM10.00"<<endl;
        cout<<"[5]Strawberry & Country Cream\t Price: RM13.00"<<endl;
    }

    void purchase() {
        selection = getSelection();
        switch(selection) {
            case "1":
            case "Strawberry & Nutella Crepe":
            case "[1]Strawberry & Nutella Crepe":
                price = 10.00;
                break;
            case "2":
            case "Strawberry & Chocolate Crepe":
            case "[2]Strawberry & Chocolate Crepe":
                price = 12.00;
                break;
            case "3":
            case "Strawberry Waffle with custard":
            case "[3]Strawberry Waffle with custard":
                price = 13.40;
                break;
            case "4":
            case "Strawberry Smoothie":
            case "[4]Strawberry Smoothie":
                price = 10.00;
                break;
            case "5":
            case "Strawberry & Country Cream":
            case "[5]Strawberry & Country Cream":
                price = 13.00;
                break;
            default:
                cout<<"Not Availible"<<endl;
                return purchase()
        }
    }
    string getSelection() {
        cout<<"Enter your selection: ";
        cin>>selection;
        return selection;
    }
    double getPrice() {
        return price;
    }

    double getorder(){
        dispStrawberrySelection();
        purchase();
        return getPrice();
    }
}
int main() {
    

    return 0;
}