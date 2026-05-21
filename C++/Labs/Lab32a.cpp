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
    int get_length(){return length;
    }
    int get_width(){return width;
    }
    int get_height(){return height;
    }
    int get_volume(){return volume;
    }
};

int main(){
    Cuboid Q;
    int L,W,H;
    cout<<"Enter the width, length, height of a Cuboid object :";
    cin>>L>>W>>H;
    Q.set_date(L,W,H);
    Q.find_valume();
    cout<<"------Display Cuboid Data------"<<endl;
    cout<<"Width :"<<Q.get_width()<<endl;
    cout<<"Length:"<<Q.get_length()<<endl;
    cout<<"Height:"<<Q.get_height()<<endl;
    cout<<"Volume :"<<Q.get_volume()<<" cm^3";
}