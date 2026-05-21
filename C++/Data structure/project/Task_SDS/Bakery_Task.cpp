#include <iostream>
#include <stdio.h>
using namespace std;

//Arfan
struct item{
    string name;
    double cost;
    int quantity;
};

struct itemnode{
    item value;
    itemnode *link = NULL;
};

itemnode itemarray[26];

void decor_line(){
    cout<<"---------------------------------------"<<endl;
}

int hashcode_char_to_int(char name){
    int converted_name = int(name);
    if(converted_name>=65 and converted_name<=90){
        converted_name+=32;
    }
    if(converted_name>=97 and converted_name<=122){
        converted_name-=97;
    }
    int output;
    output = converted_name % 26;
    return output;
}

void item_loading(){
    item itemplaceholder;
    int index;
    char placeholder_char[100];
    itemnode *temp,*priv;
    FILE *itemfile;
    itemfile = fopen("items_data.txt","r");
    if (itemfile == NULL) {
        printf("Error! opening file");
        return;
    }
    cout<<"|";
    while(fscanf(itemfile,"%s %lf %d",placeholder_char,&itemplaceholder.cost,&itemplaceholder.quantity)==3){
        cout<<"-";
        index = hashcode_char_to_int(placeholder_char[0]);
        temp = &itemarray[index];
        while(temp!=NULL){
            priv = temp;
            temp = temp->link;
        }
        temp = new itemnode;
        temp->link=NULL;
        temp->value.name = "";
        temp->value.cost = 0.0;
        temp->value.quantity = 0;
        priv->link = temp;
        itemplaceholder.name = placeholder_char;
        priv->value = itemplaceholder;
    }
    cout<<"|Loading Complete"<<endl;
    for(int i=0;i<26;i++){
        temp = &itemarray[i];
        while(temp!=NULL){
            if(temp->value.name!=""){
                cout<<temp->value.name;
                cout<<endl;
            }

            temp = temp->link;
        }
        
    }
}

void startup(){
    decor_line();
    cout<<"Bakery Systems"<<endl;
    decor_line();
    item_loading();
    for(int i=0;i<5;i++){
        cout<<"-\n";
    }
}

void display_alphabate(){
    itemnode *temp;
    for(int i=0;i<26;i++){
        temp = &itemarray[i];
        while(temp!=NULL){
            if(temp->value.name!=""){
                cout<<temp->value.name;
                cout<<endl;
            }
            temp = temp->link;
        } 
    }
}
//Arfan End

//Leo Start

itemnode //------i-------//



void //------ii------//

void //------iii-----//


int main(){
    startup();
    return 0;

}