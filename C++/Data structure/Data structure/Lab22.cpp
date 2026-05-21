#include<iostream>
using namespace std;

class Box{
    public:
    double length;
    double width;
    double height;
    Box(double l,double w, double h){
        length = l;
        width = w;
        height = h;
    }
    double volume(){
        return length * width * height;
    }
};
int main(){
    Box boxes[2] = {Box(5.0,6.0,7.0), Box(10.0,12.0,13.0)};
    for(int i=0; i<2; i++){
        cout<<"Volume of box "<<i+1<<": "<<boxes[i].volume()<<endl;
    }
}