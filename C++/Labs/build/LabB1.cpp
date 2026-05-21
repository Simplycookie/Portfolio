#include<iostream>
#include<cmath>
using namespace std;
class triangle{
    protected: int a,b,c;
    public:
    triangle(){
        cout<<"--------  Triangle Class   -------"<<endl;
    }
    void set_data(int A,int B){
        a = A;
        b = B;
    }

};

class PythagorasTriangle : public triangle{
    public:
    PythagorasTriangle(){
        cout<<"-------Pythogoras Triangle -------"<<endl;
    }
    void calcHypotenuse(){
        c = sqrt((pow(a,2)+pow(b,2)));
    }
    void display_slides(){
        cout<<"The sides of the two sides are "<<a<<" "<<b<<endl;
        cout<<"the hypotenuse is "<<c<<endl;
    }
};

int main(){
    PythagorasTriangle item_1;
    int A,B;
    cout<<"Enter A: ";
    cin>>A;
    cout<<"Enter B: ";
    cin>>B;
    item_1.set_data(A,B);
    item_1.calcHypotenuse();
    item_1.display_slides();
}