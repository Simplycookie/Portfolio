#include <iostream>
#include <E:\cookie work\visual studio\C++\Data structure\Data structure\Stacks.cpp>
using namespace std;


int main(){
    char_stack letters(4);
    char cha;
    cout<<"Key in five characters: ";
    for(int i=0;i<5;i++){
        cin>>cha;
        letters.push(cha);
    }
    cout<<"The reverse order is"<<endl;
    for(int i=0;i<5;i++){
        cout<<letters.pop()<<"\t";
    }
}
