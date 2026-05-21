#include<iostream>
#define SIZE 8
using namespace std;
class Stationery_Inventory{
    private:
    string code_name;
    int warehouse[SIZE];
    public:
    void display_reverse(){
        for(int i = SIZE - 1;i>=0;i--){
            cout<<"werehouse "<<SIZE - i<<" "<<warehouse[i]<<endl;
        }
    }
    void set_data(int *a){
        string cn;
        cout<<"---------------------------"<<endl;
        cout<<"Enter Stationary code: ";
        cin>>cn;
        cout<<"----------------------"<<endl;
        
        code_name = cn;
        for (int i = 0; i < SIZE; i++)
        {
            warehouse[i] = *(a+i);
        }
    }
} hold;

void process(){
    int array[SIZE]
    cout<<"-----------Colourful Book Holder Stock----------\n"
    cout<<"Enter stock for 8 warehouses:"
    for(int i = 0;i<SIZE;i++){
        cin>>array[i]
    }
}
int main(){
    Stationery_Inventory S;
    int array[SIZE]={5,10,15,22,20,25,30,35};
    S.set_data(array);
    S.display_reverse();
    process();
}