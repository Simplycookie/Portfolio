#include<iostream>
using namespace std;
#define ITEM 3

class Beanbag {
    string code_name;
    int stock[ITEM];
    public:
    void latest_BeanBagStock (){
        cout<<"---------------------------------------"<<endl;
        cout<<"#Current# Ready Stock...";
        cout<<"---------------------------------------"<<endl;
        cout<<"Code Tracing\t >>"<<code_name<<"<<"<<endl;
        int i = ITEM;
        while(i > 0){
            cout<<"Group "<<ITEM-i+1<<" production:\t"<<stock[i-1]<<"item(s) ready"<<endl;
            i--;
        }
        cout<<endl;
    }
    void beanBag_Details(int *a){
        cout<<"#######################################"<<endl;
        cout<<"Stocks Checking"<<endl;
        cout<<"---------------------------------------"<<endl;
        cout<<"Enter Bean Bag Chair code: ";
        cin>>code_name;
        for(int i = 0; i < ITEM; i++){
            stock[i] = *(a + i);
        }
    }
} ready;

void stock_update(){
    cout<<"---------------------------------------"<<endl;
    cout<<"Ready stocks for this month"<<endl;
    cout<<"---------------------------------------"<<endl;
    int *a = new int[ITEM];
    for(int i = 3; i>0; i--){
        cout<<"Ready stock from group " <<i<<":";
        cin>>*(a + (ITEM - i));
        
    }
    ready.beanBag_Details(a);
    ready.latest_BeanBagStock();
    delete[] a; 
}

int main(){
    Beanbag sto;
    int arr[ITEM] = {9, 7, 5};
    sto.beanBag_Details(arr);
    sto.latest_BeanBagStock();
    stock_update();
    return 0;
}
