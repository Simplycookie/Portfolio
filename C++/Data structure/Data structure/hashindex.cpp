#include <iostream>
using namespace std;

struct node{
    int value=0;
    node *link=NULL;
};

int hashing(int value){
    int output = value % 100;
    return output;
}

int menu(){
    int choice;
    cout<<"enter a mode"<<endl;
    cout<<"1. input value"<<endl;
    cout<<"2. search value"<<endl;
    cout<<"3. delete value"<<endl;
    cout<<"4. show all values"<<endl;
    cout<<":";
    cin>>choice;
    while(choice<1 || choice>4){
        cout<<"invalid:";
        cin>>choice;
    }
    return choice;
}


int main(){
    node index[100], *temp, *newnode, *prev;
    int inputval;
    int hash;
    int choice;
    int count;
    do{
        choice = menu();
        switch (choice)
        {
        case 1:
            cout<<"enter value: ";
            cin>>inputval;
            hash = hashing(inputval);
            temp = &index[hash];
            while (temp->link!=NULL){
                temp=temp->link;
            }
            newnode = new node;
            temp->value = inputval;
            temp->link = newnode;
            break;
        case 2:
            cout<<"enter searched value:";
            cin>>inputval;
            hash = hashing(inputval);
            temp = &index[hash];
            count = 1;
            while(temp!=NULL && temp->value != inputval){
                temp=temp->link;
                count++;
            }
            if(temp!=NULL){
                cout<<"value found at hash "<<hash<<" at "<<count<<" instance";
            }
            else{
                cout<<"value not found";
            }
            cout<<endl;
            break;
        case 3:
            cout<<"enter deleting value:";
            cin>>inputval;
            hash = hashing(inputval);
            temp = &index[hash];
            count = 1;
            while(temp!=NULL && temp->value != inputval){
                prev = temp;
                temp=temp->link;
                count++;
            }
            if(temp!=NULL){
                cout<<"value found at hash "<<hash<<" at "<<count<<" instance has been deleted";
                prev->link = temp->link;
                temp->link = NULL;
                delete temp;
            }
            else{
                cout<<"value not found";
            }
            cout<<endl;
            break;
        case 4:
            for(int i=0;i<100;i++){
                cout<<"index :"<<i;
                temp = &index[i];
                while(temp!=NULL){
                    cout<<" "<<temp->value;
                    temp=temp->link;
                }
                cout<<endl;
            }
        default:
            break;
        }
        cout<<"repeat? (0:no) (1:yes) :";
        cin>>choice;
    }while(choice != 0);
    return 0;
}