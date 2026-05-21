#include<iostream>
using namespace std;
void display_backwards(int arraynum[]);
int main(){
    int arraynum[5];
    cout<<"Enter 5 numbers:\n";
    for(int i = 0;i<5;i++){
        cin>>arraynum[i];
    }
    display_backwards(arraynum);
    return 0;
}

void display_backwards(int arraynum[]){
    cout<<"The values in reverse order: ";
    for(int i = 4;i>=0;i--){
        cout<<arraynum[i]<<" ";
    }
}