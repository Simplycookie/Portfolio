#include<iostream>
using namespace std;

class Cuboid
{
private:
    int length, width, height, volume;
public:
    void set_date(int L, int W, int H){
        length = L;
        width = W;
        height = H;
    }
    void find_valume(){
        volume = length*width*height;
    }
    void display(){
        cout<<"------Display Cuboid Data------"<<endl;
        cout<<"Width :"<<width<<endl;
        cout<<"Length:"<<length<<endl;
        cout<<"Height:"<<height<<endl;
        cout<<"Volume :"<<volume<<" cm^3";
    }
};

int main(){
    Cuboid Q;
    int L,W,H;
    cout<<"Enter the width, length, height of a Cuboid object :";
    cin>>L>>W>>H;
    Q.set_date(L,W,H);
    Q.find_valume();
    Q.display();
}